<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Employess</title>
    <style>
        .form {
            padding-left: 25%;
            padding-right: 25%;
            text-align: center;
            transform: translateY(100px);
        }

        .block {
            display: flex;
            justify-content: space-evenly;
        }

        .block input {
            width: 100%;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 1em;
            outline: none;
        }

        .form button {
            padding: 10px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            width: 100px;
            font-size: 1.15em;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .form .register {
            background-color: blue;
            color: white;
            border: none;
        }

        .form .register:hover {
            background-color: green;
            box-shadow: 2px 2px 16px green;
            transition: 0.2s all ease;
        }

        .form .reset {
            border: none;
            color: white;
            background-color: blueviolet;
        }

        .form .reset:hover {
            background-color: red;
            box-shadow: 2px 2px 16px red;
            transition: 0.5s all ease;
        }

        h1 {
            text-align: center;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="form">
        <?php
        if (isset($_REQUEST['Company_name'])) 
        {
            $cname = $_REQUEST['Company_name'];
            $noOpenings = $_REQUEST['openings'];
            $loc = $_REQUEST['location'];
            $sal = $_REQUEST['salary'];
            $type = $_REQUEST['type'];
            $license = $_REQUEST['license'];
            $contact = $_REQUEST['contact'];
            $email = $_REQUEST['email'];
            $pass = $_REQUEST['password'];
            $cpass = $_REQUEST['cpassword'];
            $id = rand(1, 1000);
            $query = "insert into `reg-companies` (unique_id,comp_name,comp_mail,type,avg_salary,service_number,no_openings,comp_customer_care,comp_address,password,cpassword) values ($id,'$cname','$email','$type','$sal','$license','$noOpenings','$contact','$loc','$pass','$cpass')";
            $res = mysqli_query($c, $query);

            print_r($res);
        } ?>


        <h1>Sign up & Start Hiring the Talented</h1>
        <form action="" method="POST">
            <div class="block">
                <div class="block1">
                    <input type="text" name="Company_name" id="" placeholder="Company Name" required><br>
                    <input type="number" name="openings" id="" placeholder="No.of Opeings"><br>
                    <input type="text" name="location" id="" placeholder="Company Location"><br>
                    <input type="number" name="salary" id="" placeholder="Average Salary Paid"><br>
                    <input type="text" name="type" id="" placeholder="Company Type"><br>
                </div>
                <div class="block2">
                    <input type="text" name="license" id="" placeholder="Company Service Number"><br>
                    <input type="number" name="contact" id="" placeholder="Contact Number"><br>
                    <input type="email" name="email" id="" placeholder="Comapny Mail Addresss"><br>
                    <input type="password" name="password" id="" placeholder="Password"><br>
                    <input type="password" name="cpassword" id="" placeholder=" Confirm Password"><br>
                </div>
            </div>
            <button type="submit" class="register" name="register">Register</button>
            <button type="reset" class="reset">Reset</button>
        </form>
    </div>
</body>

</html>