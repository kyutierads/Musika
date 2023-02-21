<?php
    include "../includes/header.php";
?>

<form action="store.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter artist name" name="name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Country</label>
    <input type="text" class="form-control"
    placeholder="Enter Country" name="country">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control"
    placeholder="Image" name="img_path">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
  <a class='btn btn-outline-secondary' href='index.php' role='cancel;'>back<a>
</form>
</body>
</html>