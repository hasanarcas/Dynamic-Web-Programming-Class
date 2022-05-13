var totalPrice = new Array();
var total = 0;

class product{
    constructor(category, name, price, description, image){
        this.category = category;
        this.name = name;
        this.price = price;
        this.description = description;
        this.image = image;
    }
    // add get methods
    getCategory(){
        return this.category;
    }
    getName(){
        return this.name;
    }
    getPrice(){
        return this.price;
    }
    getDescription(){
        return this.description;
    }
    getImage(){
        return this.image;
    }
}

function emptyErrorControl(element){
    try{
        if(element == "") throw "Please enter all the values! ";
    }catch(error){
        alert(error)
    }
}

function numberErrorControl(){
    try{
        if(element == "") throw " Please enter all the values! ";
        if(isNaN(element)) throw  " Please enter a number ";
        return true;
    }catch(error){
        alert(error);
        return false;
    }
}

function placedBest(item){
    var divProduct = document.createElement('div');
        divProduct.setAttribute('class', 'bestProduct');
        document.getElementById('best').appendChild(divProduct);
        
        var divOfLeft = document.createElement('div');
        divOfLeft.setAttribute('class', 'bestLeft');
        divProduct.appendChild(divOfLeft);
        var imageOfProduct = document.createElement('img');
        imageOfProduct.src = item.getImage();
        imageOfProduct.style = "width: 200px; height: 200px;";
        divOfLeft.appendChild(imageOfProduct);

        var divFeatures = document.createElement('div');
        divFeatures.setAttribute('class', 'bestRight');
        divProduct.appendChild(divFeatures);
        var ulOfFeature = document.createElement('ul');
        ulOfFeature.setAttribute('class', 'bestFeatureList');
        divFeatures.appendChild(ulOfFeature);

        var liName = document.createElement('h4');
        var nodeName = document.createTextNode(item.getName());
        liName.appendChild(nodeName);
        ulOfFeature.appendChild(liName);

        var liCategory = document.createElement('li');
        var nodeCategory = document.createTextNode("Category: " + item.getCategory());
        liCategory.appendChild(nodeCategory);
        ulOfFeature.appendChild(liCategory);

        var liPrice = document.createElement('li');
        var nodePrice = document.createTextNode(item.getPrice() + " ₺");
        liPrice.appendChild(nodePrice);
        ulOfFeature.appendChild(liPrice);

        var liDescription = document.createElement('li');
        var nodeDescription = document.createTextNode(item.getDescription());
        liDescription.appendChild(nodeDescription);
        ulOfFeature.appendChild(liDescription);
        
}

function placedProduct(item, indexOfItem){
    var divProduct = document.createElement('div');
    divProduct.setAttribute('class', 'product');
    document.getElementById('allProducts').appendChild(divProduct);
    
    var divOfLeft = document.createElement('div');
    divOfLeft.setAttribute('class', 'left');
    divProduct.appendChild(divOfLeft);
    var imageOfProduct = document.createElement('img');
    imageOfProduct.src = item.getImage();
    imageOfProduct.style = "width: 200px; height: 200px;";
    divOfLeft.appendChild(imageOfProduct);

    var divFeatures = document.createElement('div');
    divFeatures.setAttribute('class', 'right');
    divProduct.appendChild(divFeatures);
    var ulOfFeature = document.createElement('ul');
    ulOfFeature.setAttribute('class', 'featureList');
    divFeatures.appendChild(ulOfFeature);

    var liName = document.createElement('h4');
    var nodeName = document.createTextNode(item.getName());
    liName.appendChild(nodeName);
    ulOfFeature.appendChild(liName);

    var liCategory = document.createElement('li');
    var nodeCategory = document.createTextNode(item.getCategory());
    liCategory.appendChild(nodeCategory);
    ulOfFeature.appendChild(liCategory);

    var liPrice = document.createElement('li');
    var nodePrice = document.createTextNode(item.getPrice() + " ₺");
    liPrice.appendChild(nodePrice);
    ulOfFeature.appendChild(liPrice);

    var liDescription = document.createElement('li');
    var nodeDescription = document.createTextNode(item.getDescription());
    liDescription.appendChild(nodeDescription);
    ulOfFeature.appendChild(liDescription);

    var liBasketButton = document.createElement('button');
    liBasketButton.setAttribute('id',indexOfItem);
    liBasketButton.setAttribute('onclick',`
    var idIndividual = parseInt(this.id);
    var productForBasket = productList[idIndividual]; 
    addToBasket(productForBasket, idIndividual); 
    totalPrice.push(productForBasket.getPrice());
    var total = 0; 
    for(var j = 0; j<totalPrice.length; j++){ 
        total += parseInt(totalPrice[j]);
    }; 
    document.getElementById("totalCost").innerHTML = "Total Price : " + total + " ₺";`);
    var nodeOfBasket = document.createTextNode('Add to basket');
    var linkToBasket = document.createElement('a');
    linkToBasket.setAttribute('href','#myBasket');
    linkToBasket.appendChild(nodeOfBasket);
    liBasketButton.appendChild(linkToBasket);

    liPrice.appendChild(liBasketButton);
}

