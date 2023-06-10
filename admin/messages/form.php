<?php
    session_start();
    if($_SESSION['id'] == true){

    require('../config.php');

    if(!$db){
        die("Connection Failed!!!".mysqli_connect_error());
    } 
    else{
        // echo "Hurray Connection Successful";
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = addslashes($_POST['message']);   
        
        $sql = mysqli_query($db,"INSERT INTO `messages`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");

        if(!$sql){
            $errormsg = "Invalid Query".mysqli_connect_error();
        }
        else{
            header("Location: ../../index.php");
            exit;
        }
    }

    }
    else{
        header('Location: ../../index.php');
    }
?>