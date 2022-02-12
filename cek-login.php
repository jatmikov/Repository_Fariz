<?php
include "config/config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

$row = mysqli_fetch_array($login);
$id_user = $row['id_user'];
$nama_user = $row['nama_user'];
$level = $row['level'];


if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nama_user'] = $nama_user;
	$_SESSION['level'] = $level;
	$_SESSION['status'] = "login";
	header("location:modules/dashboard.php");

}else{
	header("location:index.php");
}

?>