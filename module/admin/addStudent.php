<?php
include_once('../../service/mysqlcon.php');
$check=$_SESSION['login_id'];
$session=mysqli_query($link, "SELECT name  FROM admin WHERE id='$check' ");
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
if(!isset($login_session)){
    header("Location:../../");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../source/CSS/bootstrap.css">
    <script src="JS/login_logout.js"></script>
    <link rel="stylesheet" href="./include/style.css">

    <style>
        .form-container {
            margin: 0 auto;
        }

        .form-container input[type="text"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="radio"] {
            margin-right: 5px;
        }

        .form-container input[type="submit"] {
            background-color: #6c3483;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #5b2d75;
        }
    </style>
    
</head>
<body>
    <?php include './include/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include './include/sidebar.php' ?>
            <div class="content col-md-9 card ms-2">
                <?php include './include/student top bar.php' ?>

				<hr>
				<div align="center">
            <h2>Student Registration.</h2><hr/>
            <div class="form-container">
            <form action="#" method="post" onsubmit="return newStudentValidation();" enctype="multipart/form-data">
                <div class="row">
                    
                    <div class="form-group col-md-6">
                        <label for="stuName">Student Name:</label>
                        <input id="stuName" type="text" name="studentName" class="form-control" required  placeholder="Enter Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stuPassword">Student Password:</label>
                        <input id="stuPassword" type="text" name="studentPassword" class="form-control" required  placeholder="Enter Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stuPhone">Student Phone:</label>
                        <input id="stuPhone" type="text" name="studentPhone" class="form-control" required  placeholder="Enter Phone Number">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stuEmail">Student Email:</label>
                        <input id="stuEmail" type="text" name="studentEmail" class="form-control" required placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Gender:</label>
                        <div>
                            <input type="radio" name="gender" value="Male" onclick="stuGender = this.value;"> Male
                            <input type="radio" name="gender" value="Female" onclick="stuGender = this.value;"> Female
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stuDOB">Student DOB:</label>
                        <input id="stuDOB" type="date" name="studentDOB" class="form-control" required  placeholder="Enter DOB (yyyy-mm-dd)">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stuAddmissionDate">Student Admission Date:</label>
                        <input id="stuAddmissionDate" name="studentAddmissionDate" required  value="<?php echo date('Y-m-d');?>" readonly class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stuAddress">Student Address:</label>
                        <input id="stuAddress" type="text" name="studentAddress" required  class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stuParentId">Student Parent Id:</label>
                        <input id="stuParentId" type="text" name="studentParentId"  required class="form-control" placeholder="Enter Parent Id">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stuClassId">Student Class Id:</label>
                        <input id="stuClassId" type="text" name="studentClassId"  required class="form-control" placeholder="Enter Class Id">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="file">Student Picture:</label>
                        <input id="file" type="file" name="file" required  class="form-control-file">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php
include_once('../../service/mysqlcon.php');
if(!empty($_POST['submit'])){
    $stuName = $_POST['studentName'];
    $stuPassword = $_POST['studentPassword'];
    $stuPhone = $_POST['studentPhone'];
    $stuEmail = $_POST['studentEmail'];
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['studentDOB'];
    $stuAddmissionDate = $_POST['studentAddmissionDate'];
    $stuAddress = $_POST['studentAddress'];
    $stuParentId = $_POST['studentParentId'];
    $stuClassId = $_POST['studentClassId'];

    $stuId = "st-" . $stuEmail;



    //$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    $newloc = "../images/".$stuId.".jpg";
    move_uploaded_file($filetmp , $newloc);
    $sql = "INSERT INTO students VALUES('$stuId','$stuName','$stuPassword','$stuPhone','$stuEmail','$stugender','$stuDOB','$stuAddmissionDate','$stuAddress','$stuParentId','$stuClassId', '$newloc');";
    $success = mysqli_query($link, $sql);
    $sql = "INSERT INTO users VALUES('$stuId','$stuPassword','student');";
    $success = mysqli_query($link, $sql);
    if(!$success) {
        die('Could not enter data: '.mysqli_error());
    }
    echo "Entered data successfully\n";
}
?>

