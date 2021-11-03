<?php
    session_start();// isset checks if variable is set or not
    if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!=true){
        header("location:index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <title>Document</title>
</head>
<body>
 <?php require 'partials/navbar.php'?>
    <div class="container">
        <table> 
            <th><button><a href= "transferMoney.php">Fund Tranfer</a></button></th>
            <th><button><a href="allusers.php">Registered Users</a></button></th>
            <th><button><a href="transferHistory.php">Transfer History</a></button></th>
            <th><button><a href="addmoney.php">Add Money</a></button></th>
        </table>
    </div>
    welcome-<?php echo $_SESSION['userid']?>
</body>
</html>
