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
            echo "<td>" . $row['songtitle'] . "</td>";
            echo "<td>" . $row['sdescription'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td><a href=edit.php?id={$row['song_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['song_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
            print "</tr>";
            
        }
       

        ?>
    </table>