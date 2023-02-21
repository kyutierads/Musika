<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");


// $result = mysqli_query($conn, "SELECT * FROM albums WHERE album_id = {$_GET['album_id']}");

$result = mysqli_query($conn, "SELECT *
            FROM albums a INNER JOIN albums_listeners al ON (a.album_id = al.albums_album_id)
            INNER JOIN listeners l ON (al.listeners_listener_id = l.listener_id) WHERE al.albums_album_id = {$_GET['album_id']} AND al.listeners_listener_id = {$_SESSION['listener_id']}");

$row = mysqli_fetch_assoc($result);
var_dump($row['comment']);

?>
<div class="container-fluid container-lg">
    <form action="rating.php" method="POST">
       
        <div class="mb-3">
            <label for="name" class="form-label">Album Name</label>
            <input type="text" class="form-control" id="name" name="album_name" value="<?php echo $row['title']; ?>" readonly />
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row['genre']; ?>" readonly>
        </div>

        <!-- Default radio -->

        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="awesome" value="5"/>
            <label class="form-check-label" for="awesome"> Awesome </label>
        </div>

        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="good" value="4" />
            <label class="form-check-label" for="good"> good langs </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="catchy"  value="3"/>
            <label class="form-check-label" for="catchy"> Catchy songs </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="kpop"  value="1"/>
            <label class="form-check-label" for="kpop"> kpop </label>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">My comment</label>
            <textarea type="text" class="form-control" id="comment" name="comment" ><?php echo $row['comment']; ?> </textarea>
        </div>

        <input type="hidden" id="album_id" name="album_id" value="<?php echo $row['album_id']; ?>" />

        <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
    </form>
</div>