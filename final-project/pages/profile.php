<?php
    error_reporting(0);
    session_start();
    
    if(!isset($_SESSION['user'])){
        header("Location:login.php");
    }

    $server = "localhost";
    $userName = "root";
    $passwordForDB = "";
    $db = "finaldb";
    $isLogin = false;
    $error_msg = "";

    if(isset($_POST['change'])){
        $currentPassword = $_POST['pass'];
        $currentUserName = $_POST['username'];
        $newUserName = $_POST['cUsername'];
        $newPassword = md5($_POST['cPassword']);
        $sqlUpdate = "UPDATE users SET userName='$newUserName', password='$newPassword' WHERE userName='$currentUserName' AND password='$currentPassword'";
        $connect = new PDO("mysql:host=$server;dbname=$db",$userName,$passwordForDB);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $result = $connect->exec($sqlUpdate);
        $connect = null;
        $isLogin = true;
        if($result){
            echo "<script type='text/javascript'>alert('User Updated');</script>";
            // change the user name in the session
            $_SESSION['user'] = $newUserName;
        }else{
            $error_msg = "Please fill out the form correctly";
        }
    }
    
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 
</head>
<body>
<div class="container">
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" style="color: black"><?php echo $_SESSION['user']?></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#myBasket">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminLogin.php">Admin Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <h1 class="text-center mb-5" style="color: red; font-weight:bolder;">Please fill out the form in order to change Username and Password</h1>
    <div style="width: 40%;" class="container bg-dark">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="form-group">
                <label>Current Username</label>
                <input name="username" type="text" class="form-control" id="user" placeholder="Current Username">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Current Password</label>
                <input name="pass" type="password" class="form-control" id="pass" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Change Username</label>
                <input name="cUsername" type="text" class="form-control" id="changeUsername" placeholder="New Username">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Change Password</label>
                <input name="cPassword" type="password" class="form-control" id="changePassword" placeholder="New Password">
            </div>
            <button type="submit" name="change" class="btn btn-primary mt-5">Change Profile</button>
            <p style="color: red; font-weight: bolder;"><?php echo $error_msg ?></p>
        </form>
    </div> 
</div>   
</body>
</html>