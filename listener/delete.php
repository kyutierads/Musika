<?php
    session_start();
    print_r($_SESSION);
    include("../includes/config.php");
    $result = mysqli_query($conn, "DELETE from albums_listeners WHERE albums_album_id = {$_GET['id']} AND listeners_listener_id = {$_SESSION['listener_id']} ");
    if ($result) {
        header("Location: albumList.php");
    }
 
?>