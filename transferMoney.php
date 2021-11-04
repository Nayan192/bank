
<?php
    session_start();// isset checks if variable is set or not
    if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!=true){
        header("location:index.php");
        exit;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $userid=$_POST["userid"];// user id of beneficery
        $amount=$_POST["amount"];// amount to be transfered
        $owner=$_SESSION['userid'];//user id of owner of account
        $sql="SELECT * FROM `user` WHERE `userid`='$userid'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $currbalance= $row['balance'] ;//current balance of benefeciary
        $newbalance=$currbalance+$amount;//new balance of benefeciary 
        $num=mysqli_num_rows($result);
        $sql3="SELECT * FROM `user` WHERE `userid`='$owner'";
        $result3=mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $currbalance3= $row3['balance'] ;//current balance of owner
        if($result&&$num==1&& $userid!=$owner&&$currbalance>=$amount&& $amount>=1)
        {
          $transferMoney="UPDATE `user` SET `balance` = '$newbalance' WHERE `user`.`userid` = $userid;";//transfer money to benefeciary
          $tresult=mysqli_query($conn,$transferMoney);
         
      
          $newbalance3=$currbalance3-$amount;//new balance of owner
          $transferMoney2="UPDATE `user` SET `balance` = '$newbalance3' WHERE `user`.`userid` = $owner;";//deductuon money from owner
          $tresult2=mysqli_query($conn,$transferMoney2);
          if($tresult2)
          {
              $sql4="INSERT INTO `tranferhistory` (`buserid`, `amount`, `balance`, `owner`) VALUES ('$userid', '$amount', '$newbalance3', '$owner');";//insert into new balance table
              $result4=mysqli_query($conn,$sql4);
              if($result4)
              {
                  echo "money transfered succesfull";
              }
              else{
                  echo " error";
              }
          }
          else{
              echo "some error";
          }
        }
        
        else {
            echo "User not found or insufficient balance ";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/createUser.css">
    <title>Transfer Funds</title>
</head>
<body> 
<div class="container">
<!-- <?php
            if($success)
            {
                echo '<div class="alert">
                <center><b>Money Deposited Succesfully!!</b></center>
            </div>';
            }
            else if($invalidAmount)
            {
                echo '<div class="alert">
                <center><b>Invalid Amount</b></center>
            </div>';
            }
    ?> -->
    <div class="title">Transfer Money</div>
    <div class="content">
        <form action="transferMoney.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Benificiery user id</span>
                    <input class="input" type="text" name="userid" id="userid" required>
                </div>
                <div class="input-box">
                    <span class="details">Amount to be transfered</span>
                    <input class="input" type="text" type="text" name="amount" id="amount" required>
                </div>
                <button class="submit" type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</div>    
</body>
</html>