products = [
    {
        name: "Bonsai 1",
        description: "A really good Bonsai",
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
        description: "This plant will add some color to your place",
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
        name: "Bonsai 5",
        description: "From Japan with love",
        price: 20,
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

function displayCart(){
    //total price of the cart
    let totalPrice = 0
    for(let i = 0; i < cartContent.length; i++){
        // cast to integer
        totalPrice += parseInt(cartContent[i].price)
    }
    
    let contentOfCart = `
    <div id="totalPrice" style='float:left;'><h1>Total Price: $${totalPrice} <span id="totalPrice"></span></h1></div>
    <h1>This is your cart</h1>
    `;

    for(let i = 0; i < cartContent.length; i++){
        //display the product name, price, and image
        contentOfCart += `
        <div class="card-row">
            <div class="card">
                <div class="card-image">
                    <img src=${cartContent[i].image} alt="bonsai1" width="250px" height="150px">
                </div>
                <div class="card-description">
                    <h3>${cartContent[i].name}</h3>
                    <p class="desc">${cartContent[i].description}</p>
                    <p class="price">price: $${cartContent[i].price}.00</p>
                    <button onclick="removeFromCart(${i})">Remove from Cart</button>
                </div>
            </div>
        </div>`;
    }

    contentOfCart += `<h2>Please Select a payment method:</h2>`
    contentOfCart += `
        <button onclick="payAtDoor">Pay at the door</button>
        <button onclick="payWithCreditCard()">Pay with Credit Card</button>
    `;
    
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
    console.log(document.getElementById("items-container").innerHTML)
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
}

function removeFromCart(){
    cartContent.splice(event.target.parentNode.parentNode, 1);
    displayCart();
}


function cartPage(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "block";
    displayCart();
}

function home(){
    document.getElementById("addBonsai").style.display = "none";
    document.getElementById("items-container").style.display = "block";
    document.getElementById("cartPage").style.display = "none";
}

function addPage(){
    document.getElementById("addBonsai").style.display = "block";
    document.getElementById("items-container").style.display = "none";
    document.getElementById("cartPage").style.display = "none";
}