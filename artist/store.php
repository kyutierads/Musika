<?php
    
    include("../includes/config.php");
    print_r($_POST);
    $name = $_POST['name'];
    $country = $_POST['country'];
    $image = $_POST['img_path'];
    $sql = "INSERT INTO artists (name,country,img_path) VALUES('$name', '$country','$image')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: index.php");
        
    }

?>