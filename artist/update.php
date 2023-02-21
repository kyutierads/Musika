<?php
    
    include("../includes/config.php");
    print_r($_POST);
    $result = mysqli_query($conn, " UPDATE artists SET name='{$_POST['artistName']}', country =  '{$_POST['country']}', img_path = '{$_POST['artistImage']}' WHERE artist_id = {$_POST['artistId']}");
    if ($result) {
        header("Location: index.php");
    }
    
?>