<?php

$conn = mysqli_connect("localhost","root","","mywebsite");

if(!$conn){
    die("Connection failed");
}

if(isset($_POST['email'])){

    $email = $_POST['email'];

    $check = "SELECT * FROM subscribers WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){
        header("Location: index.php?msg=exists");
    } else {

        $query = "INSERT INTO subscribers (email) VALUES ('$email')";

        if(mysqli_query($conn,$query)){
            header("Location: index.php?msg=success");
        } else {
            header("Location: index.php?msg=error");
        }
    }
}
?>