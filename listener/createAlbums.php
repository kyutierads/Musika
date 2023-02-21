<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");

if (isset($_POST['albums'])) {
    $album_ids = $_POST['albums'];
    var_dump($album_ids);
    $result = mysqli_query($conn, "DELETE FROM albums_listeners WHERE  listeners_listener_id = {$_SESSION['listener_id']}");
    foreach ($album_ids as $album_id) {
        // echo $album_id;

        $sql1 = "INSERT INTO albums_listeners (listeners_listener_id,albums_album_id) VALUES({$_SESSION['listener_id']}, $album_id )";
        $result = mysqli_query($conn, $sql1);
    }
    unset($_POST);
    $_POST['albums'] = array();
    header("Location: albumList.php");
} else {
    $result = mysqli_query($conn, "DELETE FROM albums_listeners WHERE  listeners_listener_id = {$_SESSION['listener_id']}");
    if ($result) 
        header("Location: albumList.php");
}
?>