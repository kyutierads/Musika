<?php
    session_start();
    include("../includes/header.php");
    include("../includes/config.php");

    if(isset($_POST['submit'])) {
        var_dump($_POST, $_SESSION);
        $reviews = $_POST['reviews'];
        $comment = $_POST['comment'];
        $album_id = $_POST['album_id'];
       
        $sql = "UPDATE albums_listeners SET reviews = '$reviews', comment = '$comment' WHERE listeners_listener_id =  {$_SESSION['listener_id']} AND albums_album_id = {$album_id} ";
        var_dump($sql);
        $result = mysqli_query($conn, $sql);
        if($result) {
            header("Location: albumlist.php");
           
        }
    }
?>