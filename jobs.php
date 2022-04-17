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
    <link rel="stylesheet" href="sidebar.css">

</head>

<body>
    
    <!-- The sidebar -->
    <?php
    $id = $_REQUEST['unique_id'];

    $q = "select * from jobs_post where unique_id=$id";
    $r = mysqli_query($c, $q);
    $roww = mysqli_fetch_array($r);

    ?>
    <!-- <div class="sidebar">
        <a class="active" href="dashboard.php?email=<?php echo $roww['email']; ?>">Post a Job</a>
        <a href="candidates_applied.php?email=<?php echo $roww['email']; ?>">Candidates Applied</a>
        <a href=" #contact">Contact</a>
        <a href="#about">About</a>
    </div> -->
    <input type="checkbox" id="check" placeholder="x">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>Job Portal</header>
            <ul>
                <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
                <li><a class="active" href="dashboard.php?email=<?php echo $roww['email']; ?>"><i class="fas fa-stream"></i>Post a Job</a></li>
                <li><a href="candidates_applied.php?email=<?php echo $roww['email']; ?>">Candidates Applied</a></li>
                <li><a href="#"><i class="fas fa-stream"></i>Overview</a></li>
                <li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
                <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
            </ul>
        </div>
    <section>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Candidate Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Mail ID</th>
                        <th scope="col">Resume</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $query = "select * from jobs_applied where job_id = $id";
                        $res = mysqli_query($c, $query);
                        $counter = 0;
                        while ($row = mysqli_fetch_array($res)) {
                            $counter += 1; ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row["cand_name"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td> <?php echo $row["mail"]; ?></td>
                        <td><a target="_blank" href="uploads\<?php echo $row["resume"] ?>">Resume</a></td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>