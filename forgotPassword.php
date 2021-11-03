<?php
    session_start();// isset checks if variable is set or not
    if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!=true){
        header("location:index.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $userid=$_POST["userid"];// user id of owner
        $password=$_POST["password"];// new password 
        $sql="UPDATE `user` SET `password` = '$password' WHERE `user`.`userid` = $userid;";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo"password changed";
        }
        else
        {
            echo "error";
         }
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
<form action="forgotpassword.php" method="post">
        <label><b>enter your user user id</b> </label><br>
        <input class="createUser-control" type="text" name="userid" id="userid"required><br><br>
        <label><b>new password</b> </label><br>
        <input class="createUser-control" type="text" name="password" id="password"  required><br><br>
        <button class="submit-button">SUBMIT</button>
    </form>
</body>
</html>


