<?php
    session_start();
    require('dbconnect.php');
    $id = $_GET['id'];
    $borrower_id = $_SESSION['user_id'];
    $date_borrowed = date('Y-m-d');
 
    if($id == "")
    {
        $_SESSION['msg'] = "Acess Denied! You don't have access to this module";
        header('location: borrow_book.php');
        exit();
    }

    $sql_select = "SELECT * FROM books WHERE id = " . $id;
    $query = mysqli_query($conn, $sql_select);
    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);
        $book_id = $row['id'];
        $book_title = $row['book_title'];
        $book_isbn = $row['isbn'];
        $borrow_status = $row['borrow_status'];
    }
    else
    {
        $_SESSION['msg'] = "An error occur, please try again.";
        header('location: borrow_book.php');
        exit();
    }
 

    if ($borrow_status == 'borrowed') {
        $_SESSION['msg'] = "Book not available, check later.";
        header('location: borrow_book.php');
    }
    else {
        $sql_update = "UPDATE books SET borrow_status = 'borrowed' WHERE id = '$book_id' ";
        $query_update = mysqli_query($conn, $sql_update);

        $sql_insert = "INSERT INTO borrow_details VALUES ('', '$book_id', '$book_title', '$book_isbn', '$borrower_id', 'borrowed', '$date_borrowed', '$date_borrowed')";
        $query2 = mysqli_query($conn, $sql_insert);

        if ($query2) {
            $_SESSION['msg'] = "Book borrow successful, return the book within 14 days.";
            header('location: borrow_book.php');
        }
        else {
            $_SESSION['msg'] = "There is an error, please check.";
        }
    }
    

    
?>