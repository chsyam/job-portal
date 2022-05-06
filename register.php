<?php include "conn.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputNumber" class="form-label">Phone Number</label>
                <input type="number" name="phone_no" class="form-control" id="exampleInputNumber" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword2" required>
            </div>

            <input type="submit" class="btn btn-primary"></input>
            <?php
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "";
            if (isset($_REQUEST['name'])) {
                $name = $_REQUEST['name'];
                $email = $_REQUEST['email'];
                $phoneNumber = $_REQUEST['phone_no'];
                $password = $_REQUEST['password'];
                $cpassword = $_REQUEST['cpassword'];
                if ($password == $cpassword) {
                    $query = "insert into users (Name,phoneNumber,email,password) values ('$name','$phoneNumber','$email','$password')";
                    if (mysqli_query($conn, $query)) {
                        echo "Record inserted successfully.. Go to Login Page";
                        header("Location:login.php");
                    } else {
                        echo "Error : Could not able to execute $sql. " . mysqli_error($conn);
                    }
                } else {
                    echo "Passwords don't match";
                }
            }

            mysqli_close($conn);
            ?>
            <p style="text-align: center;">Already Registered?<a href="login.php">Login</a></p>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>