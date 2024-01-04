<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "raisenapp");

function ranID(){
	$prefix = "pel-";
	$date	= date("ymd");
	$uniqid = $prefix . $date . rand(10, 99);
	return $uniqid;
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function getuser($id) {
	global $conn;
	$query = "SELECT * FROM user WHERE id = '$id'";
	$result = mysqli_query($conn, $query);
	$user = mysqli_fetch_assoc($result);
	return $user;
}

function role_id($id) {
	global $conn;
	$table = "user";

	// Menggunakan prepared statement untuk mencegah SQL injection
	$stmt = mysqli_prepare($conn, "SELECT role_id FROM user WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	$data = mysqli_fetch_assoc($result);

	// mysqli_close($conn);

	return $data;
}


function tambah($data) {
	global $conn;

	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiswa
				VALUES
			  ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE mahasiswa SET
				nrp = '$nrp',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function update_pelanggan($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "UPDATE user SET
				nama = '$nama',
				email = '$email',
				alamat = '$alamat'
			  WHERE id = '$id'
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
				WHERE
			  nama LIKE '%$keyword%' OR
			  nrp LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  jurusan LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
    global $conn;

    $id           = ranID();
    $nama         = htmlspecialchars($data["nama"]);
    $email        = strtolower(stripslashes($data["email"]));
    $password     = mysqli_real_escape_string($conn, $data["password"]);
    $password2    = mysqli_real_escape_string($conn, $data["password2"]);
    $alamat       = mysqli_real_escape_string($conn, $data["alamat"]);
    $image        = mysqli_real_escape_string($conn, "default.png");
    $role_id      = mysqli_real_escape_string($conn, 2);
    $is_active    = mysqli_real_escape_string($conn, 1);
    $date_created = time();

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO user VALUES('$id', '$email', '$password', '$nama', '$alamat', '$image', '$role_id', '$is_active', '$date_created')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahPelanggan($data) {
	global $conn;

	$id			= ranID();
	$email			= htmlspecialchars($data["email"]);
	$password		= password_hash("123456", PASSWORD_DEFAULT);
	$nama			= htmlspecialchars($data["nama"]);
	$alamat			= htmlspecialchars($data["alamat"]);
	$image			= "default.png";
	$role_id		= 2;
	$is_active		= 1;
	$date_created		= time();

	$query = "INSERT INTO user
				VALUES
			  ('$id', '$email', '$password', '$nama', '$alamat', '$image', '$role_id', '$is_active', '$date_created')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusPelanggan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");
	return mysqli_affected_rows($conn);
}
