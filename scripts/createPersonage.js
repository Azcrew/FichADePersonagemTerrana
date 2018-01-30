var PV = 0;
var RPV = 0;
var modPV = 0;

var PM = 0;
var RPM = 0;
var modPM = 0;

var nivel = 0;
var pontos = 0;

var armadra = 0;
var focus = 0;
var forca = 1;
var habilidade = 0;
var precisao = 0;
var resistencia = 1;


function dBRequest(url)
{
    var req = new XMLHttpRequest();
    
    req.open("GET", url, false);
    req.send();

    return req.response
}

function selectRace(value)
{
    var url = "db.php?t=race&i=" + value + "&f=";
    modPV = dBRequest(url + "modPV");
    alterPV();
    modPM = dBRequest(url + "modPM");
    alterPM();
}

function changeCar()
{
    armadra = document.getElementById("armadura").value;
    focus = document.getElementById("focus").value;
    forca = document.getElementById("forca").value;
    habilidade = document.getElementById("habilidade").value;
    precisao = document.getElementById("precisao").value;
    resistencia = document.getElementById("resistencia").value;
}

function alterPV()
{
    document.getElementById("PV").innerHTML = modPV * resistencia;
    document.getElementById("RPV").innerHTML = Math.trunc(modPV * resistencia * 0.2718);
}

function alterPM()
{
    document.getElementById("PM").innerText = modPM * focus
    document.getElementById("RPM").innerHTML = Math.trunc(modPM * focus * 0.2718);
}