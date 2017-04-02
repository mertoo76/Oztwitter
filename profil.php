<?php

require_once "ortak.php";

if (!empty($_GET['kullanici'])) {
	$sorgu3 = $db->prepare("SELECT * FROM kullanicilar
		WHERE kullaniciadi = :kadi;");
	$sorgu3->execute(array(':kadi' => $_GET['kullanici']));
	if ($sorgu3->rowCount() == 0) {
		header("Location: hata.php");
		exit();
	}
	$profil = $sorgu3->fetch(PDO::FETCH_ASSOC);
} else if (!empty($_SESSION['giris'])) {
	$profil = $_SESSION['giris'];
} else {
	header("Location: uyegiris.php");
	exit();
}

if (!empty($_POST)) {
	if (empty($_POST['gonderi'])) {
		echo "Gönderecek bir metin yazmalısınız.";
	} elseif (strlen($_POST['gonderi']) > 140) {
		echo "Gönderiniz 140 karakterden uzun olamaz.";
	} else {
		$sorgu = $db->prepare("INSERT INTO gonderiler (kullanici_id, metin)
			VALUES (:id, :metin);");
		$sorgu->execute(array(
			':id' => $_SESSION['giris']['id'],
			':metin' => $_POST['gonderi']
		));
	}
}

$sorgu2 = $db->prepare("(SELECT gonderiler.id, gonderiler.metin,
	kullanicilar.id as kullanici_id, kullanicilar.adsoyad,
	kullanicilar.kullaniciadi, gonderiler.tarih, gonderiler.tarih AS siralama_tarihi,
 	NULL AS rt_id, NULL AS rt_adsoyad, NULL AS rt_kullaniciadi
	FROM gonderiler
	LEFT JOIN kullanicilar
	ON gonderiler.kullanici_id = kullanicilar.id
	WHERE kullanici_id = 8)
UNION
(SELECT gonderiler.id, gonderiler.metin,
	kullanicilar.id as kullanici_id, kullanicilar.adsoyad,
	kullanicilar.kullaniciadi, gonderiler.tarih, rt.tarih AS siralama_tarihi, rt_kullanici.id AS rt_id, rt_kullanici.adsoyad AS rt_adsoyad, rt_kullanici.kullaniciadi AS rt_kullaniciadi
FROM gonderiler
LEFT JOIN rt
ON gonderiler.id = rt.gonderi_id
LEFT JOIN kullanicilar
ON kullanicilar.id = gonderiler.kullanici_id
LEFT JOIN kullanicilar AS rt_kullanici
ON rt_kullanici.id = rt.kullanici_id
WHERE rt.kullanici_id = 8)  ORDER BY siralama_tarihi DESC;");
$sorgu2->execute(array(':id' => $profil['id']));
$gonderiler = $sorgu2->fetchAll(PDO::FETCH_ASSOC);

$sablon = $twig->loadTemplate('profil.html');
echo $sablon->render(array(
	'gonderiler' => $gonderiler,
	'profil' => $profil,
	'kullanici' => $_SESSION['giris']
));
