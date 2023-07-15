<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a DB connection 
    $con = mysqli_connect($server, $username, $password);

    // check  for connection success
    if(!$con){
        die("Connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Success connecting to  the database";

    // collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    
    // execute the sql query
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gander`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone',
     '$other', current_timestamp())";

    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successful inserted";
        
        // flag for connection insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the connection variables
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="bg1.jpg" alt="Manipal University">
    <div class="container">
        <h1> Welcome To Manipal University Jaipur Trip Form </h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form. 
        We are happy to see you joining us for the US Trip</p>";
        }
        ?>
        <form action="project.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any informatiom here"></textarea>
            <br>
            <button class="btn">Submit</button>
            <!-- <button class="btn">reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>