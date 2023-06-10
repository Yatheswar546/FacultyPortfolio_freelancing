<?php
    session_start();
    if($_SESSION['id'] == true){

    require_once('../config.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // echo $id;
        $sql = mysqli_query($db,"DELETE FROM `projects` WHERE id=$id");

        if($sql){
            header("Location: index.php");
            exit;
        }
        else{
            die("Something went wrong".mysqli_connect_error());
        }
    }

    }
    else{
        header('Location: ../../index.php');
    }

?>