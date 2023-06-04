<?php
include_once('main.php');
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../../source/CSS/bootstrap.css">
  <script src="JS/login_logout.js"></script>
  <link rel="stylesheet" href="./include/style.css">
        <script src = "JS/searchForUpdateTeacher.js"></script>

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
        <?php include './include/teacher top bar.php' ?>
			  <hr/>
        <center>
            <table>
                <tr>
                    <td><b>Search By Id Or Name: </b></td>
                    <td><input type="text" name="searchId" class = "form-control" placeholder="Search By Id Or Name:" onkeyup="getTeacherForUpdate(this.value);"></td>
                </tr>
            </table>
        </center>
        <br/>
        <center>
          <h2>Only One Teacher Can Update at a time.</h2>
            <form action="#" method="post" class="table-responsive overflow-schroll" onsubmit="return newTeacherValidation();" enctype="multipart/form-data">
                <table border="1" cellpadding="6" id='updateTeacherData'>
                </table>
            </form>
        </center>
		</body>
</html>
<?php
include_once('../../service/mysqlcon.php');
if(!empty($_POST['submit'])){
    $Id = $_POST['id'];
    $Name = $_POST['name'];
    $Password = $_POST['password'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $gender = $_POST['gender'];
    $DOB = $_POST['dob'];
    $hiredate = $_POST['hiredate'];
    $Address = $_POST['address'];
    $salary = $_POST['salary'];
    $uploads_dir = "../images";
   // move_uploaded_file($image, "$uploads_dir/$image");
    $sql = "UPDATE teachers SET id='$Id', name='$Name', password='$Password', phone='$Phone', email='$Email', address='$Address', sex='$gender', dob='$DOB', hiredate='$hiredate', salary='$salary' WHERE id='$Id'";
    $success = mysqli_query($link, $sql );
    if(!$success) {
        die('Could not Update data: '.mysqli_error());
    }
    echo "Update data successfully\n";
}
?>
