//includes/header
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Brand</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">Profile</a>
                    <a href="#" class="nav-item nav-link">Artists</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Albums</a>
                </div>
                <div class="navbar-nav ms-auto">
               
                    <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .'/music/user/login.php' ?>" class='nav-item nav-link'>Login</a>
                
               
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .'/music/user/logout.php' ?>" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</div>


//user/login
<?php
session_start();

include("../includes/header.php");
include("../includes/config.php");
if (isset($_POST['submit'])) {
    // var_dump($_POST);
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

    $result = mysqli_query($conn, $sql);
    var_dump($result);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: profile.php");
    }
    else {
        echo "<p>wrong</p>";
    }
}
?>
<div class="row col-md-8 mx-auto ">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="register.php">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="register.php">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
</div>
<?php
include("../includes/footer.php");
?>

//user/profile
<?php
session_start();

include("../includes/header.php");
include("../includes/config.php");

print_r($_SESSION);


?>

//user/logout
<?php
session_start();
session_destroy();
header("Location: ../index.php");
?>

//lkistener/albumList

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
var_dump($_SESSION['user_id'],$listener_id,$_POST);


$sql2 = "SELECT * FROM listeners l INNER JOIN albums_listeners al ON (l.listener_id = al.listeners_listener_id) INNER JOIN albums a ON (a.album_id = al.albums_album_id)  INNER JOIN artists ar ON (ar.artist_id = a.artists_artist_id) WHERE l.listener_id = {$listener_id}";
$myAlbums = mysqli_query($conn, $sql2);

// 
$sql3 = "SELECT * FROM albums a LEFT OUTER JOIN  albums_listeners al ON (a.album_id = al.albums_album_id) WHERE a.album_id NOT IN ( SELECT albums_album_id FROM albums_listeners WHERE listeners_listener_id = {$listener_id}  );";
// $sql3 = "SELECT * FROM albums";
$albums = mysqli_query($conn, $sql3);
// var_dump($albums);




?>
<div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album Name</th>
                <th>Artist Name</th>
            </tr>
        </thead>
        <?php
        if(mysqli_num_rows($myAlbums) > 0) {
            while ($row = mysqli_fetch_assoc($myAlbums)) {
                //var_dump($row);
                print "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td><a href=delete.php?id={$row['album_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
                print "</tr>";
                
            }
        } else{
            echo "<p>You have no albums</p>";
        } 
        
        ?>
    </table>

</div>
<div class="container-fluid container-lg">
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> -->
    <form action="createAlbums.php" method="POST"> 
        
        <?php
        if (mysqli_num_rows($albums) > 0) {

            while ($row = mysqli_fetch_assoc($albums)) {
                echo "<div class='form-check'>
                    <input class='form-check-input' type='checkbox' value='{$row['album_id']}' id='flexCheckDefault' name='albums[]'>
                    <label class='form-check-label' for='flexCheckDefault'>
                        {$row['title']}
                    </label>
                    </div>";
            }
        }
        ?>
        <button type="submit" class="btn btn-primary">Add albums</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>


//listener/createAlbums
<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
var_dump($_POST['albums'], $_SESSION);
if (isset($_POST['albums'])) {
    $album_ids = $_POST['albums'];
    // var_dump($album_ids);
    foreach ($album_ids as $album_id) {
        // echo $album_id;
        $sql1 = "INSERT INTO albums_listeners (listeners_listener_id,albums_album_id) VALUES({$_SESSION['listener_id']}, $album_id )";
        $result = mysqli_query($conn, $sql1);
    }
    unset($_POST);
    $_POST['albums'] = array();
    header("Location: albumList.php");
}
?>

//listener/delete
<?php
    session_start();
    print_r($_SESSION);
    include("../includes/config.php");
    $result = mysqli_query($conn, "DELETE from albums_listeners WHERE albums_album_id = {$_GET['id']} AND listeners_listener_id = {$_SESSION['listener_id']} ");
    if ($result) {
        header("Location: albumList.php");
    }
 
?>


