<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Job Portal</title>
    <style>
        .form {
            display: flex;
            justify-content: center;
            text-align: center;
            transform: translateY(40vh);
        }

        .form .login {
            border: 1px solid black;
            width: min-content;
            padding: 20px;
            border-radius: 5px;
            margin: 10px;

        }

        .form input {
            padding: 10px;
            margin: 5px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 1.1em;
            border-radius: 5px;
        }

        .form button {
            padding: 10px;
            margin: 5px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 1.1em;
            border-radius: 5px;
            background-color: green;
            color: white;
            width: 100px;
        }

        .form .register {
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }

        .form .register a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="form">
        <div class="register">
            <p>This is the Right Place to get Jobs
                <br><br>
                Not yet Register Yourself?
                <br><br>
                Register Yourself Here...
                <br><br>
                <a href="register.php"><button type="submit">Register</button></a>
            </p>
        </div>
        <div class="login">
            <?php
            if (isset($_REQUEST['email'])) {
                $email = $_REQUEST['email'];
                $pass = $_REQUEST['password'];
                $query = "SELECT * FROM users where email='$email' and password='$pass'";
                $res = mysqli_query($conn, $query);
                if ($row = mysqli_fetch_array($res)) {
                    header("Location:userDashboard.php?email=$email");
                } else {
                    echo "Sorry, We failed to find your account. Please Register first..";
                }
            }
            ?>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>