<?php
    $page_title = "Add Book";
    include('header.php');
    $_SESSION['myid'] = $log;
?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: blue;">Supply Book Information</h2>   
                <h5>Supply the correcct book details </h5>
                
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
                                    <h4 style="color: #00cc00;"><?php echo $_SESSION['msg']; ?></h4>
                                <?php } ?>
                                <form role="form" method="post" action="add_book_process.php" onsubmit="return validate();">
                                    <div class="form-group">
                                        <label>Book Title</label>
                                        <input name="book_title" required="required" id="book_title" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN (number only)</label>
                                        <input name="book_isbn" required="required" id="book_isbn" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Edition</label>
                                        <input name="book_edition" required="required" id="book_edition" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="book_category" required="required" id="book_category" class="form-control">
                                            <option value="">Select Category</option>
                                            <option value="admin">Novel</option>
                                            <option value="user">Story</option>
                                            <option value="prose">Prose</option>
                                            <option value="drama">Drama</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Year of publication</label>
                                        <input type="number" name="book_publication_year" required="required" id="book_publication_year" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Author name</label>
                                        <input type="text" name="book_author" required="required" id="book_author" class="form-control" />
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Add Book</button>
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
    }
</script>
<?php
    include('footer.php');
?>