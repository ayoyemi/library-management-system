<?php 
session_start();
require ('dbconnect.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$password = md5($password);
// var_dump($password);
// exit();

$sql = "INSERT INTO borrower VALUES ('', '$firstname', '$lastname', '$email', '$password', '$phone', '$address')";
$query = mysqli_query($conn, $sql);

if ($query) {
	$_SESSION['reg_msg'] = "Registration successfully.";
	header('location: login.php');
}
else {
	$_SESSION['msg'] = "Unable to register, check input fields and try again.";
}

 ?>