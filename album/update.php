<?php
    
    include("../includes/config.php");
    print_r($_POST);
    $result = mysqli_query($conn, " UPDATE albums SET al_title='{$_POST['albumName']}', artists_artist_id =  '{$_POST['artist']}', date_released = '{$_POST['dateReleased']}', genre = '{$_POST['genre']}' WHERE album_id = {$_POST['albumId']}");
    var_dump($result);
    if ($result) {
        header("Location: index.php");
    }
    
?>