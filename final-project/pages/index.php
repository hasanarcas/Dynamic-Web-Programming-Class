<?php
    session_start();
    error_reporting(0);
    $server = "localhost";
    $userName = "root";
    $password = "";
    $db = "finaldb";
    
    try{
        $connect = new PDO("mysql:host=$server", $userName, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlIsDBExist = "SHOW DATABASES LIKE '$db'";
            
        $isExist = $connect->query($sqlIsDBExist);
        $row = $isExist->fetch();
        if($row > 0){
            $connect = null;
            $connect = new PDO("mysql:host=$server;dbname=$db",$userName,$password);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        else{
            echo "Database not found";
        }
    } 
    catch(PDOException $ex){
        print "Connection Failed" . $ex->getMessage();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../style/index.css">
    <script src="../jscode/natureStore.js"></script>
    <title>Hasan's Nature Store</title>
</head>

<body>
    <div class="container">
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" style="color: black"><?php echo $_SESSION['user']?></li>
                    <li class="nav-item"><a class="nav-link" href="#">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link" href="#myBasket">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminLogin.php">Admin Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" class="btnOut">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div>
    <header id="best" class="best">
        <h3 style="text-align: center;">Cheapest product!!!</h3>    
    </header>
    </div>
    <div class="productsHeader">
        <h1>All Products</h1>
    </div>
    <div class="flex-container">
        <section id="allProducts" style="flex-grow: 2">  
        </section>
    </div>
    <footer>
        <div class="sepet" id="myBasket">
            <h3 style="text-align: center; color: red; font-weight:bolder;">Your Cart</h3>
        </div>

        <div id="buyDiv" class="payButtons">
            <p id="totalCost" style="color: aliceblue; margin-right: 20px;"></p>
            <button id="buy"style="margin-right: 20px;" onclick="document.getElementById('paymentType').style.visibility='visible'">Purchase Items</button> 
            <button id="continue" style="margin-right: 20px;" ><a href="#allProducts">Continue Shopping</a></button>
        </div>

        <div id="paymentType" class="payment">
            <h5>Choose a payment method</h5>
            <input type="radio" id="wire" name="odeme">
            <label for="wire">Pay at the door</label><br>
            <input type="radio" id="credit" name="odeme" >
            <label for="credit" style="margin-right: 30px;">Credit Card</label><br>
            
            <button type="button" onclick="document.getElementById('odemeBasariliAlert').style.visibility = 'visible';
            document.getElementById('paymentType').style.visibility = 'hidden';
            document.getElementById('buyDiv').style.visibility = 'hidden';
            var theLength = totalPrice.length
            for(var k = 0; k < theLength; k++){
                document.getElementById('myBasket').lastChild.remove();
                totalPrice.pop();                
            }">Finish Purchase
            </button>
        </div>
        <div id="odemeBasariliAlert" class="alert">
            <span class="closebtn" onclick="this.parentElement.style.visibility = 'hidden';">&times;</span> 
            The products are successfully bought. The shipment will be made within 3 days.
        </div>
        
       
        <p style="background-color: beige; text-align: center; font-size: small;">Hasan Arcas Copyright &copy;</p>
    </footer>

    <script>
        var products = [];
        <?php 
            $sql = "Select * from products";
            $result = $connect->query($sql);
            $products = array();
            while($row=$result->fetch()){
                array_push($products,$row);
            }
            echo "var products = " . json_encode($products) . ";" ;
            $productLength = count($products);
            $connect = null;
        ?>
        
        var counter = 0;
        var productLength = <?php echo $productLength ?>;
        var productList = new Array();
        for(var i = 0; i < productLength;i++){       
            productList.push(new product(products[i].pCategory, products[i].pName, products[i].pPrice, products[i].pDescription, products[i].pImage));
        }

        var lengthOfList = productList.length;
        // find the product with the smallest price
        var minPrice = parseInt(productList[0].price);
        var minIndex = 0;
        for(var i=0;i< lengthOfList; i++){
            var theProduct = productList[i];
            if(parseInt(productList[i].price) < minPrice){
                minPrice = parseInt(productList[i].price);
                minIndex = i;
            }
            placedProduct(theProduct,i);
            counter = i;
        }
        placedBest(productList[minIndex]);
        
    </script>
    </div>
</body>

</html>