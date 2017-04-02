<?php

session_start();

if (empty($_SESSION['giris'])) {
	echo "Önce giriş yapmalısınız.";
} else {
	unset($_SESSION);
	session_destroy();
}

?>