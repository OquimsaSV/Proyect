<?php
	if (!isset($_SESSION['user'])) {
		echo "<script>alert('Inicie sesión para poder entrar');</script>";
		echo "<script>window.location='index.php'</script>";
	}
?>