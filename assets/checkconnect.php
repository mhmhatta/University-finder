<?php
	ob_start();

	if(!isset($_SESSION)) {
		session_start();
	}

	$connect = mysqli_connect('localhost', 'root', '', 'tubes_ws');

	if($connect -> connect_error) {
		die ("Connection Failed!" . $connect -> connect_error);
	}
?>