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
            $sql = "Select * from admins where userName = '$user' and password = '$pass'";
            // if user and password are correct, then login
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if($result){
                $isLogin = true;
                $_SESSION['admin'] = $_POST['userName'];
                echo "<script type='text/javascript'>alert('Admin Logged In Successfully');</script>";
            }else{
                $isLogin = false;
                $message = "Invalid Username or Password";    
            }
            // $stmt = $connect->prepare($sql);
            // $stmt->execute();
            // $result = $stmt->fetchAll();
            // if($result){
            //     $_SESSION['admin'] = $user;
            //     $isLogin = true;
            // }
        }
        if(isset($_POST['btnDel'])){
            $delElem = $_POST['btnDel'];
            $sqlDelete = "DELETE FROM products WHERE pName = '$delElem'";
            $connect->exec($sqlDelete);
            echo "<script type='text/javascript'>alert('Product Deleted');</script>";
        }
        if(!$isLogin && !isset($_SESSION['admin'])){
            header("Location:adminLogin.php?Login=no");
        }
        
    }catch(PDOException $ex){
        print "Connection Failed" . $ex->getMessage();
    }
    
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
</head>
<body>
<div class="container">
    <h1>Welcome to the Admin Page <span style="color: red;"><?php echo $_SESSION['admin']?></span></h1>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li style="margin-left: 10px;" class="nav-item active"><a class="nav-link" href="#">List Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="addProduct.php">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="changeProduct.php">Change Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="addAdmin.php" class="btnOut">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>  
        </nav>
    </div>

    <section>
        <div class="searchTab">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <label>Category:</label>
                    <input name="pCategory" type="text" class="form-control" id="cat" placeholder="Category">
                </div>
                <div class="form-group">
                    <label>Product Name:</label>
                    <input name="pName" type="text" class="form-control" id="pName" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label>Minimum Price:</label>
                    <input name="pPrice" type="text" class="form-control" id="pPrice" placeholder="Price">
                </div>
                <input class="btn btn-success" type="submit" name="btnSearch" value="Search">
            </form>
        </div>
        <div class="productList">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table class="table table-dark table-striped" id="tblProducts">
                    <thead class="thead-dark"><tr><th>#</th><th>Category</th><th>Name</th><th>Price</th><th></th></tr></thead>
                    <tbody id="tblBody">

                    </tbody>
                </table>
            </form>
        </div>
    </section>
    <script>
        var searchData=[];
        <?php
            if(isset($_POST['btnSearch'])){
                $pCategory = $_POST['pCategory'];
                $pName = $_POST['pName'];
                $pPrice = $_POST['pPrice'];
                $searchQuery = "SELECT pCategory, pName, pPrice FROM products WHERE pCategory = '$pCategory' or pName = '$pName' or pPrice >= '$pPrice'";
                $result = $connect->query($searchQuery);
                $allSearchData = array();
                while($row=$result->fetch()){
                    array_push($allSearchData,$row);
                }
                echo "searchData = ".json_encode($allSearchData).";";
            }
        ?>
        function PlacedProducts(productList){
            var lengthOfSearch = productList.length;
            console.log(lengthOfSearch);
            for (var i = 0; i < lengthOfSearch; i++){
                var th = document.createElement("th");
                th.setAttribute("scope", "row");
                th.innerHTML = i+1;
                var tr = document.createElement('tr');
                var td1 = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var td4 = document.createElement('td');
                var pcategory = document.createTextNode(productList[i].pCategory)
                var pname = document.createTextNode(productList[i].pName)
                var pprice = document.createTextNode(productList[i].pPrice + "$")
                td1.appendChild(pcategory);
                tr.appendChild(th);
                tr.appendChild(td1)
                td2.appendChild(pname);
                tr.appendChild(td2)
                td3.appendChild(pprice);
                tr.appendChild(td3)
                var btnDel = document.createElement('button');
                var nodeDel = document.createTextNode('Delete')
                btnDel.appendChild(nodeDel);
                btnDel.setAttribute('type','submit');
                btnDel.setAttribute('name','btnDel');
                btnDel.setAttribute("class", "btn btn-danger");
                btnDel.setAttribute('value',productList[i].pName);
                td4.appendChild(btnDel);
                tr.appendChild(td4);
                document.getElementById('tblBody').appendChild(tr);
            }
        }
        PlacedProducts(searchData)
    </script>
</div>
</body>
</html>