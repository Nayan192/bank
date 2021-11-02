<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $server ="remotemysql.com";// remote database
 $username="DshHNFZcBN";
 $password="CZnecs4YpG";
 $database="DshHNFZcBN";


 $con=mysqli_connect($server,$username,$password,$database);

 if(!$con)
 {
     die("connection to this database failed due to ".mysqli_connect_error());

 }
 else{
     echo " connection succeful";
 }
 $sql ="SELECT * FROM `user`";
 $result=mysqli_query($con,$sql);
 echo "<table border='1'>
        <tr>
        <th>S.NO</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>AGE</th>
        <th>GENDER</th>
        <th>E MAIL</th>
        <th>CITY</th>
        </tr>";
 $num=mysqli_num_rows($result);
 while($num>0){
    // echo var_dump($row);
    $row = mysqli_fetch_assoc($result);
    //echo $row['userid'] .  ". Hello ". $row['firstname'].$row['lastname'];
    echo "<tr>";
        echo "<td>" . $row['userid'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
    echo "</tr>";
    $num--;
 }
 echo "</table>";
?>
</body>
</html>