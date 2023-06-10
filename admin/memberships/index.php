<?php
    session_start();
    if($_SESSION['id'] == true){

    require_once('../config.php');

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive admin dashboard</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/admin.css">
    
    <!-- Box Icons Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>

    <!----------------------- SideBar ---------------------->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title heading">Admin Panel</span>
                    </a>
                </li>
                <li>
                    <a href="../projects/index.php">
                        <span class="icon"><i class="fa-solid fa-code"></i></span>
                        <span class="title">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="../studentsupport/index.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">Student Support</span>
                    </a>
                </li>
                <li>
                    <a href="../memberships/index.php">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">Professional Memberships</span>
                    </a>
                </li>
                <li>
                    <a href="../messages/index.php">
                        <span class="icon"><i class='bx bx-message-rounded-dots' ></i></span>
                        <span class="title">Message</span>
                    </a>
                </li>
                <li>
                    <a href="../../logout.php">
                        <span class="icon"><i class='bx bx-log-out'></i></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
                <li>
                    <a href="../../index.php">
                        <span class="icon"><i class="fa-sharp fa-solid fa-house"></i></span>
                        <span class="title">Back to Home</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!----------------MAIN SECTION ----------------------------->
    <div class="main">
        <!------------- Top Search Bar ---------------------->
        <div class="topbar">
            <div class="toggle" style="display:none;">
                <i class='bx bx-menu'></i>
            </div>
            <!-- <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <i class='bx bx-search' ></i>
                </label>
            </div>
            <div class="user">
                <img src="../images/p1.png">
            </div> -->
        </div>

        <!-------------- Admin Content ------------------------------>
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Add  New One</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Memberships</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Memberships</h2>

                <table>
                    <thead>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>

                        <?php 

                            $result = mysqli_query($db,"SELECT * FROM `memberships`");

                            if(!$result){
                                die("Invalid Query !!!".mysqli_connect_error());
                            }
                            else{
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $file = $row['image'];
                                    $target = '../../images/memberships/';
                                
                                    if ($file && file_exists($target . $file)) {
                                        $image = "<img src='$target$file' alt='user image'>";
                                    } else {
                                        $image = "No Image";
                                    }
                                
                                    echo "
                                        <tr>
                                            <td class='row_id'>$count</td>
                                            <td>$row[title]</td>
                                            <td>$image</td>
                                            <td><a href='./edit.php?id=$row[id]' class='edit'>Edit</a></td>
                                            <td><a href='./delete.php?id=$row[id]' class='delete' onclick='return checkdelete()'>Delete</a></td>
                                        </tr>
                                    ";
                                    $count++;
                                }
                            }

                        ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>



    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        
        toggle.onlick =  function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activelink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered')
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activelink));

        // Deletion Operation
        function checkdelete(){
            return confirm('Are you sure you want to delete ?');
        }

    </script>
</body>
</html>

<?php
    }
    else{
        header('Location: ../../index.php');
    }
?>