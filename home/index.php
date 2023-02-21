<?php
include("../includes/header.php");
include("../includes/config.php");

print "You are in the home page"

?>
<div class="container-fluid container-lg">
   
   <table class="table table-striped">
       <thead>
           <tr>
             
               <th>Album ID</th>
               <th>album Name</th>
               <th>Artist</th>
               <!-- <th>Image</th> -->
               <th>Genre</th>
               <th>Date Released</th>
               <!-- <th>Action</th> -->
           </tr>
       </thead>

       
       <?php
       include "../includes/config.php";
       $result = mysqli_query($conn, "SELECT * FROM albums al INNER JOIN artists ar on (al.artists_artist_id = ar.artist_id)");

       while ($row = mysqli_fetch_assoc($result)) {
           // var_dump($row);
           print "<tr>";
           echo "<td>" . $row['album_id'] . "</td>";
           echo "<td> <a href='albumsong.php?album_id={$row['album_id']}' >{$row['title']}</a></td>";
           echo "<td>" . $row['name'] . "</td>";
           //print "<td><img src='../images/{$row['img_path']}' width='50' height='50'></td>";
           echo "<td>" . $row['genre'] . "</td>";
           echo "<td>" . $row['date_released'] . "</td>";
           //echo "<td><a href=edit.php?id={$row['album_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['album_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
           print "</tr>";
       }

       ?>
   </table>
