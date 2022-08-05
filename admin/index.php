<?php
    include('header.php');

?>
        <div id="page-wrapper" >
            <?php if(@$_SESSION['msg']) { ?>
            <h4 style="color: #f00;"><?php echo $_SESSION['msg']; ?></h4>
            <?php } ?>
            
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style="color: blue;">Admin Dashboard</h2>   
                        <h5>Welcome <b><?php echo ucfirst($_SESSION['lastname']) ." ".ucfirst($_SESSION['firstname']);?></b>, Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                  
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box"> <a href="list_books.php">
                <span class="icon-box bg-color-red set-icon">5</span>
                <div class="text-box" >
                    <br><br>
                    <p class="main-text" style="text-align: center; color: black;"> <br>Total books</p>
                    <p class="text-muted"></p>
                </div> </a>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box"> <a href="borrow_history.php">
                <span class="icon-box bg-color-green set-icon">2</span>
                <div class="text-box" >
                    <br><br>
                    <p class="main-text" style="text-align: center; color: black; "> <br>Books borrowed</p>
                    <p class="text-muted"></p>
                </div> </a>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box"> <a href="list_books.php">
                <span class="icon-box bg-color-blue set-icon">3</span>
                <div class="text-box" >
                    <br><br>
                    <p class="main-text" style="text-align: center; color: black;"> <br>Available books</p>
                    <p class="text-muted"></p>
                </div> </a>
             </div>
		     </div>
  
                 <!-- /. ROW  -->           
            </div>
            <!-- <?php //} ?> -->
             <!-- /. PAGE INNER  -->
        
        </div> </div>
        <!-- /. PAGE WRAPPER  -->
<?php
    include('footer.php');
    unset($_SESSION['msg']);
?>