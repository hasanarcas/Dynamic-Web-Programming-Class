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

    // if number of card classes % 3 == 0, then add a new row
    if (document.getElementsByClassName("card").length % 3 == 0) {
        var itemContainerContent = document.getElementsByClassName("item-container").innerHTML;
        itemContainerContent += "<div class='card-image'><img src='" + newProduct.image + "'></div><div class='card-description'><h3>" + newProduct.name + "</h3><p>" + newProduct.description + "</p><p>$" + newProduct.price + "</p></div>";
    }


    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    document.getElementById("price").value = "";
    document.getElementById("image").value = "";
}


function addToCart() {
    var itemContainerContent = document.getElementById("items-container").innerHTML;
    //itemContainerContent += '<div class="card-row"><div class="card"><div class="card-image"><img src="https://www.hediyesepeti.com/blog/wp-content/uploads/2020/10/bonsai-bakimi.jpg" alt="bonsai1" width="250px" height="150px"></div><div class="card-description"><h3>Bonsai 1</h3><p class="desc">A really good Bonsai</p><p>Price: $10.00</p><button onclick="addToCart()">Add to Cart</button></div></div><div class="card"><div class="card-image"><img src="https://imgrosetta.mynet.com.tr/file/36820/728xauto.jpg" alt="bonsai1" width="250px" height="150px"></div><div class="card-description"><h3>Bonsai 2</h3><p class="desc">This mini-tree will decorate your house</p><p>Price: $20.00</p><button onclick="addToCart(2)">Add to Cart</button></div></div><div class="card"><div class="card-image"><img src="https://media.istockphoto.com/photos/bonsai-japanese-red-maple-picture-id482617609" alt="bonsai1" width="250px" height="150px"></div><div class="card-description"><h3>Bonsai 3</h3><p class="desc">This plant will add some color to your place</p><p>Price: $30.00</p><button onclick="addToCart(3)">Add to Cart</button></div></div></div>'
    itemContainerContent += "<h1>xytcvybuonıpımğınbuıyvtc6rx5rıtvyubıpnoıpyvtctvy</h1>"
    console.log(itemContainerContent)
}