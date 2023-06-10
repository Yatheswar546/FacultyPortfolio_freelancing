<?php

    require_once('./config.php');

    session_start();

    $errormsg = "";

    if(isset($_POST["submit"])){ 
		$username_email = $_POST["username_email"];
		$password = $_POST["password"];
		$result  = mysqli_query($db,"SELECT * FROM `admin` WHERE username = '$username_email'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0){
			if($password == $row["password"]){
                $_SESSION['id'] = $row["id"];
				header("location: ./admin/projects/index.php");
			}
			else{
                $errormsg = "Wrong Password";
            }
		} 
		else{
            $errormsg = "User Not Resgister";
        }
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch. Sekhar</title>

    <!-------------------- Custom CSS --------------------->
    <link rel="stylesheet" href="./css/style.css">

    <!-------------- Font Awesome Link ----------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!------------- Box Icons Link ----------------------->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <!------------------------ HEADER -------------------------->
    <header>

        <div class="top-bar">
            <div class="menu_icon">
                <i class='bx bx-menu' ></i>
            </div>
        </div>      

        <div class="main-bar">
            <div class="heading">
                <h1>Welcome to Portfolio of Prof. Ch. Sekhar</h1>
            </div>
            <div class="search-bar">
                <div class="icon"><i class="fa-brands fa-linkedin"></i></div>
                <form action="">
                    <input type="text" name="" id="" placeholder="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
        </div>

        <div class="bottom-bar"></div>

    </header>

    <!--------------------- HEADING ------------------------->
    <div class="heading">
        <h6>Hello, This page is only for Admins... If you want to know more about Ch. Sekhar. Go Back to Home Page</h6>
    </div>

    <!------------------------- FORM ------------------------------------>
    <div class="wrapper">
        <h1>Login Form</h1>
        
        <?php 
            if(!empty($errormsg)){
                echo "
                    <div class='error_msg'>
                        <strong>$errormsg</strong>
                    </div>
                ";
            }
        ?>

        <form class="form" method="post">
            <div class="input">
                <input type="text" name="username_email" id="username_email" placeholder="Enter Email">
            </div>
            <div class="input">
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="input" >
                <button type="submit" name="submit">Login Now</button>
            </div>
            <a href="./index.php">Back to Home</a>
        </form>
    </div>
    

</body>

</html>