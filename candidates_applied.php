<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
        }

        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .sidebar {
            left: -25px;
            position: fixed;
            width: 315px;
            height: 100%;
            background-color: #042331;
            transition: all .5s ease;
        }

        .sidebar header {
            font-size: 22px;
            color: white;
            text-align: center;
            line-height: 70px;
            background-color: #063146;
        }

        .sidebar ul a {
            display: block;
            height: 100%;
            width: 100%;
            line-height: 65px;
            font-size: 20px;
            padding-left: 1px;
            color: white;
            box-sizing: border-box;
            border-top: 1px solid rgba(255, 255, 255, .1);
            border-bottom: 1px solid black;
            transition: .4s;
        }

        ul li:hover a {
            padding-left: 40px;
        }

        .sidebar ul a i {
            margin-right: 16px;
        }

        section {
            padding-top: 15px;
            transition: all .5s ease;
            margin-left: 310px;
        }
    </style>

</head>

<body>

    <!-- The sidebar -->
    <?php
    $email = $_SESSION['email']; ?>
    <div class="sidebar">
        <header>Job Portal</header>
        <ul>
            <li><a href="dashboard.php?email=<?php echo $email ?>"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href="candidates_applied.php?email=<?php echo $email ?>"><i class="fa-solid fa-user-group"></i>Candidates Applied</a></li>
            <li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
            <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
            <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </div>
    <section>
        <div class="description" style="text-align: center;">
            <h5>Total Candidates Aplied for this Company </h5>
        </div>
        <hr>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Candidate Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Mail ID</th>
                        <th scope="col">Position</th>
                        <th scope="col">Resume</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $c = mysqli_connect('localhost', 'root', '', 'post_jobs');
                        $query = "select * from `jobs_applied` where companyMail = " . "'$email'";
                        $res = mysqli_query($c, $query);
                        while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["cand_name"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td> <?php echo $row["mail"]; ?></td>
                        <td><?php echo $row["position"]; ?></td>
                        <td><a target="_blank" href="uploads\<?php echo $row["resume"] ?>">Resume</a></td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>