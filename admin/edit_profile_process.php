<?php
session_start();

require('dbconnect.php');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$id = $_POST['id'];

if($id == "")
{
	$_SESSION['msg'] = "Access Denied! Please refresh your page and try again.";
	header('location: index.php');
	exit();
}

$sql = "UPDATE admin SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_number = '$phone_number' WHERE id = " . $id;
$query = mysqli_query($conn, $sql);
if($query)
{
	$_SESSION['msg'] = "Profile Updated successfully.";
	$_SESSION['page_title'] = "Update profile";
	header('location: edit_profile.php');
	exit();
}
else
{
	$_SESSION['msg'] = "Oops! Unable to update book, please check and try again.";
	header('location: edit_profile.php?id=' . $id);
	exit();
}

?>