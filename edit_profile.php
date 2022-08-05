<?php
    $page_title = "Edit Profile";
    include('header.php');
    require('dbconnect.php');
    $id = $_SESSION['user_id'];

    if($id == "")
    {
        $_SESSION['msg'] = "Acess Denied! You don't have access to this module";
        header('location: index.php');
        exit();
    }

    $sql = "SELECT * FROM borrower WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);
    }
?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Profile</h2>   
                <h5>Update your information below</h5>
            </div>
        </div>
         <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Supply necessary information.
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(@$_SESSION['msg']) { ?>
                                    <h4 style="color: #f00;"><?php echo $_SESSION['msg']; ?></h4>
                                <?php } ?>
                                <form role="form" method="post" action="edit_profile_process.php" onsubmit="return validate();">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input name="firstname" required="required" id="firstname" value="<?php echo $row['firstname']; ?>" class="form-control" />
                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input name="lastname" required="required" id="lastname" value="<?php echo $row['lastname']; ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" required="required" id="email" value="<?php echo $row['email']; ?>" class="form-control" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone_number" required="required" id="phone_number" value="<?php echo $row['phone_number']; ?>" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Addressaddress</label>
                                        <input name="address" required="required" id="address" value="<?php echo $row['b_address']; ?>" class="form-control" />
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Profile</button>
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
        var firstname = document.getElementById('firstname');
        var lastname = document.getElementById('lastname');
        var email = document.getElementById('email');
        var phone_number = document.getElementById('phone_number');
        var address = document.getElementById('address');
        
        if(firstname.value == "")
        {
            alert("Firstname cannot be empty.");
            firstname.focus();
            return false;
        }
        if(lastname.value == "")
        {
            alert("Lastname cannot be empty.");
            lastname.focus();
            return false;
        }
        if(email.value == "")
        {
            alert("Email cannot be empty.");
            email.focus();
            return false;
        }
        if(phone_number.value == "")
        {
            alert("Phone number cannot be empty.");
            phone_number.focus();
            return false;
        }
        if(address.value == "")
        {
            alert("Address cannot be empty.");
            address.focus();
            return false;
        }
        
    }
</script>
<?php
    include('footer.php');
?>