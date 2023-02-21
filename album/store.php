<?php
    include("../includes/config.php");
    print_r($_POST);
    $title = $_POST['albumName'];
    $artist_id = $_POST['artist'];
    $date = $_POST['dateReleased'];
    $genre = $_POST['genre'];
    $sql = "INSERT INTO albums (title, artists_artist_id, date_released, genre) VALUES('$title', $artist_id,'$date', '$genre')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        header("Location: index.php");
    }
    else {
        echo mysqli_error($conn);
    }
    
?>