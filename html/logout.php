<?php
	session_start();
	unset($_SESSION['bname']);
	unset($_SESSION['bid']);
	unset($_SESSION['sname']);
	unset($_SESSION['sid']);
	unset($_SESSION['aid']);
	unset($_SESSION['aemail']);
	session_destroy();
	header("Location: index.php");
?>
	header("Location: index.php");
?>