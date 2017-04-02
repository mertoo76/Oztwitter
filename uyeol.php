<?php

require_once 'ortak.php';

if (!empty($_SESSION['giris'])) {
	header('Location: profil.php');
	exit();
}

if (!empty($_POST)) {
	$hata = true;
	if (empty($_POST['adsoyad']) ||
		empty($_POST['eposta']) ||
		empty($_POST['kullaniciadi']) ||
		empty($_POST['parola']) ||
		empty($_POST['parola2'])) {
		echo "Lütfen zorunlu alanları doldurunuz.";
	} elseif ($_POST['parola'] != $_POST['parola2']) {
		echo "Yazdığınız parolalar eşleşmiyor.";
	} elseif (!filter_var($_POST['eposta'], FILTER_VALIDATE_EMAIL)) {
		echo "Lütfen geçerli bir e-posta adresi giriniz.";
	} else {
		$hata = false;
	}

	if (!$hata) {
		$sorgu = $db->prepare("INSERT INTO kullanicilar (adsoyad, eposta, kullaniciadi, parola, dogumtarihi, cinsiyet) VALUES (:adsoyad, :eposta, :kullaniciadi, :parola, :dogum_tarihi, :cinsiyet);");
		$dogum_tarihi = null;
		if (!empty($_POST['dogumtarihi'])) {
			$dogum_tarihi = $_POST['dogumtarihi'];
		}
		$cinsiyet = "Belirtilmemiş";
		if (!empty($_POST['cinsiyet'])) {
			$cinsiyet = $_POST['cinsiyet'];
		}
		$sonuc = $sorgu->execute(array(
			':adsoyad' => $_POST['adsoyad'],
			':eposta' => $_POST['eposta'],
			':kullaniciadi' => $_POST['kullaniciadi'],
			':parola' => sha1($_POST['parola'] . $tuz),
			':dogum_tarihi' => $dogum_tarihi,
			':cinsiyet' => $cinsiyet
		));
		$id = $db->lastInsertId();
		$sorgu2 = $db->query("SELECT * FROM kullanicilar WHERE id = ". $id);
		$_SESSION['giris'] = $sorgu2->fetch(PDO::FETCH_ASSOC);
		header("Location: profil.php");
		exit();
		if (!$sonuc) {
			var_dump($sorgu->errorInfo());
		}
	}

}

$sablon = $twig->loadTemplate('kayit.html');
echo $sablon->render(array());

?>
