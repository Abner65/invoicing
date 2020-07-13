<?php 
	if ($_SESSION['acceso'] != 1) {
		header("Location:index.php?c=index");
		exit();
	}


 ?>