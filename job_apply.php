<?php include "conn.php" ?>
<?php include "user_auth.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .column-2 form {
            padding: 0 10%;
            width: 80%;
        }

        .column-2 input {
            border: 1px solid black;
        }

        .formhead {
            text-align: center;
            text-transform: capitalize;
            font-size: 2em;
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
        }

        .position {
            text-align: center;
            text-transform: capitalize;
            font-size: 2em;
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
        }

        .row {
            margin: 30px;
        }

        .cname {
            font-size: 1.1em;
            color: blue;
        }

        .input1 {
            border: 1px solid gray;
            border-radius: 5px;
            padding: 8px;
            color: black;
        }

        .star {
            color: red;
        }

        .name {
            font-family: sans-serif;
            font-size: 1.2em;
        }

        .btn11 {
            text-align: center;
        }

        .userEmail {
            border: 1px solid gray;
            border-radius: 5px;
            padding: 8px;
            color: black;
            cursor: not-allowed;
        }

        .column-1 {
            width: max-content;
            height: fit-content;
            border: 1px solid black;
            margin: 10px 80px;
        }

        .column-1 .cname {
            text-decoration: underline;
        }

        .column-2 {
            width: min-content;
            border: 1px solid black;
            margin: 10px 80px;
        }

        .sub {
            text-align: center;
            background-color: green;
            color: white;
            padding: 10px;
            font-size: 25px;
            margin: 15px;
            width: 150px;
            border: 1px solid green;
            border-radius: 5px;
        }

        .h1 {
            color: green;
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $q = "select * from jobs_post where id=$id";
        $result = mysqli_query($c, $q);
        $row = mysqli_fetch_array($result);
        $uemail = $_SESSION['u_email'];
        if (isset($_REQUEST['candidate_name'])) {
            $job_id = $row['unique_id'];
            $fullname = $_REQUEST['candidate_name'];
            $mail = $_SESSION['u_email'];
            $number = $_REQUEST['contact_number'];
            $companyName = $row['company_name'];
            $companyMail = $row['email'];
            $position = $row['position'];
            $file = $_FILES['resume'];
            $fileName = $_FILES['resume']['name'];
            $fileTmpName = $_FILES['resume']['tmp_name'];
            $fileSize = $_FILES['resume']['size'];
            $filetype = $_FILES['resume']['type'];
            $fileError = $_FILES['resume']['error'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('pdf');
            $fileNameNew = '';
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 10000000) {
                        $fileNameNew = rand(1000, 100000) . "." . $fileActualExt;
                        $fileDestination = 'uploads/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    } else { ?>
                        <div class="h1 error">
                            <?php echo "Your file is too big"; ?>
                        </div>
                    <?php }
                } else { ?>
                    <div class="h1 error">
                        <?php echo "There was an error uploading your file!"; ?>
                    </div>
                <?php }
            } else { ?>
                <div class="h1 error">
                    <?php echo "You cannot upload files of this type only .pdf files are allowed!"; ?>
                </div>

            <?php }
            $query_job_apply = "insert into jobs_applied(job_id,cand_name,mail,contact,company_name,companyMail,position,resume) values('$job_id','$fullname','$mail','$number','$companyName','$companyMail','$position','$fileNameNew')";
            $result_job_apply = mysqli_query($c, $query_job_apply);
            if ($result_job_apply && $fileNameNew) { ?>
                <div class="h1">
                    <h2><?php echo "Job Application Sent"; ?></h2>
                    <h4>( You will be redirected to main page in 3 seconds... )</h4>
                </div>
        <?php
                header("refresh:3;url=userDashboard.php");
            }
        } ?>
        <div class="row roww">
            <div class="col column-1">
                <h4 class="position"> <?php echo $row["position"] ?></h4>
                <hr>
                <br>
                <h5><span class="cname">Comapany Name:</span><span class="name"> <?php echo $row['company_name']; ?></span></h5>
                <br>
                <h5><span class="cname col">Job Description:</span><span class="name col"> <?php echo $row['job_des']; ?></span></h5>
                <br>
                <h5><span class="cname">Skills Required:</span><span class="name"> <?php echo $row['skills']; ?></span></h5>
                <br>
                <h5><span class="cname">Job Type:</span><span class="name"> <?php echo $row['type']; ?></span></h5>
                <br>
                <h5><span class="cname">Location:</span><span class="name"> <?php echo $row['location']; ?></span></h5>
                <br>
                <h5><span class="cname">CTC:</span><span class="name"> <?php echo $row['ctc']; ?></span></h5>
            </div>
            <div class="col column-2">
                <h3 class="formhead">Easy Apply</h3>
                <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Company Name" class="form-label">Company Name </label>

                        <div style="cursor:not-allowed;text-transform: capitalize;" class="input1" name="company_name"><?php echo $row['company_name']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPosition" class="form-label">Position</label>
                        <div style="cursor:not-allowed;text-transform:capitalize;" class="input1" id="position" name="position"><?php echo $row['position']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="JobDesc" class="form-label">Full Name<span class="star"> *</span></label>
                        <input type="text" class="form-control" id="candidate_name" name="candidate_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="JobDesc" class="form-label">Contact<span class="star"> *</span></label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="JobDesc" class="form-label">Mail ID<span class="star"> *</span></label>
                        <br>
                        <p class="userEmail"><?php echo $uemail; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="JobDesc" class="form-label">Upload Resume<span class="star"> *</span></label>
                        <input type="file" class="form-control" id="resume" name="resume" required>
                    </div>
                    <button class="sub" type="submit" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
</body>

</html>
<?php } ?>