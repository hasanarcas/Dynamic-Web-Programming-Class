<?php 
    error_reporting(0);
    if($_GET['Login'] == "no"){
        $message = "Wrong Username or Password";
    }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style/register.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <a href="index.php" ><img src="image/logo.png" alt=""></a>
                    <li class="nav-item active" style="color: #ffffff"><?php echo $_SESSION['user']?></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#myBasket">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Admin Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="register">
        <form method="post" action="./adminPanel.php">
            <table>
                <tr><td>Admin Login</td></tr>
                <tr><td><input type="text" name="userName" placeholder="Username"> </td></tr>
                <tr><td><input type="password" name="password" placeholder="Password"></td></tr>
                <tr><td><input class="btn btn-success" type="submit" name="btnLogin" value="Login" style="width:30%"></td></tr>
                <tr><td><a class="btn btn-primary" href="login.php" style="width:30%">Login as Normal User</a></td></tr>
                <tr><td style="color:#ff0000;"><?php echo $message?></td></tr>
            </table> 
        </form>
    </div>
</div>
</body>
</html>