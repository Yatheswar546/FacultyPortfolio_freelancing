<?php
    session_start();
    if($_SESSION['id'] == true){

    require_once('../config.php');

    $id = "";
    $title = "";
    $file = "";

    $errormsg = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET['id'])){
            header('Loaction: index.php');
            exit;
        }
    
        $id = $_GET['id'];
        $result = mysqli_query($db,"SELECT * FROM `memberships` WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        // echo $id;

        if(!$row){
            header('Loaction: index.php');
            exit;
        }
        $title = $row['title'];
        $file = $row['image'];
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $title = $_POST['title'];

        $target = '../../images/memberships/';
        $filename = $_FILES['image']['name'];
        $filetype = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $target_file = $target.basename(md5('userid'.$_FILES['image']['name']).".".$filetype);
        $file = md5('userid'.$_FILES['image']['name']).".".$filetype;

        do{
            if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
                if($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png"){
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
                        $sql = mysqli_query($db,"UPDATE `memberships` SET `title`='$title',`image`='$file' WHERE id=$id");
                        if($sql){
                            $successmsg = "You have succesfully added a Member";
                            $file = $target_file;
                            header('Location: index.php');
                            exit;
                        }else{
                            $errormsg = "Something went wrong !!!";
                        }
                    }else{
                        $errormsg = "Image Not Moved!!!";
                    }
                }else{
                    $errormsg = "Image Not Accepted !!!";
                }
            }
            else{
                $sql = mysqli_query($db,"UPDATE `memberships` SET `title`='$title' WHERE id=$id");
                if($sql){
                    $successmsg = "You have succesfully Updated a Member";
                    header('Location: index.php');
                    exit;
                }else{
                    $errormsg = "Something went wrong !!!".mysqli_connect_error();
                }
            }
        }while(false);
    }
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

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Add New One</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Memberships</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Memberships</h2>

                <?php
                    if(!empty($errormsg)){
                        echo"
                            <div class='error_msg'>
                                <strong>$errormsg</strong>
                            </div>
                        ";
                    }
                ?>

                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" id="image" value="<?php echo $file; ?>">
                    </div>
                    <div>
                        <button type="submit" class="admin-btn btn-blg">Update</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <!----- CkEditor 5 Script -------------------->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script src="../../js/script.js"></script>
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
    </script>
</body>
</html>

<?php
    }
    else{
        header('Location: ../../index.php');
    }
?>