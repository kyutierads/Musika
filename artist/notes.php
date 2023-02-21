<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $_SESSION['albums'] = $_POST['albums'];
//     unset($_POST);
//     header("Location: ".$_SERVER['PHP_SELF']);
//     exit;
// }
$sql = "SELECT l.listener_id FROM users u INNER JOIN listeners l ON (u.user_id = l.users_user_id) WHERE u.user_id = {$_SESSION['user_id']} LIMIT 1" ;
$query = mysqli_query($conn, $sql);
$listener = mysqli_fetch_assoc($query);
$listener_id = $listener['listener_id'];
$_SESSION['listener_id'] = $listener_id;
// var_dump($_SESSION['user_id'],$listener_id,$_POST);


// $sql2 = "SELECT * FROM listeners l INNER JOIN albums_listeners al ON (l.listener_id = al.listeners_listener_id) INNER JOIN albums a ON (a.album_id = al.albums_album_id)  INNER JOIN artists ar ON (ar.artist_id = a.artists_artist_id) WHERE l.listener_id = {$listener_id}";
// $myAlbums = mysqli_query($conn, $sql2);

// // 
// $sql3 = "SELECT * FROM albums a LEFT OUTER JOIN  albums_listeners al ON (a.album_id = al.albums_album_id) WHERE a.album_id NOT IN ( SELECT albums_album_id FROM albums_listeners WHERE listeners_listener_id = {$listener_id}  );";
// // $sql3 = "SELECT * FROM albums";
// $albums = mysqli_query($conn, $sql3);
// // var_dump($albums);
$sql1 = "SELECT * FROM albums";
$albums = mysqli_query($conn, $sql1);
// print_r(mysqli_fetch_row($albums));
// $sql2 = "SELECT albums_album_id FROM albums_listeners WHERE listeners_listener_id  = $listener_id";
$sql2 = "SELECT * FROM albums a INNER JOIN albums_listeners al ON (a.album_id = al.albums_album_id) INNER JOIN artists ar ON (ar.artist_id = a.artists_artist_id) WHERE al.listeners_listener_id  = $listener_id";

$myAlbums = mysqli_query($conn, $sql2);
// print_r(mysqli_fetch_row($myAlbums));
// if(mysqli_num_rows($myAlbums) > 0) {
//     while ($row = mysqli_fetch_assoc($myAlbums)) {
//         $album_ids[] = $row['albums_album_id'];
//         // var_dump(($album_ids)); 
    
//     }
// } else {
//     $album_ids = [];
// }

// print_r($album_ids);
// exit();


?>
<div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album Name</th>
                <th>Artist Name</th>
            </tr>
        </thead> 
        <tbody>
        <?php
        // var_dump((mysqli_num_rows($myAlbums) > 0));
        if(mysqli_num_rows($myAlbums) > 0) {
            while ($row = mysqli_fetch_assoc($myAlbums)) {
                // var_dump($row);
                $album_ids[] = $row['albums_album_id'];
                print "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>"; 
            }
        } else{
            $album_ids = [];
            echo "<p>You have no albums</p>";
        } 
        
        ?>
        </tbody>
    </table> 

</div>
<div class="container-fluid container-lg">
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> -->
    <form action="createAlbums.php" method="POST"> 
        
        <?php
        // if (mysqli_num_rows($albums) > 0) {

        //     while ($row = mysqli_fetch_assoc($albums)) {
                
        //         echo "<div class='form-check'>
        //             <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]'>
        //             <label class='form-check-label' for='flexCheckDefault'>
        //                 {$row['title']}
        //             </label>
        //             </div>";
        //     }
        // }

        if (mysqli_num_rows($albums) > 0) {

            while ($row = mysqli_fetch_assoc($albums)) {
                if(in_array($row['album_id'], $album_ids) ) {
                    echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]' checked>
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['title']}
                    </label>
                    </div>";
                } else{
                    echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]'>
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['title']}
                    </label>
                    </div>";
                }
                
            }
        }

        ?>
        <button type="submit" class="btn btn-primary">update list</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>