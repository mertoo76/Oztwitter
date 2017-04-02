<?php

require_once "ortak.php";

if (empty($_GET['id']) || empty($_SESSION['giris'])) {
	header("Location: uyegiris.php");
	exit();
}

$kontrol = $db->prepare("SELECT * FROM favoriler
	WHERE gonderi_id = :gonderi
	AND kullanici_id = :kullanici;");
$parametre = array(
	':gonderi' => $_GET['id'],
	':kullanici' => $_SESSION['giris']['id']
);
$kontrol->execute($parametre);

if ($kontrol->rowCount() == 0) {
	$sorgu = $db->prepare("INSERT INTO favoriler (gonderi_id, kullanici_id)
		VALUES (:gonderi, :kullanici);");
} else {
	$sorgu = $db->prepare("DELETE FROM favoriler
		WHERE gonderi_id = :gonderi
		AND kullanici_id = :kullanici;");
}
$sorgu->execute($parametre);

header("Location: " . $_SERVER["HTTP_REFERER"]);