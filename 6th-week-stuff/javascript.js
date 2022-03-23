
function fun(){
    var randomColor = Math.floor(Math.random()*16777215).toString(16);
    document.getElementById("txt").style.color = "#" + randomColor;

    let p = document.createElement("p")
    let text = document.createTextNode("This is a new created text")

    p.appendChild(text)
    document.getElementById("new").appendChild(p)
    p.style.color = "#" + randomColor;
}

function add(){
    var n1 = document.getElementById("n1").value
    var n2 = document.getElementById("n2").value
    result = parseInt(n1) + parseInt(n2)
    document.getElementById("sum").innerHTML = result
}

function trigger(){
    /* let attribute = document.createAttribute("onClick")
    attribute.value = "add()"
    document.getElementById("event").setAttributeNode(attribute) */

    let button = document.getElementById("event")
    button.onclick = add
}