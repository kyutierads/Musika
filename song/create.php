<?php
    include("../includes/header.php");
    include("../includes/config.php");

    $result = mysqli_query($conn, "SELECT * FROM albums");
    
?>

<div class="container-fluid container-lg">
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Song Name</label>
            <input type="text" class="form-control" id="name" name="albumName">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Description</label>
            <input type="text" class="form-control" id="genre" name="genre">
        </div>
     

        <div class="mb-3">
            <label for="artist" class="form-label">Album</label>
            <select class="form-select" id="artist" aria-label="Select Album" name="artist">
                <option selected>Select Album</option>
                <?php 
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value={$row['album_id']}>{$row['title']}</option>";
                    }
                ?>
            </select>
        
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>