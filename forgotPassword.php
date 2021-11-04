<?php
    session_start();// isset checks if variable is set or not
    $login=false;
    $notlogin=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $userid=$_POST["userid"];// user id of owner
        $password=$_POST["password"];// new password 
        $sql="UPDATE `user` SET `password` = '$password' WHERE `user`.`userid` = $userid;";
   
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
          $login=true;
        }
        else{
            $notlogin=true;
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
    <title>Reset Password</title>
</head>
<body>
<form action="forgotpassword.php" method="post">
    <div class="form">
    <?php
        if($login)
        {
            echo '<div class="alert">
            <center>Password changed Succesfully
            <a href=index.php class="closebtn">Click here to login</a></center>
          </div>';
        }
        else if($notlogin) {
            echo '<div class="alert">
            <center>User Not Found</center>
          </div>';
        }
        ?>
            <center>
            <div class="title">Reset Password</div>
            </center>
            <div class="input-container ic1">
                <input type="text" class="input" name="userid" id="userid" placeholder=" " required>
                <div class="cut"></div>
                <label for="userid" class="placeholder">USER ID</label>  
            </div>
            <div class="input-container ic2">
                <input type="password" class="input" name="password" id="password" placeholder=" " required>   
                <div class="cut"></div>
                <label for="password" class="placeholder">PASSWORD</label> 
            </div>
                <button class="submit" type="submit" >RESET</button><br><br>
            </div>
    </form>
</body>
</html>