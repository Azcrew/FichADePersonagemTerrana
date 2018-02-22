/*
*##TODO Alterar multiplas variaveis para um unico array character !! prd-1
*##COMMIT traduzir nome de variaveis para ingles!!! prd-5
*##COMMIT Adicionar ps prd-1
*## Just coment in inglesh prd-x v2
*/

var raceCost = 0;
var classCost = 0;

var hp = 0;
var hpr = 0;
var modhp = 0;
var modKnow = 0;

var mp = 0;
var mpr = 0;
var modmp = 0;

var sp = 0;
var spr = 0;
var modsp = 0;

var level = 0;
var points = 0;
var knowledge = 0;

var armor = 0;
var focus = 0;
var strength = 0;
var ability = 0;
var accuracy = 0;
var resistance = 0;

var water = 0;
var air = 0;
var fire = 0;
var ligth = 0;
var earth = 0;
var darkness = 0;

var modClas = {};
var ptsBene = 0;
var modBene = {};
var ptsInju = 0;
var modInju = {};
var ptsKnow = 0;

const file = "../php/api.php";
const euler = 0.2718 / 10;

//requisita dados ao banco
function dbRequest(url, func) {
	var req = new XMLHttpRequest();
	req.onreadystatechange = alterPoints(); 
	req.open("GET", url);
	req.send();
	
	return req.response;
}

//requisita as informações necessarias ao site e altera seus valores referentes
function selectRace(id) {
	var url = file + "?table=race&id=" + id + "&field=";
	raceCost = dbRequest(url + "cost");
	modhp = dbRequest(url + "modhp", alterDetails);
	modmp = dbRequest(url + "modmp");
	modsp = dbRequest(url + "modsp");
	
	alterPoints();
	alterDetails();
}

function selectClass(id) {
	var url = file + "?table=class&id=" + id + "&field=";
	classCost = dbRequest(url + "cost");
	modKnow = dbRequest(url + "modKnow");
	modClas = dbRequest(url + "modifier");
	alterPoints();
}

//requisita as informações necessarias ao site e altera seus valores referentes 
function selectAdventure(id) {
	var url = file + "?table=adventure&id=" + id + "&field=";
	level = dbRequest(url + "level");
	dificult = dbRequest(url + "dificult");
	points = dificult * level;
	document.getElementById("level").innerText = "Nivel - " + level;
	document.getElementById('levelHidden').value = level;
	alterPoints();
	alterDetails();
}

//função necessaria por definir e verificar os pontos usados em caracteristicas e focus
function changeCar() {
	//adquire os valores definidos pelo usuario para as caracteristicas e focus
	//se o valor for negativo define ele como 0
	armor = document.getElementById("armor").value;
	armor = armor >= 0 ? armor : 0;
	
	focus = document.getElementById("focus").value;
	focus = focus >= 0 ? focus : 0;
	
	strength = document.getElementById("strength").value;
	strength = strength >= 0 ? strength : 0;
	
	ability = document.getElementById("ability").value;
	ability = ability >= 0 ? ability : 0;
	
	accuracy = document.getElementById("accuracy").value;
	accuracy = accuracy >= 0 ? accuracy : 0;
	
	resistance = document.getElementById("resistance").value;
	resistance = resistance >= 0 ? resistance : 0;
	
	water = document.getElementById("water").value;
	water = water >= 0 ? water : 0;
	
	air = document.getElementById("air").value;
	air = air >= 0 ? air : 0;
	
	fire = document.getElementById("fire").value;
	fire = fire >= 0 ? fire : 0;
	
	ligth = document.getElementById("ligth").value;
	ligth = ligth >= 0 ? ligth : 0;
	
	earth = document.getElementById("earth").value;
	earth = earth >= 0 ? earth : 0;
	
	darkness = document.getElementById("darkness").value;
	darkness = darkness >= 0 ? darkness : 0;
	
	//chama as funções de alteração da interface
	alterDetails();
	alterPoints();
}

