<?php
    session_start();
	if (!empty($_SESSION['id'])) {
		header('Location: menu.html');
		exit();
	} else {
        header('Location: authentification.php');
    }

?>