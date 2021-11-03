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
        if($result&&$num==1&& $userid!=$owner)
        {
          $transferMoney="UPDATE `user` SET `balance` = '$newbalance' WHERE `user`.`userid` = $userid;";//transfer money to benefeciary
          $tresult=mysqli_query($conn,$transferMoney);
         
          $sql3="SELECT * FROM `user` WHERE `userid`='$owner'";
          $result3=mysqli_query($conn,$sql3);
          $row3 = mysqli_fetch_assoc($result3);
          $currbalance3= $row3['balance'] ;//current balance of owner
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
            echo " user not found";
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
    <!--form start-->
    <form action="transferMoney.php" method="post">
        <label><b>Benificiery user id</b> </label><br>
        <input class="createUser-control" type="text" name="userid" id="userid"required><br><br>
        <label><b>amount to be transfered</b> </label><br>
        <input class="createUser-control" type="text" name="amount" id="amount"  required><br><br>
        <button class="submit-button">SUBMIT</button>
    </form>
    <!--form ends-->
</head>
<body>
    
</body>
</html>