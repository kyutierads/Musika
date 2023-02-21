<?php
    include("../includes/config.php");
    print_r($_POST);
    $title = $_POST['albumName'];
    $artist_id = $_POST['genre'];
    $date = $_POST['artist'];
    $sql = "INSERT INTO songs (title,sdescription, albums_album_id) VALUES('$title', '$artist_id','$date')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        header("Location: index.php");
    }
    else {
        echo mysqli_error($conn);
    }
    
?>