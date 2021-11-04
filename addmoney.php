<?php
include 'partials/_dbconnect.php';
session_start();// isset checks if variable is set or not
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
$owner=$_SESSION['userid'];//user id of owner of account
$amount=$_POST["amount"];// amount to be added
$sql3="SELECT * FROM `user` WHERE `userid`='$owner'";
        $result3=mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $currbalance3= $row3['balance'] ;//current balance of owner
        $newbalance=$currbalance3+$amount;//new balance of user
        if($newbalance<=100000000&&$amount>=1)
        {
$sql="UPDATE `user` SET `balance` = '$newbalance' WHERE `user`.`userid` = $owner;";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo "money added succesfully";
}
else{
    echo "error";
}
        }
        else{
            echo "please enter valid amount ";
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
<form action="addmoney.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">amount </span>
                    <input class="input" type="amount" name="amount" id="amount" required>
                </div>
                
                <button class="submit" type="submit">SUBMIT</button>
            </div>
        </form>
</body>
</html>