<?php
    include("../includes/config.php");
    print_r($_POST);
    $name = $_POST['listenerName'];
    $address = $_POST['address'];
    // $image = $_POST['listenerImage'];
    $user_id = $_POST['userId'];
    
    // $sql = "INSERT INTO listeners (name, address, img_path, users_user_id) VALUES('$name', '$address','$image','$user_id')";
    // var_dump($sql);
    // $result = mysqli_query($conn, $sql);
    // if($result) {
    //     header("Location: profile.php");
        
    // }
    
    // if (isset($_POST['listenerImage'])) {
 
        print_r ($_FILES);

        $filename = $_FILES["listenerImage"]["name"];
        // echo $filename;
        $tempname = $_FILES["listenerImage"]["tmp_name"];
        $folder = "../images/" . $filename;
        $sql = "INSERT INTO listeners(lname, address, img_path, users_user_id) VALUES('$name', '$address','$filename','$user_id')";
        $result = mysqli_query($conn, $sql);
        var_dump($sql);
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
        if($result) {
            header("Location: profile.php");
        }
    // }
?>