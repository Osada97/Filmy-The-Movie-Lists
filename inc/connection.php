<?php 

	$connection = mysqli_connect('localhost', 'root', '', 'filmy');

	if (mysqli_connect_error()) {
		die('Database Connection Faield '. mysqli_connect_error());
	}

?>