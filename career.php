<?php include "user_auth.php" ?>
<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped&display=swap" rel="stylesheet">
    <title>Career</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="career.css">
    <style>
        .butt {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="banner img-fluid">
            <h3>Job Portal<br>
                <span>Best Jobs Available matching your skills</span>
            </h3>
        </div>

        <div class="row">
            <?php
            $query = "select * from jobs_post";
            $result = mysqli_query($c, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="content col-3">
                    <h3 class="role"><?php echo $row['position']; ?></h3>
                    <hr>
                    <p><span class="keys">Company Name: </span><span class="values"><?php echo $row['company_name']; ?></span></p>
                    <p><span class="keys">Job Description:<br> </span><span class="values"><?php echo $row['job_des']; ?></span></p>
                    <p><span class="keys">Skills Required: </span><span class="values"><?php echo $row['skills']; ?></span></p>
                    <p><span class="keys">Job Location: </span><span class="values"><?php echo $row['location']; ?></span></p>
                    <p><span class="keys">Job Type: </span><span class="values"><?php echo $row['type']; ?></span></p>
                    <p><span class="keys">CTC: </span><span class="values"><?php echo $row['ctc']; ?></span></p>
                    <?php $_SESSION['id'] = $row['id'];
                    ?>
                    <p class="butt"><a href="job_apply.php"><button class="btn btn-primary" type="submit" name="" id="">Apply Now</button></a></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>