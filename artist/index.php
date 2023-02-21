<?php
        include "../includes/header.php";
        include "../includes/config.php";
        $result = mysqli_query($conn,"SELECT * FROM artists");
        /*var_dump($result);*/
        $num_rows = mysqli_num_rows ($result);
        /*var_dump($num_rows);*/
?>

<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="mb-3">
    <label for="artist" class="form-label">Search Artist</label>
    <input type="text" class="form-control" id="name" name="artist">
</div>
<button type="submit" name="submit" class="btn btn-primary">Search</button>
</form>

<br>

<?php
    if(isset($_POST['submit']) && !empty($_POST['artist'])) {
        // var_dump($_POST); 
        $artist = $_POST['artist'];
        $sql = "SELECT * FROM artists a LEFT OUTER JOIN albums al ON (a.artist_id = al.artists_artist_id) WHERE a.name LIKE '%{$artist}%' ";
        
        $result = mysqli_query($conn, $sql);
        $artist_name = mysqli_fetch_assoc($result);
        echo "<h1>{$artist_name['name']}</h1>"; 
        mysqli_data_seek($result, 0);
        echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Artist ID</th>
                    <th>Artist Name</th>
                    <th>Country</th>
                    <th>Image</th>
                    
                </tr>
            </thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            echo "<tr>
                    <td>{$row['artist_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['country']}</td>
                    <td><img src='../images/{$row['img_path']}' width='50' height='50'></td>
                </tr>";
            }
            echo "</table>";
    }
    else {
    };

?>

<?php
        
        print "<table class='table table-striped'>";
        print "<tr>
                <th>Artists</th>
                <th>Artists Name</th>
                <th>Country</th>
                <th>Image</th>
                <th>Action</th>
               </tr>";
        
        while ($row = mysqli_fetch_array($result)){
            
            print "<tr>";
            print "<td>".$row['artist_id']. "</td>";
            print "<td>".$row['name']. "</td>";
            print "<td>".$row['country']. "</td>";
            print "<td><img src='../images/{$row['img_path']}' width='50' height='50'><td>";

            echo "<td><a href=edit.php?id={$row['artist_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['artist_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
        }
        print "</tr>";
        print "</table>";
        print "<a class='btn btn-primary' href='create.php' role='button'>Add Artist</a>";
    ?>

</body>
</html>