<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
if($_POST['submit']){
    $id = $_POST['id'];
    echo $id;
    $sql = "DELETE FROM students WHERE id = '$id';";
    $success = mysqli_query( $link,$sql );
    
    if(!$success) {
        die('Could not Delete data: '.mysqli_error());
    }
    unlink('../images/'.$id.'.jpg');
    echo "Delete data successfully\n";
    header("Location:../admin/deleteStudent.php");
}
?>
