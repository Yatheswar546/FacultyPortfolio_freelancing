<?php
    session_start();
    if($_SESSION['id'] == true){

    require_once('../config.php');

    if(isset($_GET['name']) && isset($_GET['id'])){
        $imageName = $_GET['name']; // Get the image name from the request parameter
        $image_id = $_GET['id']; // Get the ID of the row

        // Retrieve the image list from the database
        $result = mysqli_query($db, "SELECT images FROM `eventimages` WHERE id = '$image_id'");
        if (!$result) {
            die("Invalid Query: " . mysqli_connect_error());
        }

        $row = mysqli_fetch_assoc($result);
        $imageList = $row['images'];

        // Remove the target image from the image list
        $imageArray = explode(",", $imageList);

        $index = array_search($imageName, $imageArray);
        if ($index !== false) {
            unset($imageArray[$index]);
        }

        // Update the image list in the database
        $updatedImageList = implode(",", $imageArray);

        $updateQuery = mysqli_query($db, "UPDATE `eventimages` SET images = '$updatedImageList' WHERE id = '$image_id'");
        if (!$updateQuery) {
            die("Invalid Query: " . mysqli_connect_error());
        } else {
            header('Location: index.php');
            exit;
        }
    }

    }
    else{
        header('Location: ../../index.php');
    }

?>