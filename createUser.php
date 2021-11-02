<?php
    $s=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $age=$_POST['age'];
        $gender =$_POST['gender'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $balance=$_POST['balance'];
        $password=$_POST['password'];
        //$sql ="INSERT INTO `DshHNFZcBN`. `user` ( `userid`,`firstname`, `lastname`, `age`, `gender`, `phone`, `email`, `city`,`date`) VALUES ( NULL,'$firstname', '$lastname', '$age', '$gender', '$phone', '$email', '$city', CURRENT_TIMESTAMP); "; 
        $sql="INSERT INTO `user` (`userid`, `firstname`, `lastname`, `age`, `gender`, `phone`, `email`, `city`, `date`,`balance`, `password`) VALUES (NULL,'$firstname', '$lastname', '$age', '$gender', '$phone', '$email', '$city', CURRENT_TIMESTAMP,'$balance', '$password');" ;
        $result=mysqli_query($conn,$sql);
        if($result){
            $s=true;
        }
        else echo "UNSUCCESFULL";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/createUser.css">
    <title>Document</title>
</head>
<body>
    <div class="background">
    <h1 class="mainheading">CREATE NEW USER</h1><br>
    <?php
    if($s){   
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>sucess</strong> Your account is now created and You can now login
     <a href="index.php">NEXT</a>
    </div>';
    }
    ?>
    <form class="createUserform" method="post">
        <label><b>First Name</b> </label><br>
        <input class="createUser-control" type="text" name="firstname" id="firstname"required><br><br>
        <label><b>Last Name</b> </label><br>
        <input class="createUser-control" type="text" name="lastname" id="lastname"  required><br><br>
        <label><b>Age</b> </label><br>
        <input class="createUser-control" type="age" name="age" id="age"  required><br><br>
        <label><b>Gender</b> </label><br>
        <input class="createUser-control" type="text" name="gender" id="gender"  required><br><br>
        <label><b>Phone Number</b> </label><br>
        <input class="createUser-control" type="phone" name="phone" id="phone" required><br><br>
        <label><b>Email</b> </label><br>
        <input class="createUser-control" type="email" name="email" id="email" required><br><br>
        <label><b>City </b> </label><br>
        <input class="createUser-control" type="city" name="city" id="city" required><br><br>
        <label><b>Balance </b> </label><br>
        <input class="createUser-control" type="balance" name="balance" id="balance" required><br><br>
        <label><b>Password </b> </label><br>
        <input class="createUser-control" type="password" name="password" id="password" required><br><br>
        <button class="submit-button">SUBMIT</button>
    </form>
</div>
</body>
</html>
