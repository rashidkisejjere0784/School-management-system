<?php
$login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
if($login_code=="false"){
    $login_message="Wrong Credentials !";
	  $color="red";
}
else{
    $login_message="Please Login To Continue";
	  $color="green";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <link rel="stylesheet" href="./source/CSS/bootstrap.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .container {
            margin-top: 50px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }

        .login-message {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo text-center">
            <img src="source/logo.jpg" alt="Logo">
        </div>
        <hr>
        <div class="login-form">
            <p class="login-message"><?php echo $login_message; ?></p>
            <form action="service/check.access.php" onsubmit="return loginValidate();" method="post">
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="myid" name="myid" placeholder="Login ID" autofocus required>
                </div>
                <div class="form-group mb-2">
                    <input type="password" class="form-control" id="mypassword" name="mypassword" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Login">
                </div>
            </form>
        </div>
    </div>

    <script src="source/js/loginValidate.js"></script>
</body>
</html>

