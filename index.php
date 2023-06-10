<?php
    session_start();
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
                <div>
                    <div class="icon"><i class="fa-brands fa-linkedin"></i></div>
                    <form action="">
                        <input type="text" name="" id="" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
        </div>

        <div class="bottom-bar">
            <?php if(isset($_SESSION['id'])): ?>
                <a href="./admin/projects/index.php" style="color: white">Admin Panel</a>
            <?php else: ?> 
                <!-- <a href="./assests/admin.php" style="color: white">Admin Login</a> -->
            <?php endif; ?>
        </div>

    </header>

    <!----------------------- MAIN CONTENT ---------------------->
    <div class="main">

        <div class="side-bar">
            <ul class="links" id="sidebar-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./assests/appoinments.html">Appointments</a></li>
                <li><a href="./assests/qualifications.html">Qualifications</a></li>
                <li><a href="./assests/research.html">Research Interest</a></li>
                <li><a href="./assests/publications.html">Publications</a></li>
                <li><a href="./assests/projects.php">Projects</a></li>
                <li><a href="./assests/studentsupport.php">Students Support Activities</a></li>
                <li><a href="./assests/memberships.php">Professional Membership</a></li>
                <li><a href="./assests/links.html">Interesting Links</a></li>
                <li><a href="./assests/responsibilties.html">Responsibilities</a></li>
                <li><a href="./assests/certificates.html">Certificates</a></li>
                <li><a href="./assests/subjects.html">Subjects</a></li>
                <li><a href="./assests/workshops.html">Workshops</a></li>
                <li><a href="./assests/contact.html">Contact Me</a></li>
                <li><a href="./assests/gallery.php">Gallery</a></li>
            </ul>
        </div>

        <div class="content">

            <div class="intro">
                <img src="./images/Sekhar.JPG" alt="">
                <div class="info">
                    <h4>PROF CH. SEKHAR</h4>
                    <p><a href="">Computer Science and Engineering</a></p>
                    <p><a href="">Assistant Professor in CSE Dept</a></p>
                    <p><a href="">Vignan’s Institute of Information Technology, Duvvada,</a></p>
                    <p><a href="e-mail: sekhar1203@gmail.com">e-mail: sekhar1203@gmail.com</a></p>
                    <p><a href="">Phone: +91-9949006418</a></p>
                    <p><a href="">Researcher ID: AAU-1651-2020</a></p>
                    <p><a href="">Scopus ID: 57200205132</a></p>
                    <p><a href="">Vidwan-ID : 185495</a></p>
                    <p><a href="">Orcid Id : 0000-0001-5603-1453</a></p>
                    <p><a href="">Scopus Id : 57200205132</a></p>
                    <p><a href="https://scholar.google.com/citations?hl=en&user=QZ4MYYoAAAAJ&view_op=list_works&authuser=1">Google Scholar Id : QZ4MYYoAAAAJ</a></p>
                </div>
            </div>
 
            <div class="summary">
                <h4>Executive Summary</h4>
                <ul>
                    <li>To associate with progressive organization that gives me scope to update my
                        knowledge and skills according to latest trends and be a part of team that dynamically
                        works towards the growth of organization and gains satisfaction thereof. </li>
                    <li>More than 17 years of teaching and research experience.</li>
                </ul>
            </div>

            <div class="academics">
                <h4>Academic Distinctions</h4>
                <ul>
                    <li>Received <strong>"Best Mentor"</strong> for <strong>Asian University Machine Learning Camp in
                            Jeju 2018</strong> during 22nd July to 7th Aug 2018.at <strong>JEJU National University,
                            JEJU,
                            South Korea.</strong>
                    </li>
                    <li>Received <strong>"Best Mentor"</strong> for National level <strong>“Smart India Hackathon
                            2018”</strong>
                        from Ministry of Electronics and Information Technology of India.
                    </li>
                    <li>
                        Received <strong>"Best Mentor"</strong> for National level <strong>1st Runner Up</strong> of
                        <strong>“Smart India Hackathon 2017”</strong>
                        from Ministry of Food Processing, Govt of India.
                    </li>
                    <li>
                        Received <strong>“SASTRA AWARD”</strong> with Cash prize of <strong>Rs.10000/-</strong> for
                        Research Excellence at Vignan’s IIT
                        during the academic year(s) 2015-16, 2018-19,2019-20,2021-22.
                    </li>
                    <li>
                        Received <strong>“All Rounder Performance”</strong> (Academic, Research, Administrative)”
                        with Cash prize of <strong>Rs.15000/-</strong> for Research Excellence at Vignan’s IIT during
                        the
                        academic year 2017-18.
                    </li>
                    <li>
                        Received <strong>“PRATIBHA AWARD”</strong> for performance Excellence at Vignan’s IIT
                        during the academic year 2015-16 and 2016-17,2021-22.
                    </li>
                    <li>
                        <strong>"BEST TEACHER AWARD”</strong> of the year 2009 of SGRTAW – Awarded this
                        certificate of merit in recognition of meritorious record of teaching.
                    </li>

                </ul>
            </div>

            <div class="publications">
                <h4>Publication Record (since 2007) - Pending</h4>
                <ul>
                    <li>76 papers published in refereed journals</li>
                    <li>33 refereed book chapters</li>
                    <li>16 edited book and 1 contributed book</li>
                    <li>66 papers in refereed international conferences</li>
                    <li>Google Scholar: H-Index: 23 (total 1904 citations and 180 indexed publications)</li>
                </ul>
            </div>

        </div>

    </div>

    <!-- Js script for Navbar -->
    <script src="./js/script.js"></script>
</body>

</html>