function addToBasket(elementToBasket, indexOfBasket){
    var divProductBasket = document.createElement('div');
    divProductBasket.setAttribute('class','productInBasket');
    divProductBasket.setAttribute('id','parentBasket'+ indexOfBasket);
    document.getElementById('myBasket').appendChild(divProductBasket);

    var imgOfProductBasket = document.createElement('img');
    imgOfProductBasket.src = elementToBasket.getImage();
    imgOfProductBasket.setAttribute('class','photoOfBasket');
    divProductBasket.appendChild(imgOfProductBasket);

    var ulInfoBasket = document.createElement('ul');
    ulInfoBasket.setAttribute('class','infoContainer');
    divProductBasket.appendChild(ulInfoBasket);

    var h5NameBasket = document.createElement('h5');
    var nodeNameBasket = document.createTextNode(elementToBasket.getName());
    h5NameBasket.appendChild(nodeNameBasket);
    ulInfoBasket.appendChild(h5NameBasket);

    var liPriceBasket = document.createElement('li');
    var nodePriceBasket = document.createTextNode(elementToBasket.getPrice() + " ₺");
    liPriceBasket.appendChild(nodePriceBasket);
    ulInfoBasket.appendChild(liPriceBasket);

    var buttonDeleteBasket = document.createElement('button');
    buttonDeleteBasket.setAttribute('class','deleteFromBasket');
    buttonDeleteBasket.setAttribute('onclick','document.getElementById("parentBasket'+indexOfBasket+
    '").remove();if(document.getElementById("myBasket").childElementCount == 1){document.getElementById("buyDiv").style.visibility = "hidden"; document.getElementById("paymentType").style.visibility ="hidden";}');
    var nodeDelete = document.createTextNode("Delete from Basket");
    buttonDeleteBasket.appendChild(nodeDelete);
    divProductBasket.appendChild(buttonDeleteBasket);

    document.getElementById('buyDiv').style.visibility = 'visible';
}

function listProducts(elementToBasket, indexOfBasket){
    var divProductBasket = document.createElement('div');
    divProductBasket.setAttribute('class','productInBasket');
    divProductBasket.setAttribute('id','parentBasket'+ indexOfBasket);
    document.getElementById('myBasket').appendChild(divProductBasket);

    var imgOfProductBasket = document.createElement('img');
    imgOfProductBasket.src = elementToBasket.getImage();
    imgOfProductBasket.setAttribute('class','photoOfBasket');
    divProductBasket.appendChild(imgOfProductBasket);

    var ulInfoBasket = document.createElement('ul');
    ulInfoBasket.setAttribute('class','infoContainer');
    divProductBasket.appendChild(ulInfoBasket);

    var h5NameBasket = document.createElement('h5');
    var nodeNameBasket = document.createTextNode(elementToBasket.getName());
    h5NameBasket.appendChild(nodeNameBasket);
    ulInfoBasket.appendChild(h5NameBasket);

    var liPriceBasket = document.createElement('li');
    var nodePriceBasket = document.createTextNode(elementToBasket.getPrice() + " ₺");
    liPriceBasket.appendChild(nodePriceBasket);
    ulInfoBasket.appendChild(liPriceBasket);

    var liCategoryBasket = document.createElement('li');
    var nodeCategoryBasket = document.createTextNode(elementToBasket.getCategory());
    liCategoryBasket.appendChild(nodeCategoryBasket);
    ulInfoBasket.appendChild(liCategoryBasket);

    var buttonDeleteBasket = document.createElement('button');
    buttonDeleteBasket.setAttribute('class','deleteFromBasket');
    buttonDeleteBasket.setAttribute('onclick','document.getElementById("parentBasket'+indexOfBasket+
    '").remove();if(document.getElementById("myBasket").childElementCount == 1){document.getElementById("buyDiv").style.visibility = "hidden"; document.getElementById("paymentType").style.visibility ="hidden";}');
    var nodeDelete = document.createTextNode("Delete from Basket");
    buttonDeleteBasket.appendChild(nodeDelete);
    divProductBasket.appendChild(buttonDeleteBasket);

    document.getElementById('buyDiv').style.visibility = 'visible';
}

function resetTotalPrice(){
    document.getElementById("totalCost").innerHTML = "";
    totalPrice = [];
}