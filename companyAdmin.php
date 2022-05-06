<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="nav1.css">
    <link rel="stylesheet" href="compAdmin.css">
    <script src="https://kit.fontawesome.com/a16ff108d1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <header>
            <img class="logo" alt="" src="logo.jpg" alt="">
            <nav>
                <ul class="nav_links">
                    <li><a href="dashboard.php">Posted Jobs</a></li>
                    <li><a href="career.php">services</a></li>
                    <li><a href="#">projects</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Login/Sign up</a></li>

                </ul>
            </nav>
            <a href="#" class="cta"><button>Contact</button></a>
        </header>

        <input type="checkbox" name="" id="check">
        <div class="reg">
            <div class="header-reg">
                <div class="head">
                    <h6>Registration Form</h6>
                </div>
                <div class="can">
                    <label for="check" class="cancel">Close<i class="fas fa-times"></i></label>
                </div>
            </div>
            <hr>
            <?php
            if (isset($_REQUEST['Company_name'])) {
                $cname = $_REQUEST['Company_name'];
                $noOpenings = $_REQUEST['openings'];
                $loc = $_REQUEST['location'];
                $sal = $_REQUEST['salary'];
                $contact = $_REQUEST['contact'];
                $email = $_REQUEST['email'];
                $pass = $_REQUEST['password'];
                $cpass = $_REQUEST['cpassword'];
                $id = rand(1, 10000);
                $query = "insert into `reg-companies` (unique_id,comp_name,comp_mail,avg_salary,no_openings,comp_customer_care,comp_address,password,cpassword) values ($id,'$cname','$email','$sal','$noOpenings','$contact','$loc','$pass','$cpass')";
                $res = mysqli_query($c, $query);
            }
            ?>
            <form action="" class="form" method="POST">
                <h1>Sign up & Start Hiring the Talented</h1>
                <div class="popup_block">
                    <div>
                        <input type="text" name="Company_name" id="" placeholder="Company Name" required><br>
                        <input type="number" name="openings" id="" placeholder="No.of Opeings"><br>
                        <input type="text" name="location" id="" placeholder="Company Location"><br>
                        <input type="number" name="salary" id="" placeholder="Average Salary Paid"><br>
                    </div>
                    <div>
                        <input type="number" name="contact" id="" placeholder="Contact Number"><br>
                        <input type="email" name="email" id="" placeholder="Comapny Mail Addresss"><br>
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
                <p>This is the Right Place to Hire Employees<br><br>Not yet Register Your Company ? <br><br>Register
                    Your Company Here...
                    <br>
                    <button class="submit" type="submit"><label for="check">Register</label></a>
            </div>
            <div class="login block_reg">
                <p>Login to Company dashboard</p>
                <form action="" method="POST">
                    <input type="email" placeholder="Enter comapany Mail Address" name="login_email" required><br>
                    <input type="password" placeholder="Password" name="login_password" required><br>
                    <input type="submit" class="submit" name="login">
                </form>
                <?php
                if (isset($_REQUEST['login_email'])) {
                    $login_email = $_REQUEST['login_email'];
                    $login_password = $_REQUEST['login_password'];
                    $q = "select * from `reg-companies` where comp_mail = '$login_email' and password = '$login_password'";
                    $res = mysqli_query($c, $q);
                    if ($row = mysqli_fetch_array($res)) {
                        session_start();
                        $_SESSION['email'] = $login_email;
                        header("Location:dashboard.php");
                    } else { ?>
                        <p style="color: blue;"><?php echo "*** Wrong email Address / Password ***"; ?></p>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>