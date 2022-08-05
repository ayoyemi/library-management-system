<?php
session_start();

require('dbconnect.php');
$id = $_GET['id'];

if($id == "")
{
	$_SESSION['msg'] = "Acess Denied! You don't have access to this module";
	header('location: list_books.php');
	exit();
}

$sql = "UPDATE books SET borrow_status = 'available' WHERE id = ".$id;
$query = mysqli_query($conn, $sql);
if($query)
{
	$_SESSION['msg'] = "Book Updated successfully.";
	header('location: list_books.php');
	exit();
}

?>