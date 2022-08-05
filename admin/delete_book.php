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

$sql = "DELETE FROM books WHERE id=".$id;
$query = mysqli_query($conn, $sql);
if($query)
{
	$_SESSION['msg'] = "Book was successfully deleted.";
	header('location: list_books.php');
}
else
{
	$_SESSION['msg'] = "Unable to delete book.";
	header('location: list_books.php');
	exit();
}

?>