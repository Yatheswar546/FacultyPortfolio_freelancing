<?php

    require_once('../config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch. Sekhar</title>

    <!-------------------- Custom CSS --------------------->
    <link rel="stylesheet" href="../css/style.css">

    <!-------------- Font Awesome Link ----------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!------------- Box Icons Link ----------------------->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!---------------------- Jquery Link ------------------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js">

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
                <div>
                    <div class="icon"><i class="fa-brands fa-linkedin"></i></div>
                    <form action="">
                        <input type="text" name="" id="" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
        </div> 

        <div class="bottom-bar"></div>

    </header>

    <!----------------------- MAIN CONTENT ---------------------->
    <div class="main">

        <div class="side-bar">
            <ul class="links" id="sidebar-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./appoinments.html">Appointments</a></li>
                <li><a href="./qualifications.html">Qualifications</a></li>
                <li><a href="./research.html">Research Interest</a></li>
                <li><a href="./publications.html">Publications</a></li>
                <li><a href="./projects.php">Projects</a></li>
                <li><a href="./studentsupport.php">Students Support Activities</a></li>
                <li><a href="./memberships.php">Professional Membership</a></li>
                <li><a href="./links.html">Interesting Links</a></li>
                <li><a href="./responsibilties.html">Responsibilities</a></li>
                <li><a href="./certificates.html">Certificates</a></li>
                <li><a href="./subjects.html">Subjects</a></li>
                <li><a href="./workshops.html">Workshops</a></li>
                <li><a href="./contact.html">Contact Me</a></li>
                <li><a href="./gallery.php">Gallery</a></li>
            </ul>
        </div>

        <div class="content">
            <h2 class="topic-heading">Professional Memberships</h2>
            <div class="memberships">

                <?php  
                    $memberships = mysqli_query($db,"SELECT * FROM `memberships`");
                    if(!$memberships){
                        die("Invalid Query".mysqli_connect_error());
                    }else{
                        while($row = mysqli_fetch_assoc($memberships)){
                            $count = mysqli_num_rows($memberships);
                            if($count<1){
                                echo "Memberships Updating Soon.....";
                            } 
                            else{
                                echo"
                                    <div class='card'>
                                        <img src='../images/memberships/$row[image]' alt='' class=''>
                                        <p class='title row_id'>$row[title]</p>
                                    </div>      
                                ";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Js script for Navbar -->
    <script src="../js/script.js"></script>

</body>

</html>