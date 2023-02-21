<?php
    
    include("../includes/config.php");
    $result = mysqli_query($conn, "DELETE from songs WHERE song_id = {$_GET['id']}");
    if ($result) {
    header("Location: ../song/index.php");
    }
 
?>