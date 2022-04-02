products = [
    {
        name: "Bonsai 1",
        description: "A really good Bonsai for your place",
        price: 10,
        image: "https://www.hediyesepeti.com/blog/wp-content/uploads/2020/10/bonsai-bakimi.jpg"
    },
    {
        name: "Bonsai 2",
        description: "This mini-tree will decorate your house",
        price: 20,
        image: "https://imgrosetta.mynet.com.tr/file/36820/728xauto.jpg"
    },
    {
        name: "Bonsai 3",
        description: "This plant will add some color",
        price: 30,
        image: "https://media.istockphoto.com/photos/bonsai-japanese-red-maple-picture-id482617609"
    },
    {
        name: "Bonsai 4",
        description: "Taken from a secret monastery in Japan",
        price: 10,
        image: "https://mymodernmet.com/wp/wp-content/uploads/2021/02/bonsai-tree-history-thumb-large.jpg"
    },
    {
        name: "Çağla",
        description: "From Japan with love...",
        price: 99,
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9MttmjBEez8wYHe3_z-OotnrSNQQMFdhVGk6TwWbDCaz_Z-gI9f-62cG-UmbQMb2kaTU&usqp=CAU"
    },
    {
        name: "Bonsai 6",
        description: "A wonderful gift for a family member",
        price: 30,
        image: "https://previews.123rf.com/images/johnharrisonphotography/johnharrisonphotography1807/johnharrisonphotography180700094/105756821-beautiful-vibrant-green-juniper-bonsai-tree-with-shibari.jpg"
    }
]

//display 3 products per row
function displayProducts() {
    document.getElementById("items-container").innerHTML += `
    <h1>Welcome to Hasan's Bonsai Store</h1>
    <div class="card-row">
    <div class="card">
        <div class="card-image">
            <img src=${products[0].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[0].name}</h3>
            <p class="desc">${products[0].description}</p>
            <p class="price">price: $${products[0].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
    <div class="card">
        <div class="card-image">
        <img src=${products[1].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[1].name}</h3>
            <p class="desc">${products[1].description}</p>
            <p class="price">price: $${products[1].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
    <div class="card">
        <div class="card-image">
        <img src=${products[2].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[2].name}</h3>
            <p class="desc">${products[2].description}</p>
            <p class="price">price: $${products[2].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
</div>
<div class="card-row">
    <div class="card">
        <div class="card-image">
        <img src=${products[3].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[3].name}</h3>
            <p class="desc">${products[3].description}</p>
            <p class="price">price: $${products[3].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
    <div class="card">
        <div class="card-image">
        <img src=${products[4].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[4].name}</h3>
            <p class="desc">${products[4].description}</p>
            <p class="price">price: $${products[4].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
    <div class="card">
        <div class="card-image">
        <img src=${products[5].image} alt="bonsai1" width="250px" height="150px">
        </div>
        <div class="card-description">
            <h3>${products[5].name}</h3>
            <p class="desc">${products[5].description}</p>
            <p class="price">price: $${products[5].price}.00</p>
            <button onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
</div>`;
}

var totalPrice;
function displayCart(){
    //total price of the cart
    totalPrice = 0
    for(let i = 0; i < cartContent.length; i++){
        // cast to integer
        totalPrice += parseInt(cartContent[i].price)
    }
    
    let contentOfCart = `
    <div id="totalPrice" style='float:left;'><h1 style="color:white;">Total Price: $${totalPrice} <span id="totalPrice"></span></h1></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2 class="method">Please Select a payment method:</h2>
        <button onclick="payAtDoor()">Pay at the door</button>
        <button onclick="payWithCreditCard()">Pay with Credit Card</button>
    <br>
    <br>
    <br>
    <h1 class="method">This is your cart</h1>
    <br>
    <div id="cart-container">
    `;

    for(let i = 0; i < cartContent.length; i++){
        //display the product name, price, and image
        contentOfCart += `
            <div class="card-cart">
                <div class="card-image">
                    <img src=${cartContent[i].image} alt="bonsai1" width="250px" height="150px">
                </div>
                <div class="card-description">
                    <h3>${cartContent[i].name}</h3>
                    <p class="desc">${cartContent[i].description}</p>
                    <p class="price">price: $${cartContent[i].price}.00</p>
                    <button onclick="removeFromCart(${i})">Remove from Cart</button>
                </div>
            </div>`;
    }
    contentOfCart += `</div>`;
    
    
    document.getElementById("cartPage").innerHTML = contentOfCart;
}

function submitForm() {
    var name = document.getElementById("name").value;
    var desc = document.getElementById("description").value;
    var price = document.getElementById("price").value;
    var image = document.getElementById("image").value;
    var newProduct = {
        name: name,
        description: desc,
        price: price,
        image: image
    };

    products.push(newProduct);
    

    document.getElementById("items-container").innerHTML += `
    <div class="card-row">
        <div class="card">
            <div class="card-image">
                <img src=${newProduct.image} alt="bonsai1" width="250px" height="150px">
            </div>
            <div class="card-description">
                <h3>${newProduct.name}</h3>
                <p class="desc">${newProduct.description}</p>
                <p class="price">price: $${newProduct.price}.00</p>
                <button onclick="addToCart()">Add to Cart</button>
            </div>
        </div>
    </div>`;

    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    document.getElementById("price").value = "";
    document.getElementById("image").value = "";
    
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "block";
}


