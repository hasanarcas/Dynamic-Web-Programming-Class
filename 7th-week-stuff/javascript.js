
var myList = []

fetch('./index.json')
   .then(response => {
        return response.json();
   })
   .then(json => {
        for(var i = 0; i < json.length; i++){
            console.log(json[i]);
        }
   })

