<?php
    session_start();
    error_reporting(0);
    $server = "localhost";
    $userName = "root";
    $password = "";
    $db = "finaldb";
    // if(!isset($_SESSION['admin'])){
    //     header("Location:adminLogin.php?Login=no");
    // }
    try{
        $connect = new PDO("mysql:host=$server;dbname=$db",$userName,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['btnInsert'])){
            $pCategory = $_POST['pCategory'];
            $pName = $_POST['pName'];
            $pPrice = $_POST['pPrice'];
            $pDescription = $_POST['pDescription'];
            $pImage = $_POST['pImage'];
    
            $sql = "INSERT INTO products(pCategory, pName, pPrice, pDescription, pImage) VALUES('$pCategory','$pName','$pPrice','$pDescription','$pImage')";
            $result = $connect->exec($sql);
            echo "<script type='text/javascript'>alert('Product Added');</script>";
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
    <link rel="stylesheet" href="../style/adminPanel.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="../jscode/natureStore.js"></script>
</head>
<body>
<div class="container">
    <h1>Add Product</h1>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li style="margin-left: 10px;" class="nav-item active"><a class="nav-link" href="adminPanel.php">List Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="changeProduct.php">Change Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="addAdmin.php" class="btnOut">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>  
        </nav>
    </div>
    <div class="newProduct">
            <form id="ekleForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table style="margin-left: 0px;" class="table table-striped table-dark" id="tblEkle" style="width:50%;">
                    <tr>
                        <th>Add Product</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" name="pCategory" id="pCategory" required></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="pName" id="pName" required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="pPrice" id="pPrice" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="pDescription" id="pDescription" required></td>
                    </tr>
                    <tr>
                        <td>Image URL</td>
                        <td><input type="text" name="pImage" id="pImage" required></td>
                    </tr>

                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="btn btn-success" type="submit" name="btnInsert" value="Add Product">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>

</div>    
</body>
</html>