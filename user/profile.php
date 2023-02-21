<?php
session_start();
include("../includes/header.php");

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}

?>
<div class="container-fluid container-lg">
    <table class="table table-striped">
  
        <thead>
            <tr>          
            <th><center><h3>User's Profile</h3></center></th>      
              
               
            </tr>
        
        </thead>
        <?php
        include "../includes/config.php";
        $result = mysqli_query($conn, "SELECT l.img_path 
                                        FROM listeners l, users u
                                        WHERE l.users_user_id = u.user_id AND l.users_user_id = {$_SESSION['user_id']}");


        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            print "<tr>";

            print "<td><center><img src='../images/{$row['img_path']}' width='200' height='300'></center></td>";
            
            print "</tr>";
        }

        ?>
    </table>
</div>

<div class="container-fluid container-lg">
    <table class="table table-striped">
    <!-- <p><h3>Current Session: User's Profile</h3></p> -->
        <thead>
            <tr>          
              
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
               
            </tr>
        </thead>
        <?php
        include "../includes/config.php";
        $result = mysqli_query($conn, "SELECT l.lname,u.email, l.address 
                                        FROM listeners l, users u
                                        WHERE l.users_user_id = u.user_id AND l.users_user_id = {$_SESSION['user_id']}");


        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            print "<tr>";
            // print "<td><img src='../images/{$row['img_path']}' width='200' height='300'></td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            
            print "</tr>";
        }

        ?>
    </table>
</div>


<div class="container-fluid container-lg">
    <table class="table table-striped">
        <p><h3>Current Listened</h3></p>
        <thead>
            <tr>         
                <th>Artist Photo</th>       
                <th>Album Title</th>
                <th>Genre</th>
                <th>Artist Name</th>
                <th>Country</th>
            </tr>
        </thead>
        <?php
        include "../includes/config.php";

        $result = mysqli_query($conn, "SELECT ar.img_path, a.albumtitle, a.genre, ar.name, ar.country
                                        FROM listeners l
        
            
                                        INNER JOIN albums_listeners al ON (al.listeners_listener_id = l.listener_id)
                                        INNER JOIN albums a ON (a.album_id = al.albums_album_id)
                                        INNER JOIN artists ar ON (ar.artist_id = a.artists_artist_id)

                                        WHERE l.users_user_id = {$_SESSION['user_id']}");

    while ($row = mysqli_fetch_assoc($result)) {
        // var_dump($row);
        print "<tr>";

        print "<td><img src='../images/{$row['img_path']}' width='100' height='100'></td>";
        echo "<td>" . $row['albumtitle'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        //echo "<td>" . $row['address'] . "</td>";
    
    print "</tr>";
    }
        ?>
        </table>
</div>

