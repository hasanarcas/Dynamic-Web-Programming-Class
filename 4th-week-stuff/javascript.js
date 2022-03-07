var clicked = false;


function myFunction(){
    if(!clicked){
        document.getElementById("header").innerHTML = "Header changed";
        document.getElementById("photo").src = "ww.jpg";
        clicked = true;
    }
    else{
        document.getElementById("header").innerHTML = "Demo for javascript";
        document.getElementById("photo").src = "weed1.jpg";
        document.getElementById("sumNumbers").innerHTML = "The sum of the numbers above";
        document.getElementById("list").innerHTML = ""
        clicked = false;
    }
}

function sumFunction(list){
    let total = 0
    for(i = 0; i < list.length; i++){
        total += parseInt(list[i])
    }
    return total;
}

function sum(){
    let listText = document.getElementById("demo").textContent;
    listText = listText.split(" ")
    let listNumbers = []
    listText.forEach(element => {
        element = parseInt(element)
        console.log(element)
        if(!isNaN(element)){
            listNumbers.push(element)
        }
    });
    document.getElementById("sumNumbers").innerHTML = sumFunction(listNumbers);
}

function iter(){
    let listText = document.getElementById("demo").textContent;
    listText = listText.split(" ")
    for (let i = 0; i < listText.length; i++) {
        document.getElementById("list").innerHTML += "<li>"+ listText[i] +"</li>"
    }
}