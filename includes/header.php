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
            <a href="../home/index.php" class="navbar-brand">MUSIKA</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="../home/index.php" class="nav-item nav-link active">Home</a>
                    <a href="../user/profile.php" class="nav-item nav-link">Profile</a>
                    <a href="../artist/index.php" class="nav-item nav-link">Artists</a>
                    <a href="../album/index.php" class="nav-item nav-link">Albums</a>
                    <a href="../song/index.php" class="nav-item nav-link">Songs</a>
                    <a href="../listener/albumlist.php" class="nav-item nav-link">Reviews</a>
                </div>

                <?php
                    if(!isset($_SESSION['user_id'])) {
                        echo "<div class='navbar-nav ms-auto'>
                        <a href='http://{$_SERVER['SERVER_NAME']}/Musika/user/login.php'  class='nav-item nav-link'>Login</a></div>";        
                    }
                    else {
                        echo "<div class='navbar-nav ms-auto'>
                        <a href='http://{$_SERVER['SERVER_NAME']}/Musika/user/logout.php'  class='nav-item nav-link'>Logout</a></div>"; 
                    }
                ?>
            </div>
        </div>
    </nav>
</div>