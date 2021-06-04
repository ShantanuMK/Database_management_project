<?php
	session_start();
	unset($_SESSION['bname']);
	echo $_SESSION['bname'];
	unset($_SESSION['bid']);
	unset($_SESSION['sname']);
	unset($_SESSION['sid']);
	session_destroy();
	header("Location: index.php");
?>