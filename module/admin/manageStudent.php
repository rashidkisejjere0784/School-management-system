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
								<h4>Hi!admin <?php echo $check." ";?></h4>
				</div>
            </div>
        </div>
    </div>
</body>
</html>
