<?php
    session_start();
     $log = $_SESSION['log'];
    if(!$log)
    {
        header('location: login.php');
        exit();
    }  
    if(!@$page_title)
    {
        $page_title = $_SESSION['page_title'];
    }
    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Library Management System : <?php echo $page_title; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; background-color: red">
            <div class="navbar-header" style="background-color: red">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="height: auto; background-color: red;">Online Library Management System</a> 
            </div>

  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><span class="fa fa-user">&nbsp;</span><strong> <?php echo $_SESSION['lastname'] . " " . $_SESSION['firstname'] ; ?></strong> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust" style="background-color: white; color: red;"><span class="glyphicon glyphicon-log-out"> Logout</span></a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="../images/books1.png" class="user-image img-responsive" style="width: 150px; height: 150px" />
					</li>
                    
                    <li>
                        <a class=""  href="index.php" style="background-color: red;"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-3x"></i> Books Catalogue<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_book.php">Add book</a>
                            </li>
                            <li>
                                <a href="list_books.php">Manage book</a>
                            </li>
                            <li>
                                <a href="borrow_history.php">Check borrow history</a>
                            </li>
                            <li>
                                <a href="edit_profile.php">Edit profile</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->