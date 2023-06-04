<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db_name="schoolmsdb";
$link=mysqli_connect("$host", "$username", "$password", "$db_name")or die("Cannot Connect");
?>
