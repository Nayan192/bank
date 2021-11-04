
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
 <?php require 'partials/navbar.php'?>
    <h1>Account Info</h1>
    <?php
   session_start();
   include 'partials/_dbconnect.php';
   $owner=$_SESSION['userid'];//user id of owner of account
   $sql="SELECT * FROM `user` WHERE `userid`='$owner'";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   if($num==1)
   {
   $row = mysqli_fetch_assoc($result);
   echo $row['userid'];
   echo "<br>";
   echo $row['firstname'];
   echo "<br>";
   echo $row['lastname'];
   echo "<br>";
   echo $row['age'];
   echo "<br>";
   echo $row['gender'];
   echo "<br>";
   echo $row['phone'];
   echo "<br>";
   echo $row['email'];
   echo "<br>";
   echo $row['city'];
   echo "<br>";
   echo $row['balance'];
   }
   else{
       echo "unexpected error";
   }


?>
</body>
</html>