<?php
    $page_title = "Edit Book";
    include('header.php');
    require('dbconnect.php');
    $id = $_GET['id'];

    if($id == "")
    {
        $_SESSION['msg'] = "Acess Denied! You don't have access to this module";
        header('location: list_books.php');
        exit();
    }

    $sql = "SELECT * FROM books WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);
    }
    else
    {
        $_SESSION['msg'] = "Book does not exist.";
        header('location: list_books.php');
        exit();
    }
?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Book</h2>   
                <h5>Edit the book that you've selected. </h5>
            </div>
        </div>
         <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Please fill the form below. All fields are required.
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(@$_SESSION['msg']) { ?>
                                    <h4 style="color: #f00;"><?php echo $_SESSION['msg']; ?></h4>
                                <?php } ?>
                                <form role="form" method="post" action="edit_book_process.php" onsubmit="return validate();">
                                    <div class="form-group">
                                        <label>Book title</label>
                                        <input name="book_title" required="required" id="book_title" value="<?php echo $row['book_title']; ?>" class="form-control" />
                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input name="book_isbn" required="required" id="book_isbn" value="<?php echo $row['isbn']; ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Edition</label>
                                        <input name="book_edition" required="required" id="book_edition" value="<?php echo $row['edition']; ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="book_category" required="required" id="book_category" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php if($row['category'] == "novel"){ ?>
                                            <option selected="selected" value="novel">Novel</option>
                                            <?php } else { ?>
                                            <option value="novel">Novel</option>
                                            <?php } ?>
                                            <?php if($row['category'] == "story"){ ?>
                                            <option selected="selected" value="story">Story</option>
                                            <?php } else { ?>
                                            <option value="story">Story</option>
                                            <?php } ?>
                                            <?php if($row['category'] == "prose"){ ?>
                                            <option selected="selected" value="prose">Prose</option>
                                            <?php } else { ?>
                                            <option value="prose">Prose</option>
                                            <?php } ?>
                                            <?php if($row['category'] == "drama"){ ?>
                                            <option selected="selected" value="drama">Drama</option>
                                            <?php } else { ?>
                                            <option value="drama">Drama</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Publication Year</label>
                                        <input name="book_publication_year" required="required" id="book_publication_year" value="<?php echo $row['publication_year']; ?>" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Author</label>
                                        <input name="book_author" required="required" id="book_author" value="<?php echo $row['author']; ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Borrow Status</label>
                                        <select name="borrow_status" required="required" id="borrow_status" class="form-control">
                                            <option value="">Select borrow status</option>
                                            <?php if($row['borrow_status'] == "available"){ ?>
                                            <option selected="selected" value="available">Available</option>
                                            <?php } else { ?>
                                            <option value="available">Available</option>
                                            <?php } ?>
                                            <?php if($row['borrow_status'] == "borrowed"){ ?>
                                            <option selected="selected" value="borrowed">Borrowed</option>
                                            <?php } else { ?>
                                            <option value="borrowed">Borrowed</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Update book record</button>
                                </form>
                                <br />
                            </div>
                                
                            <div class="col-md-6">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

<script type="text/javascript">
    function validate()
    {
        var book_title = document.getElementById('book_title');
        var book_isbn = document.getElementById('book_isbn');
        var book_edition = document.getElementById('book_edition');
        var book_category = document.getElementById('book_category');
        var book_publication_year = document.getElementById('book_publication_year');
        var book_author = document.getElementById('book_author');
        var borrow_status = document.getElementById('borrow_status');
        
        
        if(book_title.value == "")
        {
            alert("Please enter book title.");
            book_title.focus();
            return false;
        }
        if(book_isbn.value == "")
        {
            alert("Please enter book ISBN.");
            book_isbn.focus();
            return false;
        }
        if(book_edition.value == "")
        {
            alert("Please enter book edition.");
            book_edition.focus();
            return false;
        }
        if(book_category.value == "")
        {
            alert("Please select book category.");
            book_category.focus();
            return false;
        }
        if(book_publication_year.value == "")
        {
            alert("Please enter book publication year.");
            book_publication_year.focus();
            return false;
        }
        if(book_author.value == "")
        {
            alert("Please enter book author.");
            book_author.focus();
            return false;
        }
        if(borrow_status.value == "")
        {
            alert("Please select book status.");
            borrow_status.focus();
            return false;
        }
    }
</script>
<?php
    include('footer.php');
?>