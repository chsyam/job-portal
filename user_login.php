<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compAdmin.css">
    <script src="https://kit.fontawesome.com/a16ff108d1.js" crossorigin="anonymous"></script>
    <title>Login | Job Portal</title>
</head>

<body>
    <div class="container">
        <input type="checkbox" name="" id="check">
        <div class="reg">
            <div class="header-reg">
                <div class="head">
                    <h1>Registration Form</h1>
                </div>
                <div class="can">
                    <label for="check" class="cancel">Close<i class="fas fa-times"></i></label>
                </div>
            </div>
            <?php
            if (isset($_REQUEST['first_name'])) {
                $fname = $_REQUEST['first_name'];
                $lname = $_REQUEST['last_name'];
                $loc = $_REQUEST['location'];
                $pincode = $_REQUEST['pinCode'];
                $contact = $_REQUEST['contact'];
                $email = $_REQUEST['email'];
                $pass = $_REQUEST['password'];
                $cpass = $_REQUEST['cpassword'];
                $id = rand(1, 100000);
                $query = "insert into users (id,fname,lname,email,location,contact,pincode,password) 
                values ($id,'$fname','$lname','$email','$loc','$contact',$pincode,'$pass')";
                $res = mysqli_query($conn, $query);
            }
            ?>
            <form action="" class="form" method="POST">
                <hr>
                <h1>Sign up & Choose the Best one</h1>
                <div class="popup_block">
                    <div>
                        <input type="text" name="first_name" id="" placeholder="First Name" required><br>
                        <input type="text" name="last_name" id="" placeholder="Last Name"><br>
                        <input type="text" name="location" id="" placeholder="Address Line"><br>
                        <input type="number" name="pinCode" id="" placeholder="Pin Code"><br>
                    </div>
                    <div>
                        <input type="number" name="contact" id="" placeholder="Contact Number"><br>
                        <input type="email" name="email" id="" placeholder="Mail Addresss"><br>
                        <input type="password" name="password" id="" placeholder="Password"><br>
                        <input type="password" name="cpassword" id="" placeholder=" Confirm Password"><br>
                    </div>
                </div>
                <button type="submit" class="submit" name="register">Register</button>
                <button type="reset" class="reset">Reset</button>
            </form>
        </div>
        <div class="flexbox">
            <div class="register block_reg">
                <p>This is the Right Place to get Jobs
                    <br><br>
                    Not yet Register Yourself?
                    <br><br>
                    Register Yourself Here...
                    <br><br>
                    <button class="submit" type="submit"><label for="check">Register</label></button>
                </p>
            </div>
            <div class="login block_reg">
                <?php
                if (isset($_REQUEST['email_log'])) {
                    $email = $_REQUEST['email_log'];
                    $pass = $_REQUEST['password_log'];
                    $query = "SELECT * FROM users where email='$email' and password='$pass'";
                    $res = mysqli_query($conn, $query);
                    if ($row = mysqli_fetch_array($res)) {
                        session_start();
                        $_SESSION['u_email'] = $email;
                        header("Location:userDashboard.php");
                    } else {
                        echo "Sorry, We failed to find your account. Please Register first..";
                    }
                }
                ?>
                <p>Login to Company dashboard</p>
                <form action="" method="post">
                    <input type="email" name="email_log" placeholder="Email" required><br>
                    <input type="password" name="password_log" placeholder="Password" required><br>
                    <input class="submit" type="submit" name="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>