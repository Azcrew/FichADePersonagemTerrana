var pv = 0;
var rpv = 0;
var modpv = 0;

var pm = 0;
var rpm = 0;
var modpm = 0;

var atk = 0;
var def = 0;

var nivel = 0;
var pontos = 0;

var armadura = 0;
var focus = 0;
var forca = 0;
var habilidade = 0;
var precisao = 0;
var resistencia = 0;

var agua = 0;
var ar = 0;
var fogo = 0;
var luz = 0;
var terra = 0;
var trevas = 0;

var modClas = 0;
var ptsVant = 0;
var modVant = 0;
var ptsDesv = 0;
var modDesv = 0;
var ptsPeri = 0;
var modPeri = 0;

const file = "db.php";
const modStats = 10;
const euler = 0.2718 / 10;

//requisita dados ao banco
function dbRequest(url)
{
    var req = new XMLHttpRequest();
    
    req.open("GET", url, false);
    req.send();

    return req.response
}

//requisita as informações necessarias ao site e altera seus valores referentes
function selectRace(id)
{
    var url = file + "?t=race&i=" + id + "&f=";
    modpv = dbRequest(url + "modPV");
    modpm = dbRequest(url + "modPM");
    alterDetails();
}

function selectClass(id)
{
    var url = file + "?t=class&i=" + id + "&f=";
    modClas = dbRequest(url + "modifier");
    //alert("mod class = " + modClas);
}

//requisita as informações necessarias ao site e altera seus valores referentes 
function selectAdventure(id)
{
    var url = file + "?t=adventure&i=" + id + "&f=";
    nivel = dbRequest(url + "level");
    pontos = dbRequest(url + "points");
    document.getElementById("nivel").innerText = "Nivel - " + nivel;
    alterPoints();
    alterDetails();
}

function selectBenefit(id)
{
    var url = file + "?t=benefits%i=" + id + "$f=";
    alert(id);
}

function selectInjury(id)
{

}

function selectKnowledge(id)
{

}

//função necessaria por definir e verificar os pontos usados em caracteristicas e focus
function changeCar()
{
    //adquire os valores definidos pelo usuario para as caracteristicas e focus
    //se o valor for negativo define ele como 0
    armadura = document.getElementById("armadura").value;
    armadura = armadura >= 0 ? armadura : 0;

    focus = document.getElementById("focus").value;
    focus = focus >= 0 ? focus : 0;

    forca = document.getElementById("forca").value;
    forca = forca >= 0 ? forca : 0;

    habilidade = document.getElementById("habilidade").value;
    habilidade = habilidade >= 0 ? habilidade : 0;

    precisao = document.getElementById("precisao").value;
    precisao = precisao >= 0 ? precisao : 0;

    resistencia = document.getElementById("resistencia").value;
    resistencia = resistencia >= 0 ? resistencia : 0;

    agua = document.getElementById("agua").value;
    agua = agua >= 0 ? agua : 0;

    ar = document.getElementById("ar").value;
    ar = ar >= 0 ? ar : 0;

    fogo = document.getElementById("fogo").value;
    fogo = fogo >= 0 ? fogo : 0;

    luz = document.getElementById("luz").value;
    luz = luz >= 0 ? luz : 0;

    terra = document.getElementById("terra").value;
    terra = terra >= 0 ? terra : 0;

    trevas = document.getElementById("trevas").value;
    trevas = trevas >= 0 ? trevas : 0;

    //chama as funções de alteração da interface
    alterDetails();
    alterPoints();
}

//função responsavel por definir os detalhes do personagem
function alterDetails()
{
    //define os pontos de vida e de magia, e suas regenerações
    pv = nivel * resistencia * armadura * modpv;
    rpv = Math.trunc(pv * euler);
    pm = nivel * resistencia * focus * modpm;
    rpm = Math.trunc(pm * euler);

    //define 'atk' como o calculo de ataque baseado na caracteristica de combate mais alta
    if(focus >= forca && focus>= precisao)
    {
        var elemento = 0;

        elemento = (agua > elemento) ? agua : elemento;
        elemento = (ar > elemento) ? ar : elemento;
        elemento = (fogo > elemento) ? fogo : elemento;
        elemento = (luz > elemento) ? luz : elemento;
        elemento = (terra > elemento) ? terra : elemento;
        elemento = (trevas > elemento) ? trevas : elemento;

        atk = (parseInt(elemento) + parseInt(focus)) * habilidade;
        if(!atk)
        {
            atk = 0;
        }
    }
    else if (forca >= focus && forca >= precisao)
    {
        atk = forca * habilidade;
    }
    else
    {
        atk = precisao * habilidade;
    }

    def = armadura * resistencia;

    //exibe os detalhes
    document.getElementById("PV").innerText = pv;
    document.getElementById("RPV").innerText = rpv;
    document.getElementById("PM").innerText = pm;
    document.getElementById("RPM").innerText = rpm;
    document.getElementById("ataque").innerText = atk;
    document.getElementById("defesa").innerText = def;
}

//função responsavel por verificar e exibir os pontos
function alterPoints()
{
    //usado para nao alterar os valores originais
    var pontosTemp = pontos;
    var focusTemp = focus;
    
    //Caracteristicas
    pontosTemp -= armadura;
    pontosTemp -= focus;
    pontosTemp -= forca;
    pontosTemp -= habilidade;
    pontosTemp -= resistencia;
    pontosTemp -= precisao;

    //vantagens, Desvantagens e Pericias
    pontosTemp -= ptsVant;
    pontosTemp -= ptsDesv;
    pontosTemp -= ptsPeri;

    //Focus
    focusTemp -= agua;
    focusTemp -= ar;
    focusTemp -= fogo;
    focusTemp -= luz;
    focusTemp -= terra;
    focusTemp -= trevas;

    //limite de pontos atingidos
    if(pontosTemp < 0)
    {  
        alert("Limite de pontos ultrapassado em " + Math.abs(pontosTemp) + " ponto(s).");
        pontosTemp = 0;
    }
    //limite de focus atingido
    else if (focusTemp < 0)
    {
        alert("Limite de Focus ultrapassado em " + Math.abs(focusTemp) + " ponto(s).");
    }
    //exibe os pontos restantes
    document.getElementById("pontos").innerText = pontosTemp;
}