const HOST = 'localhost:8000';
var site = window.location.href;

$().ready(function(){
    var character = prompt("ID do Personagem");
    character = character ? character : 0;

    url = `https://${HOST}/character/${character}`;
    $.get(url, function(data){
        data = data[0];
        console.log(data);

    });
    
})