//função responsavel por definir os detalhes do personagem
var alterDetails = function() {
	//define os pontos de vida e de magia, e suas regenerações
	hp = level * resistance * armor * modhp;
	hpr = Math.trunc(hp * euler);
	mp = level * resistance * focus * modmp;
	mpr = Math.trunc(mp * euler);
	sp = level * resistance * ability * modsp;
	spr = Math.trunc(sp * euler);
	
	knowledge = ability * modKnow;
	
	//exibe os detalhes
	document.getElementById("HP").innerText = hp;
	document.getElementById("HPR").innerText = hpr;
	document.getElementById("MP").innerText = mp;
	document.getElementById("MPR").innerText = mpr;
	document.getElementById("SP").innerText = sp;
	document.getElementById("SPR").innerText = spr;
}

//responsavel por verificar e exibir os pontos de personagem
function alterPoints() {
	//usado para nao alterar os valores originais
	var pointsTemp = points;
	var focusTemp = focus;
	var knowledgeTemp = knowledge;
	
	//Raca e Classe
	pointsTemp -= raceCost;
	pointsTemp -= classCost;

	//Caracteristicas
	pointsTemp -= armor;
	pointsTemp -= focus;
	pointsTemp -= strength;
	pointsTemp -= ability;
	pointsTemp -= resistance;
	pointsTemp -= accuracy;
	
	//vantagens e Desvantagens
	pointsTemp -= ptsBene;
	pointsTemp -= ptsInju; //negativo ou zero
	
	//Focus
	focusTemp -= water;
	focusTemp -= air;
	focusTemp -= fire;
	focusTemp -= ligth;
	focusTemp -= earth;
	focusTemp -= darkness;
	
	//pericias
	knowledgeTemp -= ptsKnow;
	
	//limite de points atingidos
	if (pointsTemp != 0) {
		//alert("Limite de pontos ultrapassado em " + Math.abs(pointsTemp) + " ponto(s).");
	}
	//limite de focus atingido
	else if (focusTemp != 0) {
		//alert("Limite de Focus ultrapassado em " + Math.abs(focusTemp) + " ponto(s).");
	}
	else if(knowledgeTemp < 0)
	{
		//alert("Limite de Pontos de Perícias ultrapassado em " + Math.abs(knowledgeTemp) + " ponto(s)");
	}

	//exibe os pontos restantes
	document.getElementById("points").innerText = "Pontos - " + pointsTemp;
}

window.onload = function () {   //TODO Mudar tudo para este metodo, simplifica o html e da mais liberdade (Apenas na segunda versão)
	
	var benefit = document.getElementById("benefit");
	var injury = document.getElementById("injury");
	var knowledge = document.getElementById("knowledge");
	
	benefit.addEventListener("change", function () {
		var idBene = [].slice.call(benefit.selectedOptions).map(a => a.value);
		var temp = 0;
		
		for (var i = 0; i < idBene.length; i++) {
			var url = file + "?table=benefit&id=" + idBene[i] + "&field=";
			
			temp += parseInt(dbRequest(url + "cost"));
			modBene[i] = dbRequest(url + "modifier");
		}
		ptsBene = temp;
		alterPoints();
	});
	
	injury.addEventListener("change", function () {
		var idInju = [].slice.call(injury.selectedOptions).map(a => a.value);
		var temp = 0;
		
		for (var i = 0; i < idInju.length; i++) {
			var url = file + "?table=injury&id=" + idInju[i] + "&field=";
			
			temp -= parseInt(dbRequest(url + "cost"));
			modInju[i] = dbRequest(url + "modifier");
		}
		ptsInju = temp;
		alterPoints();
	});
	
	knowledge.addEventListener("change", function () {
		var idKnow = [].slice.call(knowledge.selectedOptions).map(a => a.value);
		var temp = 0;
		
		for (var i = 0; i < idKnow.length; i++) {
			var url = file + "?table=knowledge&id=" + idKnow[i] + "&field=";
			
			temp += parseInt(dbRequest(url + "cost"));
		}
		ptsKnow = temp;
		alterPoints();
	});
}