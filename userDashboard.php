<?php include "user_auth.php" ?>
<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="nav1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            padding: 20px;
        }

        .flex {
            display: flex;
            justify-content: space-evenly;

        }

        .cta button {
            background-color: red;
            margin-left: 30px;
            padding: 9px 25px;
            border: none;
            font-size: 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }

        .cta button:hover {
            background-color: red;
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
                    <?php $email = $_SESSION['u_email']; ?>
                    <li><a href="userDashboard.php">Applied Jobs</a></li>
                    <li><a href="career.php">To Apply Jobs</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <a href="user_logout.php" class="cta"><button class="btn btn-danger">Logout</button></a>
        </header>
        <div class="content">
            <h4><br>Companies You Applied Are Listed Here...<br><br></h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Job Type</th>
                        <th scope="col">Job Location</th>
                        <th scope="col">Package</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "select * from `jobs_applied` where mail=" . "'$email'";
                    $res = mysqli_query($c, $query);
                    $row = mysqli_fetch_array($res);
                    $counter = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        $job_id = $row['job_id'];
                        $query1 = "select * from `jobs_post` where unique_id = $job_id";
                        $res1 = mysqli_query($c, $query1);
                        while ($row1 = mysqli_fetch_array($res1)) {
                            $counter = $counter + 1;
                    ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $row1["company_name"]; ?></td>
                                <td><?php echo $row1["position"]; ?></td>
                                <td><?php echo $row1["type"]; ?></td>
                                <td> <?php echo $row1["location"]; ?></td>
                                <td><?php echo $row1["ctc"]; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>