var cartContent = []
function addToCart(){
    //add to cart list the card which button is clicked
    let card = event.target.parentNode.parentNode;
    let name = card.querySelector("h3").innerText;
    let price = card.querySelector("p.price").innerText.slice(8, 10);
    let image = card.querySelector("img").src;
    let description = card.querySelector("p.desc").innerText;
    let newItem = {
        name: name,
        price: price,
        description: description,
        image: image
    };
    cartContent.push(newItem);
    displayCartContent();
}

function displayCartContent(){
    let total = 0;
    for(let i = 0; i < cartContent.length; i++){
        total += parseInt(cartContent[i].price)
    }
    document.getElementById("counter").innerText = "Total Items in Cart: " + cartContent.length + ", $" + total;
}

function displayDoor(){
    //display paying at the door content inside div class doorPage
    document.getElementById("doorPage").innerHTML = `
    <h2 class="thanks">Thank you for your purchase!</h1>
    <h2 class="priceText">Total Price: $${totalPrice}</h2>
    <h2 style="text-align: center;">Please selecet and address for delivery</h2>
    <div class="form-container">
            <div class="form-title">Enter your Address</div>
            <div class="inputs">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" required>
                <br>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
                <br>
                <label for="district">District:</label>
                <input type="text" name="district" id="district" required>
                <br>
                <label for="number">Number:</label>
                <input type="text" name="number" id="number" required>
                <br>
                <button type="button" onclick="purchase()">Complete Purchase</button>
            </div>  
        </div>
    `;
}

function displayCredit(){
    document.getElementById("creditPage").innerHTML = `
    <h2 class="thanks">Thank you for your purchase!</h1>
    <h2 class="priceText">Total Price: $${totalPrice}</h2>
    <h2 style="text-align: center;">Please selecet and address for delivery and your credit card information</h2>
    <div class="card-row">
        <div class="form-container">
                <div class="form-title">Enter your Address</div>
                <div class="inputs">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" required>
                    <br>
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" required>
                    <br>
                    <label for="district">District:</label>
                    <input type="text" name="district" id="district" required>
                    <br>
                    <label for="number">Number:</label>
                    <input type="text" name="number" id="number" required>
                </div>  
        </div>
        <div class="form-container">
                <div class="form-title">Enter your Credit Card Info</div>
                <div class="inputs">
                    <label for="creditNumber">Credit Card Number:</label>
                    <input type="text" name="creditNumber" id="creditNumber" required>
                    <br>
                    <label for="date">Date:</label>
                    <input type="text" name="date" id="date" required>
                    <br>
                    <label for="cvc2">CVC2:</label>
                    <input type="text" name="cvc2" id="cvc2" required>
                    <br>
                    <button type="button" onclick="purchase()">Complete Purchase</button>
                </div>  
        </div>

    </div>
    `;
}

function purchase(){
    //if the parent of the button is id doorPage
    if(event.target.parentNode.parentNode.parentNode.id == "doorPage"){
        document.getElementById("doorPage").innerHTML = `
        <h3 style="color: red">Address of deliver </h3>
        <div class="card-row">
            <div class="card">
                <h3>Country: ${document.getElementById("country").value}</h3>
                <h3>City: ${document.getElementById("city").value}</h3>
                <h3>District: ${document.getElementById("district").value}</h3>
                <h3>Number: ${document.getElementById("number").value}</h3>
                <h2>Thank you for your purchase!</h2>
                <h2>Total Price: $${totalPrice}</h2>
            </div>
        </div>
        `;
    }else{
        document.getElementById("creditPage").innerHTML = `
        <h3 style="color: red">Address of deliver </h3>
        <div class="card-row">
            <div class="card">
                <h3>Country: ${document.getElementById("country").value}</h3>
                <h3>City: ${document.getElementById("city").value}</h3>
                <h3>District: ${document.getElementById("district").value}</h3>
                <h3>Number: ${document.getElementById("number").value}</h3>
                <h2>Thank you for your purchase!</h2>
                <h2>Total Price: $${totalPrice}</h2>
            </div>
        </div>
        `;
    }
    
    //clear the cart
    cartContent = [];
    displayCartContent();
}

function removeFromCart(){
    cartContent.splice(event.target.parentNode.parentNode, 1);
    displayCart();
    displayCartContent();
}

function payWithCreditCard(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "none";
    document.getElementById("doorPage").style.display = "none";
    document.getElementById("creditPage").style.display = "block";
    displayCredit();
}

function payAtDoor(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "none";
    document.getElementById("doorPage").style.display = "block";
    document.getElementById("creditPage").style.display = "none";
    displayDoor();
}

function cartPage(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "block";
    document.getElementById("doorPage").style.display = "none";
    document.getElementById("creditPage").style.display = "none";
    displayCart();
}

function home(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "block";
    document.getElementById("cartPage").style.display = "none";
    document.getElementById("doorPage").style.display = "none";
    document.getElementById("creditPage").style.display = "none";
}

function addPage(){
    document.getElementById("addBonsai").style.display = "block";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "none";
    document.getElementById("doorPage").style.display = "none";
    document.getElementById("creditPage").style.display = "none";
}