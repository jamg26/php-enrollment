<?php
if(!isset($_SESSION['user']['email'])) {
	header('location: /pages/signin.php');
}
?>
