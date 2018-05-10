const HOST = 'holy:8000';
var character = [];

var fieldName = function(field, id){
    $.get( `https://${HOST}/${field}/${id}`, function(data) {
    $(`#${field}`).text(data[0]['name']);
});
}

var getCharacter = function(){
    var char;// = prompt("ID do Personagem");
    char = char ? char : 1;
    url = `https://${HOST}/character/${char}`;
    $.get(url, function(data){
<<<<<<< HEAD
<<<<<<< HEAD
        data = data[0];
        print(data);

    });
    
})
=======
        obj = JSON.parse(data[0]['json']);
        for(var prop in obj){
            character.push(obj[prop]);
        }
        
    });
=======
        obj = JSON.parse(data[0]['json']);
        for(var prop in obj){
            character.push(obj[prop]);
        }
        
    });
>>>>>>> 2ec508273ca10cfad8ccca9c62b00c74dd5443e2
}

$().ready(function(){
    getCharacter();
    console.log(character);
    fieldName('race', 1);
<<<<<<< HEAD
})
>>>>>>> 3671e0dd9f0e34e441bab767eb014dede7b891bb
=======
})
>>>>>>> 2ec508273ca10cfad8ccca9c62b00c74dd5443e2
