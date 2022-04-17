<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_job_applied.css">
    <style>
        .userEmail {
            border: 1px solid gray;
            border-radius: 5px;
            padding: 8px;
            color: black;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col col1">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'post_jobs');
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $q = "select * from jobs_post where id=$id";
                $result = mysqli_query($c, $q);
                $row = mysqli_fetch_array($result); ?>
                <h4 class="position"><?php echo $row["position"] ?></h4>
                <hr>
                <br>
                <h5><span class="cname">Comapany Name: </span><span class="name"><?php echo $row['company_name']; ?></span></h5>
                <br>
                <h5><span class="cname col">Job Description: </span><span class="name col"><?php echo $row['job_des']; ?></span></h5>
                <br>
                <h5><span class="cname">Skills Required: </span><span class="name"><?php echo $row['skills']; ?></span></h5>
                <br>
                <h5><span class="cname">Job Type: </span><span class="name"><?php echo $row['type']; ?></span></h5>
                <br>
                <h5><span class="cname">Location: </span><span class="name"><?php echo $row['location']; ?></span></h5>
                <br>
                <h5><span class="cname">CTC: </span><span class="name"><?php echo $row['ctc']; ?></span></h5>
        </div>
        <?php
                $uemail = $_REQUEST['email'];
                // echo $uemail;
                $c = mysqli_connect('localhost', 'root', '', 'post_jobs');
                if (isset($_REQUEST['candidate_name'])) {
                    $job_id = $row['unique_id'];
                    $fullname = $_REQUEST['candidate_name'];
                    $mail = $_REQUEST['email'];
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
                    $allowed = array('pdf', 'jpg', 'jpeg', 'png', 'doc');
                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 10000000) {
                                $fileNameNew = rand(1000, 100000) . "." . $fileActualExt;
                                $fileDestination = 'uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            } else {
                                echo "Your file is too big";
                            }
                        } else {
                            echo "There was an error uploading your file!";
                        }
                    } else {
                        echo "You cannot upload files of this type!";
                    }
                    $query_job_apply = "insert into jobs_applied(job_id,cand_name,mail,contact,company_name,companyMail,position,resume) values('$job_id','$fullname','$mail','$number','$companyName','$companyMail','$position','$fileNameNew')";
                    $result_job_apply = mysqli_query($c, $query_job_apply);
                }
        ?>
        <div class="col col1">
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
                <input type="submit" class="btn btn-primary" value="Apply"></input>
            </form>
        </div>
    </div>
</body>

</html>
<?php } ?>