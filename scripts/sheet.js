var character;

var dbRequest = function(url){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if(this.status == 200) {
            var data = JSON.parse(this.responseText);
            alert( data);
        }
    }

    req.open('GET', url);
    req.send();

}


window.onload = function (){
    
}