<?php include "auth.php" ?>
<?php include "conn.php" ?>
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
    <div>
        <?php
        $company_mail = $_SESSION['email'];
        $title_name = "select * from jobs_post where email = " . "'$company_mail'";
        $res = mysqli_query($c, $title_name);
        $ro = mysqli_fetch_array($res);
        ?>
        <div class="sidebar">
            <header>Job Portal</header>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-qrcode"></i>Dashboard</a></li>
                <li><a href="candidates_applied.php?email=<?php echo $company_mail ?>"><i class="fa-solid fa-user-group"></i>Candidates Applied</a></li>
                <li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
                <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
            </ul>
        </div>
        <section>
            <div style="padding:0 40px;display:flex;justify-content :space-between;">
                <div style="display:flex;flex-wrap :wrap;">
                    <div>
                        <h3><?php echo  $ro['company_name']; ?></h3>
                    </div>
                    <div style="padding-top: 10px;">'s Dashboard</div>
                </div>
                <div>
                    <button onclick="logout()" class="btn btn-danger">Logout</button>
                </div>
            </div>
            <hr>
            <div class="content">
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Post Job
                    </a>
                </p>
                <?php
                $reg_query = "select * from `reg-companies`";
                $reg_results = mysqli_query($c, $reg_query);
                $reg_row = mysqli_fetch_array($reg_results);
                $con = $c;
                if (isset($_REQUEST['position'])) {
                    $company_name = $reg_row['comp_name'];
                    $cemail = $company_mail;
                    $position = $_REQUEST['position'];
                    $job_desc = $_REQUEST['job_desc'];
                    $skills = $_REQUEST['skills'];
                    $type = $_REQUEST['type'];
                    $location = $_REQUEST['location'];
                    $ctc = $_REQUEST['ctc'];
                    $uniq = uniqid();
                    $post_query = "insert into jobs_post (unique_id,email,company_name,position,job_des,skills,type,location,ctc) values('$uniq','$cemail','$company_name','$position','$job_desc','$skills','$type','$location','$ctc')";
                    $results = mysqli_query($con, $post_query);
                }
                ?>
                <div class="collapse box" id="collapseExample">
                    <div class="card card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="Company Name" class="form-label">Company Name</label>
                                <p style="cursor: not-allowed;" class="form-control" id="" name="company_name"><?php echo $reg_row['comp_name']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="Company Name" class="form-label">Email Id</label>
                                <p style="cursor: not-allowed;" class="form-control" id="" name="email"><?php echo $reg_row['comp_mail']; ?></p>
                            </div>
                            <div class=" mb-3">
                                <label for="exampleInputPosition" class="form-label">Position</label>
                                <input type="text" class="form-control" id="exampleInputPosition" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="JobDesc" class="form-label">Job Description</label>
                                <input type="text" class="form-control" id="JobDesc" name="job_desc" required>
                            </div>
                            <div class="mb-3">
                                <label for="JobDesc" class="form-label">Skills Required</label>
                                <input type="text" class="form-control" id="JobDesc" name="skills" required>
                            </div>
                            <div class="mb-3">
                                <label for="CTC" class="form-label">Job Type</label>
                                <input type="text" class="form-control" id="CTC" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="JobDesc" class="form-label">Job Location</label>
                                <input type="text" class="form-control" id="JobDesc" name="location" required>
                            </div>
                            <div class="mb-3">
                                <label for="CTC" class="form-label">CTC</label>
                                <input type="text" class="form-control" id="CTC" name="ctc" required>
                            </div>
                            <input type="submit" class="btn btn-primary" value="POST"></input>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Comany Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Skills</th>
                            <th scope="col">Job Type</th>
                            <th scope="col">Location</th>
                            <th scope="col">CTC</th>
                            <th scope="col">Responses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $query1 = "select * from jobs_post where email= " . "'$company_mail'";
                            $post_results = mysqli_query($con, $query1);
                            $counter = 0;
                            while ($row = mysqli_fetch_array($post_results)) {
                                $counter += 1; ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
                                    <td><?php echo $row["position"]; ?></td>
                                    <td><?php echo $row["job_des"]; ?></td>
                                    <td><?php echo $row["skills"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["location"]; ?></td>
                                    <td><?php echo $row["ctc"]; ?></td>
                                    <?php $_SESSION['unique_id'] = $row['unique_id']; ?>
                                    <td class="details"><a href="jobs.php">

                                            <input type="button" class="btn button btn-success" value="view Details">
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    function logout() {
        console.log("Syam");
        window.location.replace("logout.php");
    }
</script>

</html>