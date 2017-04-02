<?php

require_once "ortak.php";

if (empty($_GET['id']) || empty($_SESSION['giris'])) {
	header("Location: uyegiris.php");
	exit();
}

// Kullanıcı kendi gönderilerini RT yapamaz.
$kontrol = $db->prepare("SELECT kullanici_id FROM gonderiler
	WHERE gonderi_id = :gonderi");
$kontrol->execute(array(':gonderi' => $_GET['id']));
if ($kontrol->fetchColumn() == $_SESSION['giris']['id']) {
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	exit();
}

// Daha önce RT yapmış mı?
$kontrol2 = $db->prepare("SELECT * FROM rt
	WHERE gonderi_id = :gonderi
	AND kullanici_id = :kullanici;");
$parametre = array(
	':gonderi' => $_GET['id'],
	':kullanici' => $_SESSION['giris']['id']
);
$kontrol2->execute($parametre);

// Yapmamışsa yap, yapmışsa kaldır.
if ($kontrol2->rowCount() == 0) {
	$sorgu = $db->prepare("INSERT INTO rt (gonderi_id, kullanici_id)
		VALUES (:gonderi, :kullanici);");
} else {
	$sorgu = $db->prepare("DELETE FROM rt
		WHERE gonderi_id = :gonderi
		AND kullanici_id = :kullanici;");
}
$sorgu->execute($parametre);

// Geldiği sayfaya geri yönlendir.
header("Location: " . $_SERVER["HTTP_REFERER"]);