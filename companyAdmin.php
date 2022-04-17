<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="nav1.css">

    <style>
        body {
            background: #DCE35B;
            background: -webkit-linear-gradient(to right, #45B649, #DCE35B);
            background: linear-gradient(to right, #45B649, #DCE35B);

        }

        .container {
            padding: 20px;
        }

        .flex {
            display: flex;
            justify-content: space-evenly;

        }

        .flex .block {

            width: 400px;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            height: 250px;
            color: rgba(251, 24, 35, 0.89);
            background-color: darkgray;
            transform: translateY(50%);
        }

        .flex .register {
            font-family: Georgia, 'Times New Roman', Times, serif;
            text-align: center;
            font-size: 1.2em;
        }

        .flex .login {
            font-family: Georgia, 'Times New Roman', Times, serif;
            text-align: center;
            font-size: 1.2em;
        }

        .flex .register button {
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            background-color: blue;
            color: white;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 1.2rem;
            transform: translateY(60%);
        }

        .flex .login input {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            outline: none;
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
            width: 70%;
            font-size: 0.8 em;
        }

        .flex .login .submit {
            background-color: green;
            color: white;
            font-size: 1.2rem;
            color: white;
            width: 30%;
            padding: 10px;
            cursor: pointer;
        }
    </style>
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
        <div class="flex">
            <div class="register block">
                <p>This is the Right Place to Hire Employees<br><br>Not yet Register Your Company ? <br><br>Register
                    Your Company Here...
                    <br>
                    <a href="company_registration.php"><button>Register</button></a>
            </div>
            <div class="login block">
                <p>Login to Company dashboard</p>
                <form action="" method="POST">
                    <input type="email" placeholder="Enter comapany Mail Address" name="login_email" required><br>
                    <input type="password" placeholder="Password" name="login_password" required><br>
                    <input type="submit" class="submit" name="login">
                    <?php
                    if (isset($_REQUEST['login_email'])) {
                        $email = $_REQUEST['login_email'];
                        $pass = $_REQUEST['login_password'];
                        $res = "select * FROM `reg-companies` WHERE comp_mail='$email' and password = '$pass'";
                        $res1 = mysqli_query($c, $res);
                        session_start();
                        $row = mysqli_fetch_array($res1);
                        $id = $row['unique_id'];
                        if ($id) {
                            $_SESSION['email'] = $email;
                            $_SESSION['cname'] = $row['comp_name'];
                            header("location:dashboard.php?email=$email");
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>