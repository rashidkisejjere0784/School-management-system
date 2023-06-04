<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
$sql = "SELECT * FROM teachers;";
$res = mysqli_query($link, $sql);
$string = "";
$images_dir = "../images/";
while ($row = mysqli_fetch_array($res)) {
    $picname = $row['id'];
    $string .= "<form action='deleteTeacherTableData.php' method='post'>" .
        "<tr>
            <td><input type='submit' class='btn btn-danger' name='submit' value='Delete'></td>
            <input type='hidden' value='" . $row['id'] . "' name='id' />
            <td>" . $row['id'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['salary'] . "</td>
            <td><img src='" . $images_dir . $picname . ".jpg' alt='$picname' class='img-thumbnail' width='150' height='150'></td>
        </tr>
    </form>";
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../source/CSS/bootstrap.css">
    <script src="JS/login_logout.js"></script>
    <link rel="stylesheet" href="./include/style.css">
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
                <h2>Delete Teacher</h2>
                <hr/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Select For Delete</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $string; ?>
                    </tbody>
                </table>
            </center>
        </div>
    </div>
</div>
</body>
</html>
