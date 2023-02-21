<?php
    
    include("../includes/config.php");
    print_r($_POST);
    $result = mysqli_query($conn, " UPDATE songs SET title='{$_POST['artistName']}', sdescription =  '{$_POST['country']}', albums_album_id = '{$_POST['artist']}' WHERE song_id = {$_POST['artistId']}");
    if ($result) {
        header("Location: index.php");
    }
    
?>