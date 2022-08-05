<?php
    $page_title = "Borrow Book";
    include('header.php');
    require('dbconnect.php');
    $sql = "SELECT * FROM books";
    $query = mysqli_query($conn, $sql);

?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: blue;">Borrow Books</h2>   
                <h5>Check the list of all books for your reference. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />               
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Filter by the search box at the right side
                    </div>
                    <div class="panel-body">
                        <?php if(@$_SESSION['msg']) { ?>
                          <h6 class="text-center" style="color: #f00;"><?php echo $_SESSION['msg']; ?></h6>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Book title</th>
                                        <th>ISBN</th>
                                        <th>Edition</th>
                                        <th>Category</th>
                                        <th>Year</th>
                                        <th>Author</th>
                                        <th>Borrow status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;

                                    while($row = mysqli_fetch_assoc($query))
                                    {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i;  ?></td>
                                        <td><?php echo $row['book_title']; ?></td>
                                        <td><?php echo $row['isbn']; ?></td>
                                        <td class="center"><?php echo $row['edition']; ?></td>
                                        <td class="center"><?php echo $row['category']; ?></td>
                                        <td class="center"><?php echo $row['publication_year']; ?></td>
                                        <td><?php echo $row['author']; ?></td>
                                        <td id="borrow_status"><?php echo $row['borrow_status']; ?></td>
                                        <td class="center" id="borrow_button">
                                            <div class='text-center'>
                                                <div class='btn-group'>
                                                    <a onclick="return confirm('Do you want to borrow the book <?php echo $row['book_title']; ?>');" class='tip btn btn-primary btn-xs' href="borrow_book_process.php?id=<?php echo $row['id']; ?>"><i class="fa fa-book">&nbsp;</i>Borrow</a>
                                                    
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                <?php
                                   $i++; }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER -->

<!-- <script type="text/javascript">
    
        var borrow_status = document.getElementById("borrow_status");
        // var bow = borrow_status.innerHTML; 
        // alert(bow)
        if (borrow_status.innerHTML == "borrowed") {
            document.getElementById("borrow_button").innerHTML = "not available";
            document.getElementById("borrow_button").style.color = "red";
        }
    
</script> -->

<?php
    include('footer.php');
    unset($_SESSION['msg']);
?>





