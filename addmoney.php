<?php
include 'partials/_dbconnect.php';
session_start();// isset checks if variable is set or not
if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
    $userid=$_SESSION['userid'];
    $sql="SELECT * FROM `user` WHERE `userid`='userid'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $currbalance= $row['balance'] ;//current balance of benefeciary
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>