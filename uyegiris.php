<?php

require_once 'ortak.php';

if (!empty($_SESSION['giris'])) {
	header('Location: profil.php');
	exit();
}

if (!empty($_POST)) {
	if (empty($_POST['kullaniciadi']) || empty($_POST['parola'])) {
		echo "Lütfen giriş bilgilerini doldurun.";
	} else {
		$sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kullanici;");
		$sorgu->execute(array(
			':kullanici' => $_POST['kullaniciadi']
		));
		if ($sorgu->rowCount() == 0) {
			echo "Böyle bir kullanıcı kayıtlı değil.";
		} else {
			$kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);
			if ($kullanici['parola'] != sha1($_POST['parola'] . $tuz)) {
				echo "Hatalı parola girdiniz.";
			} else {
				$_SESSION["giris"] = $kullanici;
				header("Location: profil.php");
				exit();
			}
		}
	}

}

$sablon = $twig->loadTemplate('giris.html');
echo $sablon->render(array());

?>