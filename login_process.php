<?php
session_start();
require('dbconnect.php');
$email = $_POST['email'];
$password = $_POST['password'];


if($email == "")
{
	$_SESSION['msg'] = "Please enter your email."; 
	header('location: login.php');
	exit();
}

if($password == "")
{
	$_SESSION['msg'] = "Please enter your password.";
	header('location: login.php');
	exit();
}

$password = md5($password);

$sql = "SELECT * FROM borrower WHERE email = '$email' AND b_password = '$password'";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);
if($count == 1) {
	$row = mysqli_fetch_assoc($query);
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['lastname'] = $row['lastname'];
	$_SESSION['firstname'] = $row['firstname'];
	$_SESSION['log'] = $row['email'];
	$_SESSION['page_title'] = "Dashboard";
	header('location: index.php');
	exit();
}
else
{
	$_SESSION['msg'] = "Invalid email or pasword combination.";
	header('location: login.php');
	exit();
}

?>