<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");


// $result = mysqli_query($conn, "SELECT * FROM albums WHERE album_id = {$_GET['album_id']}");

$result = mysqli_query($conn, "SELECT *
            FROM albums a INNER JOIN albums_listeners al ON (a.album_id = al.albums_album_id)
            INNER JOIN listeners l ON (al.listeners_listener_id = l.listener_id) WHERE al.albums_album_id = {$_GET['album_id']} 
            AND al.listeners_listener_id = {$_SESSION['listener_id']}");

$row = mysqli_fetch_assoc($result);
// var_dump($row['comment']);

?>
<div class="container-fluid container-lg">
    <form action="rating.php" method="POST">
       
        <div class="mb-3">
            <label for="name" class="form-label">Album Name</label>
            <input type="text" class="form-control" id="name" name="album_name" value="<?php echo $row['albumtitle']; ?>" readonly />
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row['genre']; ?>" readonly>
        </div>

        <!-- Default radio -->
        <?php
            if($row['reviews'] == 5){
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="5" checked />
                <label class="form-check-label" for="awesome"> Awesome (5) </label>
                </div>';
            }
            else {
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="5" />
                <label class="form-check-label" for="awesome"> Awesome (5) </label>
                </div>';
            }
            if($row['reviews'] == 4){
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="good" value="4" checked />
                <label class="form-check-label" for="awesome"> goods lang (4) </label>
                </div>';
            }
            else {
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="good" value="4" />
                <label class="form-check-label" for="awesome"> goods lang (4) </label>
                </div>';
            }
            if($row['reviews'] == 3){
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="3" checked />
                <label class="form-check-label" for="awesome"> Catchy Song (3) </label>
                </div>';
            }
            else {
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="3" />
                <label class="form-check-label" for="awesome"> Catchy Song (3) </label>
                </div>';
            }
            if($row['reviews'] == 2){
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="2" checked />
                <label class="form-check-label" for="awesome"> KPOP (2) </label>
                </div>';
            }
            else {
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="2" />
                <label class="form-check-label" for="awesome"> KPOP (2) </label>
                </div>';
            }
            if($row['reviews'] == 1){
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="1" checked />
                <label class="form-check-label" for="awesome"> Trash (1) </label>
                </div>';
            }
            else {
                echo '<div class="form-check">
                <input class="form-check-input" type="radio" name="reviews" id="awesome" value="1" />
                <label class="form-check-label" for="awesome"> Trash (1) </label>
                </div>';
            }
        ?>
        
        <!-- <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="awesome" value="5" checked />
            <label class="form-check-label" for="awesome"> Awesome </label>
        </div> -->

        <!-- Default checked radio -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="good" value="4" />
            <label class="form-check-label" for="good"> good langs (4) </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="catchy"  value="3"/>
            <label class="form-check-label" for="catchy"> Catchy songs (3) </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="reviews" id="kpop"  value="1"/>
            <label class="form-check-label" for="kpop"> kpop (1) </label>
        </div> -->

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment" name="comment" ><?php echo $row['comment']; ?> </textarea>
        </div>

        <input type="hidden" id="album_id" name="album_id" value="<?php echo $row['album_id']; ?>" />

        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    </form>
</div>
<br>
<br>
<h1>Listeners Comments and Reviews</h1>
    <div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Review</th>
            </tr>
        </thead>
        <?php
        include "../includes/config.php";
        // $result = mysqli_query($conn, "SELECT * FROM albums al INNER JOIN artists ar on (al.artists_artist_id = ar.artist_id) WHERE
        // album_id = {$_GET['album_id']}");
        $sql = "SELECT lname, comment, reviews FROM albums a INNER JOIN albums_listeners al ON (a.album_id = al.albums_album_id) 
        INNER JOIN listeners l ON (al.listeners_listener_id = l.listener_id) WHERE album_id = {$_GET['album_id']}";
        $result =  mysqli_query($conn, $sql);
    

        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            print "<tr>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['comment'] . "</td>";
            echo "<td>" . $row['reviews'] . "</td>";
            print "</tr>";
        }

        ?>
    </table>

</div>