<?php
include 'partials/_dbconnect.php';
session_start();// isset checks if variable is set or not
if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}
$userid=$_SESSION['userid'];
$sql ="SELECT * FROM `tranferhistory` WHERE `owner`='$userid'";
 $result=mysqli_query($conn,$sql);
 echo "<table border='1'>
        <tr>
        <th>beneficiary userid</th>
        <th>amount transfered</th>
        <th>balance</th>
        </tr>";
 $num=mysqli_num_rows($result);
 while($num>0){
    // echo var_dump($row);
    $row = mysqli_fetch_assoc($result);
    //echo $row['userid'] .  ". Hello ". $row['firstname'].$row['lastname'];
    echo "<tr>";
        echo "<td>" . $row['buserid'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['balance'] . "</td>";

    echo "</tr>";
    $num--;
 }
 echo "</table>";


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