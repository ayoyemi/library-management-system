<?php
session_start();
require('dbconnect.php');


$book_title = $_POST['book_title'];
$book_isbn = $_POST['book_isbn'];
$book_edition = $_POST['book_edition'];
$book_category = $_POST['book_category'];
$book_publication_year = $_POST['book_publication_year'];
$book_author = $_POST['book_author'];
$id = $_SESSION['myid'];


$date_submitted = date('Y-m-d');
$sql = "INSERT INTO books VALUES ('', '$book_title', '$book_isbn', '$book_edition', '$book_category', '$book_publication_year', '$book_author', 'available')";

$query = mysqli_query($conn, $sql);

if($query)
{
	$_SESSION['msg'] = "Book added successfully.";
	header('location: add_book.php');
	exit();
}
else
{
	$_SESSION['msg'] = "Oops! Unable to add book, please check and try again.";
	header('location: add_book.php');
	exit();
}

?>