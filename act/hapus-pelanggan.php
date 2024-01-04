<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapusPelanggan($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = '../admin/index.php?p=Data+Pelanggan';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = '../admin/index.php?p=Data+Pelanggan';
		</script>
	";
}

?>