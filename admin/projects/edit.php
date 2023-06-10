<?php
    session_start();
    if($_SESSION['id'] == true){

    require_once('../config.php');

    if($db){
        // echo "Database Successfully Connected";
    }
    else{
        die("Error".mysqli_connect_error());
    }

    $id = "";
    $title = "";
    $description = "";
    $category = "";
    $link = "";
    $file = "";

    $errormsg = "";
    $successmsg = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET['id'])){
            header('Loaction: index.php');
            exit;
        }
    
        $id = $_GET['id'];
        $result = mysqli_query($db,"SELECT * FROM `projects` WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        // echo $id;

        if(!$row){
            header('Loaction: index.php');
            exit;
        }
        $title = $row['title'];
        $description = $row['description'];
        $category = $row['category'];
        $link = $row['link'];
        $file = $row['image'];

    }
    elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = addslashes($_POST['description']);
        $category = $_POST['category'];
        $link = $_POST['link'];

        $target = '../../images/projects/';
        $filename = $_FILES['image']['name'];
        $filetype = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $target_file = $target.basename(md5('userid'.$_FILES['image']['name']).".".$filetype);
        $file = md5('userid'.$_FILES['image']['name']).".".$filetype;

        $projectid = md5(substr($title,0,3).substr($category,0,3).random_int(10000,99999));

        do{
            if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
                if($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png"){
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
                        $sql = mysqli_query($db,"UPDATE `projects` SET `title`='$title',`description`='$description',`image`='$file',`category`='$category',`link`='$link',`projectid`='$projectid' WHERE id=$id");
                        if($sql){
                            $successmsg = "You have succesfully updated a Project";
                            $file = $target_file;
                            header('Location: index.php');
                            exit;
                        }else{
                            $errormsg = "Something went wrong !!!".mysqli_connect_error();
                        }
                    }else{
                        $errormsg = "Image Not Moved!!!";
                    }
                }else{
                    $errormsg = "Image Not Accepted !!!";
                }
            }
            else{
                $sql = mysqli_query($db,"UPDATE `projects` SET `title`='$title',`description`='$description',`category`='$category',`link`='$link',`projectid`='$projectid' WHERE id=$id");
                if($sql){
                    $successmsg = "You have succesfully updated a Project";
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
                <a href="./create.php" class="admin-btn btn-blg">Add Project</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Projects</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Projects</h2>

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
                        <input type="text" name="title" id="" class="text-input" value="<?php echo $title; ?>">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description" id="body" rows="30" cols="10"><?php echo $description; ?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Category</label>
                        <input type="text" name="category" class="text-input" value="<?php echo $category; ?>">
                    </div>
                    <div>
                        <label>Project Link</label>
                        <input type="text" name="link" class="text-input" value="<?php echo $link; ?>">
                    </div>

                    <?php
                        if(!empty($successmsg)){
                            echo"
                                <div class='success_msg'>
                                    <strong>$successmsg</strong>
                                </div>
                            ";
                        }
                    ?>

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