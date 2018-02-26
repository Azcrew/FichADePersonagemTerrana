var character;

var addSelectOptions = function(table){
    $.get( `https://localhost:8000/${table}/`, function(data) {
    
    
    for(var i = 0; i < data.length; i++){
        var value;
        var isHidden = '';
        switch(table){
            case 'race':
            isHidden = 'Raças';
            value = data[i]['cost'] + ' - ';
            break
            case 'class':
            isHidden = 'Classes';
            case 'benefit':
            case 'injury':
            value = data[i]['cost'] + ' - ';
            break;
            
            case 'knowledge':
            value = data[i]['dificult'] + ' - ';
            break;
            
            case 'adventure':
            isHidden = 'Aventuras';
            case 'skill':
            case 'magic':
            case 'item':
            value = '';
        }
        
        if(isHidden){
            $(`#${table}`).append($(`<option hidden> ${isHidden} </option>`));    
        }
        
        $(`#${table}`).append($('<option>', {
            value: i,
            text: value + data[i]['name'],
            title: data[i]['description']
        }));
    }});
}

$(document).ready(function(){
    addSelectOptions('race');
    addSelectOptions('class');
    addSelectOptions('adventure');
    addSelectOptions('benefit');
    addSelectOptions('injury');
    addSelectOptions('knowledge');
    addSelectOptions('skill');
    addSelectOptions('magic');
    addSelectOptions('item');
     
    $('#armor').click(function(){
        character['armor'] = this.value;
        character['hp'] = character['level'] * character['resistance'] * character['armor'] * character['modhp'];
        character['hpr'] = Math.trunc(character[hp] * Math.exp(1));
        
    });
    
});

var alterDetails = function() {
	//define os pontos de vida e de magia, e suas regenerações
	character[mp] = character['level'] * character['resistance'] * character['focus'] * character['modmp'];
	character[mpr] = Math.trunc(mp * Math.exp(1));
	character[sp] = character['level'] * character['resistance'] * character['ability] * ['modsp'];
	character[spr] = Math.trunc(['sp'] * Math.exp(1));
	
	knowledge = ability * modKnow;
	
	//exibe os detalhes
	$("#HP").innerText = character[hp];
	$("#HPR").innerText = character[hpr];
	$("#MP").innerText = character[mp];
	$("#MPR").innerText = character[mpr];
	$("#SP").innerText = character[sp];
	$("#SPR").innerText = character[spr];
}