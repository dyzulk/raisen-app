<?php
require_once 'functions.php';

function getPageTitle() {
    if (empty($_GET['p'])) {
        return 'Dashboard';
    } else {
        return $_GET['p'];
    }
}

function includePage($pageName) {
    if ($_SESSION["role_id"] == 1) {
        require_once "../page/{$pageName}.php";
    } else {
        require_once "../page/{$pageName}.php";
    }
}

function showContent() {
    if (empty($_GET['p']) || $_GET['p'] == 'Dashboard') {
        includePage('dashboard');
    } elseif ($_GET['p'] == 'Data Mahasiswa') {
        includePage('data-mahasiswa');
    } elseif ($_GET['p'] == 'Data Pelanggan') {
        includePage('data-pelanggan');
    } elseif ($_GET['p'] == 'Ubah Data Pelanggan') {
        includePage('ubah-data-pelanggan');
    } elseif ($_GET['p'] == 'Profile') {
        includePage('profile');
    } elseif ($_GET['p'] == 'QR Code') {
        includePage('qr-code');
    }
}

function base_url($url = null) {
	if ($_SERVER['HTTP_HOST'] == 'localhost:8080') {
        $base_url = "http://localhost:8080/";
    } elseif ($_SERVER['HTTP_HOST'] == 'derli.do:8080') {
        $base_url = "http://derli.do:8080/";
    } elseif ($_SERVER['HTTP_HOST'] == 'dev.dyzulk.com') {
        $base_url = "https://dev.dyzulk.com/";
    } else {
        $base_url = "http://localhost/";
    }
	// return $base_url . $url;
	if( $url != null ) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}

function full_title($title = null) {
    $base_title = "RaisenAPP";
    if( $title != null ) {
        return $title . " | " . $base_title;
    } else {
        return $base_title;
    }
}

function title(){
    return "<b>Raisen</b>APP";
}
