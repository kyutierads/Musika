<?php
    
    include("../includes/config.php");
    $result = mysqli_query($conn, "DELETE from artists WHERE artist_id = {$_GET['id']}");
    if ($result) {
        header("Location: index.php");
    }
 
?>