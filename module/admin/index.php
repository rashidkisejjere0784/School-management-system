<?php
include_once('main.php');
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
                <h3 class="hello-admin">Hi! Admin <?php echo $check; ?></h3>
                <!-- Add your main content here -->
            </div>
        </div>
    </div>
</body>
</html>
