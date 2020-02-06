setTimeout(function () {
    console.log("I'm here!")
}, 5000);
console.log("Where are you?");

var dive = document.getElementById('root');

function changtext(){
    dive.textContent = 'Bonjour je suis edouard !!!';
}

function apie(){

    fetch("api.php").then((resp) => resp.json()).then(function(data){
        console.log(data);
        var e = document.getElementById("pp").innerHTML = data[0];
    }).catch(function(error){
        console.log(error);
    }
    );

}


function getRandom(){
    //pour appeler une API on utilise la méthode fetch()
    fetch('js/api.php').then((resp) => resp.json()).then(function(data) {
    // data est la réponse http de notre API.
    console.log(data);
    UpdateDiv("pp",data[0]);
    })
    .catch(function(error) {
    // This is where you run code if the server returns any errors
    console.log(error);
    });
   }
   function UpdateDiv(id,text){
    var e = document.getElementById(id).innerHTML = text;
   }