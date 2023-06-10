<?php
    session_start();
    if ($_SESSION['id'] == true) {
        require_once('../config.php');
    
        if (isset($_GET['title'])) {
            $title = $_GET['title'];
        }
    
        $files = [];
        $errormsg = "";
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $target = '../../images/activities/';
            $multipleImages = $_FILES['images']['name'];
    
            if (!empty($multipleImages)) {
                // Multiple files were uploaded
                $fileCount = count($multipleImages);
    
                for ($i = 0; $i < $fileCount; $i++) {
                    $filename = $_FILES['images']['name'][$i];
                    $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $newFilename = md5('userid' . $filename) . "." . $filetype;
                    $target_file = $target . basename($newFilename);
                    $files[] = $newFilename;
    
                    if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png") {
                        if (!move_uploaded_file($_FILES['images']['tmp_name'][$i], $target_file)) {
                            $errormsg = "Failed to move one or more multiple files!";
                            break;
                        }
                    } else {
                        $errormsg = "Invalid file type for one or more multiple files!";
                        break;
                    }
                }
    
                if (!empty($files)) {
                    $uploadedFiles = implode(',', $files);
    
                    // Check if the event with the given title already exists in the database
                    $existingResult = mysqli_query($db, "SELECT * FROM `eventimages` WHERE title = '$title'");
                    if (!$existingResult) {
                        die("Invalid Query: " . mysqli_connect_error());
                    }
    
                    if (mysqli_num_rows($existingResult) > 0) {
                        // If the event exists, update the images column with the new image(s)
                        $existingRow = mysqli_fetch_assoc($existingResult);
                        $existingImages = $existingRow['images'];
    
                        // Append the newly uploaded image(s) to the existing images
                        $updatedImages = $existingImages . ',' . $uploadedFiles;
    
                        // Update the row with the updated images
                        $updateQuery = mysqli_query($db, "UPDATE `eventimages` SET images = '$updatedImages' WHERE title = '$title'");
                        if (!$updateQuery) {
                            die("Invalid Query: " . mysqli_connect_error());
                        } else {
                            echo "Images updated successfully.";
                        }
                    } else {
                        // If the event doesn't exist, insert a new row with the title and images
                        $insertQuery = mysqli_query($db, "INSERT INTO `eventimages`(`title`, `images`) VALUES ('$title','$uploadedFiles')");
                        if (!$insertQuery) {
                            die("Invalid Query: " . mysqli_connect_error());
                        } else {
                            echo "New row inserted successfully.";
                        }
                    }
    
                    // Redirect to the desired location after successful upload
                    header('Location: index.php');
                    exit;
                } else {
                    $errormsg = "At least one image must be uploaded!";
                }
            }
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
                        <span class="icon"><i class='bx bx-message-rounded-dots'></i></span>
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
                    <i class='bx bx-search'></i>
                </label>
            </div>
            <div class="user">
                <img src="../images/p1.png">
            </div> -->
        </div>

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Add Activity</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Activities</a>
            </div>

            <div class="content">
                <h2 class="page-title">Student Support Activities</h2>

                <?php
                    if(!empty($errormsg)){
                        echo"
                            <div class='error_msg'>
                                <strong>$errormsg</strong>
                            </div>
                        ";
                    }
                ?>
                <!---------------- ADD IMAGE FORM ------------------>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Event Name</label>
                        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>" readonly>
                    </div>
                    <div>
                        <label>Add Images</label>
                        <input type="file" name="images[]" class="text-input" multiple>
                    </div>
                    <div>
                        <button type="submit" class="admin-btn btn-blg">Add</button>
                    </div>
                </form>
                
                <!----------------------------- IMAGES -------------------------->
                <div class="images-section">
                    <h2>Images</h2>
                    <div class="images">

                    <?php
                        $result = mysqli_query($db, "SELECT * FROM `eventimages` WHERE title = '$title'");
                        if (!$result) {
                            die("Invalid Query: " . mysqli_connect_error());
                        } else {
                            $imageNames = array(); // Initialize an array to store the image names
                            $imagePaths = array(); // Initialize an array to store the image paths
                            while ($row = mysqli_fetch_assoc($result)) {
                            $imageList = $row['images'];
                            
                                $id = $row['id'];
                                if (!empty($imageList)) {
                                $imageArray = explode(",", $imageList);
                            
                            
                                    foreach ($imageArray as $filename) {
                                        $imageNames[] = $filename; // Store each image name in the array
                                        $imagePaths[] = "../../images/activities/$filename"; // Store each image path in the array
                                    }
                                }
                            }
                                        
                            if (!empty($imagePaths)) {
                                $count = count($imagePaths);
                                for ($i = 0; $i < $count; $i++) {
                                    $path = $imagePaths[$i];
                                    $name = $imageNames[$i];
                            
                                    echo "
                                        <div class='image'>
                                            <img src='$path' alt=''>
                                            <a href='./deleteimage.php?name=$name&id=$id' class='delete' onclick='return checkdelete()'>Delete</a>
                                        </div>
                                    ";
                                }
                            } else {
                                echo "
                                    <p class='caution'>Photos need to be uploaded...</p>
                                ";
                            }
                        }
                    ?>

                    </div>
                </div>
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

        toggle.onlick = function () {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activelink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered')
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activelink));

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
