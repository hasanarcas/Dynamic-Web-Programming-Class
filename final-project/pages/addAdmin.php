<?php
    session_start();
    error_reporting(0);
    $server = "localhost";
    $userNameForDB = "root";
    $passwordForDB = "";
    $db = "finaldb";
    // if(!isset($_SESSION['admin'])){
    //     header("Location:adminLogin.php?Login=no");
    // }

    $userName = "";
    $password = "";
    $userNameErr=$passwordErr=$authErr = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_POST['userName'])){
            $userNameErr = "Enter a username";
        }else{
            $userName = cleanProcess($_POST['userName']);
            if(!preg_match("/^[a-zA-Z]*$/",$userName)){
                $userNameErr = "Just letters are accepted";
            }else{
                $userNameErr ="";
            }
        }
        $passwordErr = empty($_POST['password']) ? "Please enter a password" : "";
    }
    try{
        $connect = new PDO("mysql:host=$server;dbname=$db",$userNameForDB,$passwordForDB);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['btnInsert']) && $userNameErr == "" && $passwordErr == ""){
            $password = md5($_POST['password']);
            //if userName is not exist
            $sql = "SELECT * FROM admins WHERE userName = '$userName'";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if($result){
                echo "<script type='text/javascript'>alert('Username already exists');</script>";
            }else{
                $sql = "INSERT INTO admins (userName,password) VALUES ('$userName','$password')";
                $connect->exec($sql);
                echo "<script type='text/javascript'>alert('Admin Created');</script>";   
            }     
        }
        $adminName = $_SESSION['admin'];
        $sqlTest = "SELECT userName FROM admins WHERE userName='$adminName'";
        $result = $connect->query($sqlTest);
        $row = $result->fetch();
        $_SESSION['auth'] = $row['authority'];
    }  
    catch(PDOException $ex){
        print "Connection Failed" . $ex->getMessage();
    }

    function cleanProcess($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    $connect = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../style/adminPanel.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 
    <script src="../jscode/natureStore.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-danger">Create an Admin</h1>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li style="margin-left: 20px;" class="nav-item active"><a class="nav-link" href="adminPanel.php">List Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="addProduct.php">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="changeProduct.php">Change Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" class="btnOut">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>  
        </nav>
    </div>
    <div class="newProduct">
            <form id="addForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table style="margin-left: 0px;" class="table table-dark table-striped" id="tblEkle" style="width:50%;">
                    <tr>
                        <th>Create an Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><label for="userName">Username: </label></td>
                        <td><input type="text" id="fUserName" name="userName"></td>
                        <td><span class="error">*<?php echo $userNameErr ?></span> </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" id="fPassword" name="password"></td>
                        <td><span class="error">*<?php echo $passwordErr ?></span> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-success" type="submit" name="btnInsert" value="Create">
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
            
        </div>

</div>  
</body>
</html>