<?php
include_once('main.php');
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../../source/CSS/bootstrap.css">
  <script src="JS/login_logout.js"></script>
  <link rel="stylesheet" href="./include/style.css">
        <script src = "JS/searchForUpdateStudent.js"></script>

        <style>
    .table {
      margin-top: 20px;
    }

    th,
    td {
      vertical-align: middle !important;
    }

    th {
      background-color: #f8f9fa;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .btn-custom {
      background-color: #007bff;
      color: #ffffff;
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

        <center>
            <table class="mt-3">
                <tr class="mt-2">
                    <td><b>Search By Id Or Name: </b></td>
                    <td><input type="text" class="form-control" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStudentForUpdate(this.value);"></td>
                </tr>
            </table>
        </center>
        <br/>
        <center>
          <h2>Only One Student Can Update in a time.</h2>
            <form action="#" class ="table-responsive overflow-schroll" method="post" onsubmit="return newStudentValidation();" enctype="multipart/form-data">
                <table border="1" cellpadding="6" id='updateStudentData' class="">
                </table>
            </form>
        </center>
</div>
</div>
</div>
		</body>
</html>
<?php
include_once('../../service/mysqlcon.php');
if(!empty($_POST['submit'])){
    $stuId = $_POST['id'];
    $stuName = $_POST['name'];
    $stuPassword = $_POST['password'];
    $stuPhone = $_POST['phone'];
    $stuEmail = $_POST['email'];
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['dob'];
    $stuAddmissionDate = $_POST['addmissiondate'];
    $stuAddress = $_POST['address'];
    $stuParentId = $_POST['parentid'];
    $stuClassId = $_POST['classid'];
    $image = $_POST['pic'];
    $uploads_dir = "../images/student";
    move_uploaded_file($image, "$uploads_dir/$image");
    $sql = "UPDATE students SET id='$stuId', name='$stuName', password='$stuPassword', phone='$stuPhone', email='$stuEmail', sex='$stugender', dob='$stuDOB', addmissiondate='$stuAddmissionDate', address='$stuAddress', parentid='$stuParentId', classid='$stuClassId', profile='$uploads_dir/$image' WHERE id='$stuId'";
    $success = mysqli_query( $link,$sql );
    if(!$success) {
        die('Could not Update data: '.mysqli_error());
    }
    echo "Update data successfully\n";
}
?>
