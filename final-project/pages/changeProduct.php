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

        if(isset($_POST['btnChange'])){
            $cName = $_POST['cName'];
            $pCategory = $_POST['pCategory'];
            $pName = $_POST['pName'];
            $pPrice = $_POST['pPrice'];
            $pDescription = $_POST['pDescription'];
            $pImage = $_POST['pImage'];
    
            $sql = "UPDATE products SET pCategory='$pCategory', pName='$pName', pPrice='$pPrice', pDescription='$pDescription' WHERE pName='$cName'";
            $result = $connect->exec($sql);
            echo "<script>alert('Product Updated')</script>";
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
    <title>Change Product</title>   
    <link rel="stylesheet" href="../style/adminPanel.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-danger">Change a Product by Product Name</h1>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li style="margin-left: 10px;" class="nav-item active"><a class="nav-link" href="adminPanel.php">List Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="addProduct.php">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Change Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="addAdmin.php" class="btnOut">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>  
        </nav>
    </div>

    <div class="changeProduct">
            <form id="changeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table style="margin-left: 0px;" class="table table-striped table-dark" id="tblEkle" style="width:50%;">
                    <tr>
                        <th>Change Product</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Name of the product</td>
                        <td><input type="text" name="cName" id="cName" required></td>
                    </tr>
                    <tr>
                        <td>New Category</td>
                        <td><input type="text" name="pCategory" id="pCategory" required value= <?php $_SESSION["pCategory"] ?>></td>
                    </tr>
                    <tr>
                        <td>New Name</td>
                        <td><input type="text" name="pName" id="pName" required></td>
                    </tr>
                    <tr>
                        <td>New Price</td>
                        <td><input type="text" name="pPrice" id="pPrice" required></td>
                    </tr>
                    <tr>
                        <td>New Description</td>
                        <td><input type="text" name="pDescription" id="pDescription" required></td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="btn btn-success" type="submit" name="btnChange" value="Change Product">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>

</div>