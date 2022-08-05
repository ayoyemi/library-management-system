<?php
    $page_title = "List Books";
    include('header.php');
    require('dbconnect.php');
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM borrow_details";
    $query = mysqli_query($conn, $sql);

?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Borrow History</h2>   
                <h5>List of all books books you have borrowed. </h5>
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
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Book title</th>
                                        <th>ISBN</th>
                                        <th>Date borrowed</th>
                                        <th>Date returned</th>
                                        <th>Borrow status</th>
                                        <th>Borrowed By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;

                                    while($row = mysqli_fetch_assoc($query))
                                    {
                                        $borrower_name = $row['borrower_id'];
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i;  ?></td>
                                        <td><?php echo $row['book_title']; ?></td>
                                        <td><?php echo $row['isbn']; ?></td>
                                        <td><?php echo $row['date_borrowed']; ?></td>
                                        <td><?php echo $row['date_returned']; ?></td>
                                        <td><?php echo $row['borrow_status']; ?></td>
                                        <?php $sql_select = "SELECT * FROM borrower WHERE id = ".$borrower_name;
                                            $query_select = mysqli_query($conn, $sql_select);
                                            if(mysqli_num_rows($query) > 0)
                                            {
                                                $row_select = mysqli_fetch_assoc($query_select);
                                            }  ?>
                                        <td><?php echo $row_select['lastname']; ?>&nbsp;<?php echo $row_select['firstname']; ?></td>

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





