<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");

?>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="mb-3">
    <label for="albums" class="form-label">Search by Albums</label>
    <input type="text" class="form-control" id="name" name="album">
</div>
<button type="submit" name="submit" class="btn btn-primary">Search</button>
</form>


<br>

<!-- <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="mb-3">
    <label for="title" class="form-label">Search by Title</label>
    <input type="text" class="form-control" id="names" name="artists">
</div>
<button type="submits" name="submits" class="btn btn-primary">Search</button>
</form>

<br> -->

<!-- SEARCH ALBUMS -->
<?php
    if(isset($_POST['submit']) && !empty($_POST['album'])) {
        // var_dump($_POST);
        $album = $_POST['album'];
        $sql = "SELECT * FROM songs s LEFT OUTER JOIN albums al ON (al.album_id = s.albums_album_id) WHERE al.title LIKE '%{$album}%'";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        $song_title = mysqli_fetch_assoc($result);
        echo "<h3>Search Result</h3>"; 
        mysqli_data_seek($result, 0);
        echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Song ID</th>
                    <th>Song Name</th>
                    <th>Song Description</th>
                    <th>Album Title</th>
                </tr>
            </thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            echo "<tr>
                    <td>{$row['song_id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['sdescription']}</td>
                    <td>{$row['title']}</td>
                </tr>";
            }
          
            echo "</table>";
            echo "<br>";
    }
    else {
    };

?>





<!-- SEARCH SONGS -->
<?php
    if(isset($_POST['submits']) && !empty($_POST['artists'])) {
        // var_dump($_POST); 
        $artists = $_POST['artists'];
        $sql = "SELECT * FROM songs a LEFT OUTER JOIN albums al ON (al.album_id = a.albums_album_id) WHERE a.song_title LIKE '%{$artists}%' ";
        // echo $sql;
        $results = mysqli_query($conn, $sql);
        $artist_name = mysqli_fetch_assoc($results);
        echo "<h3>Search Result</h3>";
        // echo "<h1>{$artist_name['artists']}</h1>"; 
        mysqli_data_seek($results, 0);
        echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Song ID</th>
                    <th>Song Name</th>
                    <th>Description</th>
                    <th>Album ID</th>
                </tr>
            </thead>";
        while ($row = mysqli_fetch_assoc($results)) {
            // var_dump($row);
            echo "<tr>
                    <td>{$row['song_id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['sdescription']}</td>
                    <td>{$row['albums_album_id']}</td>
                </tr>";
            }
            echo "</table>";
            echo "<br>";
    }
    else {
    };

?>

<?php


        print "<table class='table table-striped'>";
        print "<tr>
                <th>ID</th>
                <th>Song Title</th>
                <th>Description</th>
                <th>Album Title</th>
                <th>Action</th>
               </tr>";  
                  
?>

<?php
        include "../includes/config.php";
        $result = mysqli_query($conn, "SELECT * FROM songs al INNER JOIN albums ar on (al.albums_album_id = ar.album_id)");

        print "<h1>Songs</h1>";
        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            
            print "<tr>";
            echo "<td>" . $row['song_id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['sdescription'] . "</td>";
            echo "<td>" . $row['albumtitle'] . "</td>";
            echo "<td><a href=edit.php?id={$row['song_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['song_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
            print "</tr>";
            
        }
       

        ?>
    </table>
</div>
<a class='btn btn-primary' href='create.php' role='button'>Create New</a>
<?php
include("../includes/footer.php");
?>