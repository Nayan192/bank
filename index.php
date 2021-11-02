<?php
    $login=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $userid=$_POST["userid"];
        $password=$_POST["password"];
        $sql="SELECT * FROM `user` WHERE `userid`='$userid' AND `password`='$password'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['userid']=$userid;
            header("location:homepage.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>login page</title>
</head>
<body class="body-background">
    <div class="background">
        <h1 class="main-heading">Welcome to ----- bank</h1>
        <h2 class="sub-heading">Login to your account</h2><br>
        <form class="loginform" action="index.php" method="post">
            <label><b>USER ID &nbsp&nbsp&nbsp&nbsp&nbsp</b> </label>  
            <input type="text" class="loginform-control" name="userid" id="userid" required><br><br></p>
            <label><b>PASSWORD &nbsp</b></label> 
            <input type="password" class="loginform-control" name="password" id="password" required><br><br></p>
            <button class="loginform-button" type="submit" >LOGIN</button><br><br>
            <a href="createUser.php">Create a new account</a>
            <a href="allusers.php">show all users</a>
        </form>
    </div>
</body>
</html>
