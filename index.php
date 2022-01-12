<?php

$insert = false;
if(isset($_POST['name'])){
    //Set Connection Variables
$server = "localhost";
$username = "root";
$password = "";
//Create a Database connection
$con = mysqli_connect($server, $username, $password);
//Check for connection success
if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());

}
//Collect post variables
$name = $_POST['name'];
$age = $_POST['age']; 
$phone = $_POST['phone'];
$email = $_POST['email'];
$other = $_POST['other'];

$sql = "INSERT INTO `pau_trip`.`trip` (`name`, `age`, `phone`, `email`, `other`, `date`) VALUES ('$name', '$age', '$phone', '$email', '$other', current_timestamp());";

//echo $sql;
//Execute the query
if($con->query($sql) == true){
   // echo "Successfully inserted";
   //Flag for succesfull insertion
   $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
//close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
</head>
<body>
   <!-- <img class="bg" src="bg.jpg" alt=""> -->
    <div class="container">
    <h1>PAU's Tour Form</h1>
    




<form action="index.php" method="post">

    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="text" name="age" id="age" placeholder="Enter your age">
    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
   <button type="button" class="btn btn-warning">Submit</button>
    <?php
    if($insert == true){
    echo "<p class='submitmsg'>Form submitted! Can't wait to see you at the tour!</p>";
    }
    ?>

</form>




    </div>
    <script src="index.js"></script>

</body>
</html>