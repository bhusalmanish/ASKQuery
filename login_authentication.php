<?php

require_once 'constant.php';
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $name);
$password = mysqli_real_escape_string($con, $password);

$sql = "select *from  tbl_user where username = '$name' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<h1><center> Login successful </center></h1>";
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}
