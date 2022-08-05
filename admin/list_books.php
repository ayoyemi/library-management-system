<?php
    $page_title = "List Books";
    include('header.php');
    require('dbconnect.php');
    $sql = "SELECT * FROM books";
    $query = mysqli_query($conn, $sql);

?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>List Books</h2>   
                <h5>List of all books from table in the database </h5>
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
                                        <td><?php echo $row['borrow_status']; ?></td>
                                        <td class="center">
                                            <div class='text-center'>
                                                <div class='btn-group'>
                                                    <a class='tip btn btn-primary btn-xs' href="edit_book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('You are about to delete this book, Press Ok to delete');" class='tip btn btn-danger btn-xs' href="delete_book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="center">
                                            <div class='text-center'>
                                                <div class='btn-group'>
                                                    <a class='tip btn btn-success btn-xs' href="update_book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-mark"></i>Make available</a>
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

<?php
    include('footer.php');
    unset($_SESSION['msg']);
?>





