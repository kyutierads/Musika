<?php
    include("../includes/header.php");
    include("../includes/config.php");
    $result = mysqli_query($conn, "SELECT * FROM artists WHERE artist_id=". $_GET['id']);
    $artist = mysqli_fetch_assoc($result);
    //  print_r($artist);
?>

<div class="container-fluid container-lg">
    <form action="update.php" method="POST">
        <div class="mb-3">
            <label for="artistId" class="form-label">Artist id</label>
            <input type="text" class="form-control" id="artistId" name="artistId" readonly value="<?php echo $artist['artist_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Artist Name</label>
            <input type="text" class="form-control" id="name" name="artistName" value="<?php echo $artist['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo $artist['country']; ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="artistImage" value="<?php echo $artist['img_path']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-light" href="index.php" role="button">Cancel</a>
    </form>
</div>

<?php
    include("../includes/footer.php");
?>