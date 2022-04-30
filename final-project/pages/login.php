<?php
    error_reporting(0);
    session_start();
    $server = "localhost";
    $userName = "root";
    $password = "";
    $db = "finaldb";
    $isLogin = false;
    try{
        $connect = new PDO("mysql:host=$server;dbname=$db",$userName,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($_POST['btnLogin']){
            $user = $_POST['userName'];
            $pass = md5($_POST['password']);
            $sql = "Select * from users where userName = '$user' and password = '$pass'";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if($result){
                $isLogin = true;
                $_SESSION['user'] = $_POST['userName'];
                echo "<script type='text/javascript'>alert('User Logged In Successfully');</script>";
                header("Location:./index.php");
            }else{
                $message = "Invalid Username or Password";    
            }
        }
    }
    catch(PDOException $ex){
        print "Connection Failed" . $ex->getMessage();
    }
    $connect = null;
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
                        <li class="nav-item active" style="color: #ffffff"><?php echo $_SESSION['user']?></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#myBasket">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminLogin.php">Admin Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="register">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    
                <table>
                    <tr><td>User Login</td></tr>
                    <tr><td><input type="text" name="userName" placeholder="User Name"> </td></tr>
                    <tr><td><input type="password" name="password" placeholder="Password"></td></tr>
                    <tr><td><input class="btn btn-primary" type="submit" name="btnLogin" value="Login" style="width:30%"></td></tr>
                    <tr><td><a class="btn btn-success" href="adminLogin.php" style="width: 30%;">Admin Login</a></td></tr>
                    <tr><td style="color:#ff0000;"><?php echo $message?></td></tr>
                </table>
                
            </form>
        </div>    
    </div>
</body>
</html>