<?php
    $db = mysqli_connect('localhost', 'root','','sekhar_sir');
    if($db){
        // echo "Success";
    }
    else{
        die("Failure".mysqli_connect_error());
    }
?>