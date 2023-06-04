<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
$sql = "SELECT * FROM students;";
$res= mysqli_query($link, $sql);
$string = "";
$images_dir = "../images/";
while($row = mysqli_fetch_array($res)){
    $picname = $row['id'];
    $string .= '<tr><td>'.$row['id'].'</td><td>'.$row['name'].
    '</td><td>'.$row['parentid'].'</td><td>'.$row['classid'].
    "</td><td><img src='".$row['profile']."' alt='$picname' width='150' height='150'></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#studentModal".$row['id']."'>View Details</button></td></tr>";

    // Modal for each student
    $modalContent = '<div class="modal fade" id="studentModal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel'.$row['id'].'" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentModalLabel'.$row['id'].'">Student Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> '.$row['id'].'</p>
                                    <p><strong>Name:</strong> '.$row['name'].'</p>
                                    <p><strong>Phone:</strong> '.$row['phone'].'</p>
                                    <p><strong>Email:</strong> '.$row['email'].'</p>
                                    <p><strong>Gender:</strong> '.$row['sex'].'</p>
                                    <p><strong>DOB:</strong> '.$row['dob'].'</p>
                                    <p><strong>Addmission Date:</strong> '.$row['addmissiondate'].'</p>
                                    <p><strong>Address:</strong> '.$row['address'].'</p>
                                    <p><strong>Parent ID:</strong> '.$row['parentid'].'</p>
                                    <p><strong>Class ID:</strong> '.$row['classid'].'</p>
                                    <img src="'.$images_dir.$picname.'.jpg" alt="'.$picname.'" width="150" height="150">
                                </div>
                            </div>
                        </div>
                    </div>';
    echo $modalContent;
}
?>

<!DOCTYPE html>
<html>
<head>
    < <link rel="stylesheet" type="text/css" href="../../source/CSS/bootstrap.css">
  <script src="JS/login_logout.js"></script>
  <link rel="stylesheet" href="./include/style.css">
    <script src="./JS/searchStudent.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 150px;
            max-height: 150px;
        }

        .content {
            margin: 10px auto;
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
                <table>
                <tr>
                    <td><b>Search By Id Or Name: </b></td>
                    <td><input class="form-control" type="text" name="searchId" placeholder="Search By Id Or Name:" onkeyup="getStudent(this.value);"></td>
                </tr>
            </table>

                <h2 class="text-center">Students List</h2>
                <table class="table table-bordered" id="studentList">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent Id</th>
                            <th>Class Id</th>
                            <th>Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $string; ?>
                    </tbody>
                </table>
                <br/>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
