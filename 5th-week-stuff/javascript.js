/* function createPerson(name, surname){
    let person={
        name:name,
        surname:surname
    }
    console.log(person)
}

createPerson("hasan ali", "özkan")


function object(name, surname){
    this.name = name,
    this.surname = surname
}

let person = new object("Hasan", "Arcas")
console.log(person) */

var persons = []

function personObject(name, surname, score, harf){
    this.name = name
    this.surname = surname
    this.score = score
    this.harf = harf
}

function createPerson(){
    let nameValue = document.getElementById("name").value
    let surnameValue = document.getElementById("surname").value
    let scoreValue = document.getElementById("score").value
    let harf = ""
    if(scoreValue <= 100 && scoreValue >= 0){
        if(scoreValue > 90){
            harf = "AA"
        }else if(scoreValue >80){
            harf = "BB"
        }else{
            harf = "FF"
        }
    }else{
        alert("Error")
    }

    let person = new personObject(nameValue, surnameValue, scoreValue, harf)
    persons.push(person)

    content = ""
    content += "<tr>"
    for (var key in person) {
        content += "<td>" + person[key] +"</td>"
    }
    content += "<td><button class='btn btn-danger' onClick='deleteStudent("+'"'+person.name+'"'+")'>Delete</button></td>"
    content += "</tr>"
    console.log(content)
    document.getElementById("table").innerHTML += content
}


function deleteStudent(name){
    persons.splice(name)
}


