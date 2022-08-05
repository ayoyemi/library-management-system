<?php
  session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Library Management System : Register</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-image: url('images/library2.jpg')">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Online Library Management System : Register</h2>
              
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Register </strong>  
                            </div>
                            <div class="panel-body">
                                <?php if(@$_SESSION['msg']) { ?>
                                  <h6 class="text-center" style="color: #f00;"><?php echo $_SESSION['msg']; ?></h6>
                                <?php } ?>
                                <form role="form" method="post" action="register_process.php" onsubmit="return validate();">

                                    
                                    <label for="firstname">Enter Firstname</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                        <input type="text" name="firstname" required id="firstname" class="form-control" placeholder="Your Firstname" />
                                    </div>
                                    
                                    <label for="surame">Enter Lastname</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                        <input type="text" name="lastname" required id="lastname" class="form-control" placeholder="Your Lastname" />
                                    </div>

                                    <label for="email">Enter Your Email</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"  ></i></span>
                                        <input type="email" name="email" required id="email" class="form-control" placeholder="Your Email " />
                                    </div>

                                    <label for="email">Enter Your Password</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                        <input type="password" name="password" required id="password" class="form-control" placeholder="Your Password " />
                                    </div>

                                    <label for="phone">Enter Phone Nuumber</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                        <input type="text" name="phone" required id="phone" class="form-control" placeholder="Your Phone Number" />
                                    </div>

                                    <label for="surame">Enter Address</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"  ></i></span>
                                        <input type="text" name="address" required id="address" class="form-control" placeholder="Your Address" />
                                    </div>

                                    <div class="form-group">
                                        <label class="checkbox-inline">
                                            
                                        </label>
                                        <span class="pull-right">
                                            <a href="login.php" >Have an account?<br>Login Here</a> 
                                        </span>
                                    </div>
                                     
                                     <button type="submit" class="btn btn-primary">Register</button>
                                  </form>
                            </div>
                           
                        </div>
                    </div>                
        </div>
        
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
      function validate()
      {
            var firstname = document.getElementById('firstname');
            var lastname = document.getElementById('lastname');  
            var email = document.getElementById('email');
            var password = document.getElementById('password');
            var phone = document.getElementById('phone');
            var address = document.getElementById('address');

            if(firstname.value == "")
            {
                alert("Please enter your firstname.");
                firstname.focus();
                return false;
            }

            if(lastname.value == "")
            {
                alert("Please enter your lastname.");
                lastname.focus();
                return false;
            }

            if(email.value == "")
            {
                alert("Please enter your email.");
                email.focus();
                return false;
            }

            if(password.value == "")
            {
                alert("Please enter your password.");
                password.focus();
                return false;
            }

            if(phone.value == "")
            {
                alert("Please enter your phone.");
                phone.focus();
                return false;
            }

            if(address.value == "")
            {
                alert("Please enter your address.");
                address.focus();
                return false;
            }
      }
    </script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <?php
        unset($_SESSION['msg']);
    ?>
   
</body>
</html>