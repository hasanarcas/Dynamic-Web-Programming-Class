<?php
    error_reporting(0);
    session_start();
    $serverName = "localhost";
    $userNameForDB = "root";
    $passwordForDB = "";
    $db = "finaldb";

    $userNameErr = $passwordErr = "";
    if(isset($_POST['userRegister'])){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        if(empty($userName)){
            $userNameErr = "User Name is required";
        }else{
            $userNameErr = "";
        }

        if(empty($password)){
            $passwordErr = "Password is required";
        }else{
            $passwordErr = "";
        }

        try{
            $connect = new PDO("mysql:host=$serverName;dbname=$db",$userNameForDB,$passwordForDB);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if($userNameErr=="" && $passwordErr==""){
                
                $isUniq = isUserExist($connect, $userName);

                if($isUniq){
                    $passwordMD5 = md5($password);
                    $sqlRegister = "INSERT INTO users (userName, password) VALUES ('$userName','$passwordMD5')";
                    $connect->exec($sqlRegister);
                
                    echo "<script type='text/javascript'>alert('User Created');</script>";
                    $userName ="";
                    $password ="";
                }else{
                    $userNameErr = "Username already exists";
                }
            }
        }catch(PDOException $ex){echo $ex;}
    }

    function isUserExist($connection, $user){
        $sqlUsername = "SELECT userName FROM users WHERE userName='$user'";
        $resultOfUserName = $connection->query($sqlUsername);
        $row = $resultOfUserName->fetch();
        $resultOfThis = $row[0] == "" ? true : false;
        return $resultOfThis;
    }
    $connect = null;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
                        <li class="nav-item active" style="color: black"><?php echo $_SESSION['user']?></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Homepage</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#myBasket">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminLogin.php">Admin Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>

    <div class="register">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            
            <table>
                <tr><td colspan="3"><span class="error">* : Required</span></td><td></td><td></td></tr>

                <tr><td>User Name: </td> <td><input type="text" name="userName" value="<?php echo $userName ?>"> </td> 
                <td><span class="error">*<?php echo $userNameErr ?></span> </td></tr>

                <tr><td>Password: </td> <td><input type="password" name="password" value="<?php echo $password ?>"> </td> 
                <td><span class="error">*<?php echo $passwordErr ?></span> </td></tr>

                <tr><td colspan="2"><input class="btn btn-success" type="submit" name="userRegister" value="Register" style="width:60%;"></td><td></td><td></td></tr>
            </table>
            
        </form>
    </div>
</div>
</body>
</html>