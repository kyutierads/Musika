<?php
    include("../includes/header.php");
    include("../includes/config.php");
    $result = mysqli_query($conn, "SELECT * FROM songs WHERE song_id=". $_GET['id']);
    $artist = mysqli_fetch_assoc($result);
    $album = mysqli_query($conn, "SELECT * FROM albums");
    //  print_r($artist);
?>

<div class="container-fluid container-lg">
    <form action="update.php" method="POST">
        <div class="mb-3">
            <label for="artistId" class="form-label">Song ID</label>
            <input type="text" class="form-control" id="artistId" name="artistId" readonly value="<?php echo $artist['song_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Song Name</label>
            <input type="text" class="form-control" id="name" name="artistName" value="<?php echo $artist['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Description</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo $artist['sdescription']; ?>">
        </div>
        <div class="mb-3">
        <select class="form-select" id="artist" aria-label="Select Album" name="artist">
                <option selected>Select Album</option>
                <?php 
                    while($row = mysqli_fetch_assoc($album)) {
                        echo "<option value={$row['album_id']}>{$row['al_title']}</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-light" href="index.php" role="button">Cancel</a>
    </form>
</div>

<?php
    include("../includes/footer.php");
?>