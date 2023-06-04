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
<html>
    <head>
        <script src = "JS/currentDate.js"></script>
        <script src = "JS/newTeacherValidation.js"></script>
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
                <?php include './include/teacher top bar.php' ?>
        <center>
            <h2>Teacher Registration.</h2><hr/>
            <form action="#" method="post" onsubmit="return newTeacherValidation();" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      
      <div class="form-group">
        <label for="teaName">Teacher Name:</label>
        <input id="teaName" type="text" required  name="teacherName" class="form-control" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label for="teaPassword">Teacher Password:</label>
        <input id="teaPassword" type="text"  required name="teacherPassword" class="form-control" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="teaPhone">Teacher Phone:</label>
        <input id="teaPhone" type="text" required  name="teacherPhone" class="form-control" placeholder="Enter Phone Number">
      </div>
      <div class="form-group">
        <label for="teaEmail">Teacher Email:</label>
        <input id="teaEmail" type="text"  required name="teacherEmail" class="form-control" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="file">Teacher Picture:</label>
        <input id="file" type="file" name="file" required class="form-control file">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="teaAddress">Teacher Address:</label>
        <input id="teaAddress" required  type="text" name="teacherAddress" class="form-control" placeholder="Enter Address">
      </div>
      <div class="form-group">
        <label>Gender:</label>
        <div>
          <input type="radio" name="gender" value="Male" onclick="teaGender = this.value;"> Male
          <input type="radio" name="gender" value="Female" onclick="teaGender = this.value;"> Female
        </div>
      </div>
      <div class="form-group">
        <label for="teaDOB">Teacher DOB:</label>
        <input id="teaDOB" type="date" required  name="teacherDOB" class="form-control" placeholder="Enter DOB (yyyy-mm-dd)">
      </div>
      <div class="form-group">
        <label for="teaHireDate">Teacher Hire Date:</label>
        <input id="teaHireDate" required  name="teacherHireDate" value="<?php echo date('Y-m-d');?>" readonly class="form-control">
      </div>
      <div class="form-group">
        <label for="teaSalary">Salary:</label>
        <input id="teaSalary" type="text" required  name="teacherSalary" class="form-control" placeholder="Enter Salary">
      </div>
     
    </div>
  </div>
  <div class="form-group mt-2">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
  </div>
</form>

        </center>
		</body>
</html>
<?php
include_once('../../service/mysqlcon.php');
if(!empty($_FILES))
if(!empty($_POST['submit'])){
    $teaName = $_POST['teacherName'];
    $teaPassword = $_POST['teacherPassword'];
    $teaPhone = $_POST['teacherPhone'];
    $teaEmail = $_POST['teacherEmail'];
    $teaGender = $_POST['gender'];
    $teaDOB = $_POST['teacherDOB'];
    $teaHireDate = $_POST['teacherHireDate'];
    $teaAddress = $_POST['teacherAddress'];
    $teaSalary = $_POST['teacherSalary'];
    $teaId = "te-" . $teaEmail;

    //$filename = $_FILES['file']['name'];
    $filetmp =$_FILES['file']['tmp_name'];
    //echo $filename;
    $newloc = "../images/".$teaId.".jpg";
    move_uploaded_file($filetmp, $newloc);
    $sql = "INSERT INTO teachers VALUES('$teaId','$teaName','$teaPassword','$teaPhone','$teaEmail','$teaAddress','$teaGender','$teaDOB','$teaHireDate','$teaSalary', '$newloc');";
    $success = mysqli_query($link, $sql );
    $sql = "INSERT INTO users VALUES('$teaId','$teaPassword','teacher');";
    $success = mysqli_query($link, $sql );
    if(!$success) {
        die('Could not enter data: '.mysqli_error());
    }
    echo "Entered data successfully\n";
}
?>
