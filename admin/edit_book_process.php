<?php
session_start();

require('dbconnect.php');
$book_title = $_POST['book_title'];
$book_isbn = $_POST['book_isbn'];
$book_edition = $_POST['book_edition'];
$book_category = $_POST['book_category'];
$book_publication_year = $_POST['book_publication_year'];
$book_author = $_POST['book_author'];
$borrow_status = $_POST['borrow_status'];
$id = $_POST['id'];

if($id == "")
{
	$_SESSION['msg'] = "Access Denied! Please refresh your page and try again.";
	header('location: list_books.php');
	exit();
}

$sql = "UPDATE books SET book_title = '$book_title', isbn = '$book_isbn', edition = '$book_edition', category = '$book_category', publication_year = '$book_publication_year', author = '$book_author', borrow_status = '$borrow_status' WHERE id = " . $id;
$query = mysqli_query($conn, $sql);
if($query)
{
	$_SESSION['msg'] = "Book Updated successfully.";
	$_SESSION['page_title'] = "List Books";
	header('location: list_books.php');
	exit();
}
else
{
	$_SESSION['msg'] = "Oops! Unable to update book, please check and try again.";
	header('location: edit_book.php?id=' . $id);
	exit();
}

?>