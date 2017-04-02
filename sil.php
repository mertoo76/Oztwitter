<?php

require_once "ortak.php";

if (empty($_GET['id']) || empty($_SESSION['giris'])) {
	header("Location: uyegiris.php");
	exit();
}

// Kullanıcı sadece kendi gönderilerini silebilir.
$kontrol = $db->prepare("SELECT kullanici_id FROM gonderiler
	WHERE id = :gonderi;");
$parametre = array(
	':gonderi' => $_GET['id']
);
$kontrol->execute($parametre);

if ($kontrol->fetchColumn() == $_SESSION['giris']['id']) {
	$sorgu = $db->prepare("DELETE FROM gonderiler
		WHERE id = :gonderi;");
	$sorgu->execute($parametre);
}

header("Location: " . $_SERVER["HTTP_REFERER"]);