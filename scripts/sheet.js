var character = Array;
character['cost'] = Array;

var pointsOK = false;
var focusOK = false;

const MOD_REGEM = 0.1;
const HOST = 'localhost:8000';

var addSelectOptions = function(table){
    $.get( `https://${HOST}/${table}/`, function(data) {
    
    for(var i = 0; i < data.length; i++){
        var cost = '';
        var value =  data[i]['id'];
        var isHidden = '';
        
        switch(table){
            case 'race':
            isHidden = 'Raças';
            cost = data[i]['cost'] + ' - ';
            break;
            case 'class':
            isHidden = 'Classes';
            case 'benefit':
            case 'injury':
            cost = data[i]['cost'] + ' - ';
            break;
            
            case 'knowledge':
            cost = data[i]['difficulty'] + ' - ';
            break;
            
            case 'adventure':
            isHidden = 'Aventuras';
        }
        
        if(isHidden){
            $(`#${table}`).append($(`<option hidden> ${isHidden} </option>`));    
        }
        
        $(`#${table}`).append($('<option>', {
            value: value,
            text: cost + data[i]['name'],
            title: data[i]['description']
        }));
    }});
}

var alterPoints = function(){
    var pts = character['points'];
    
    pts -= character['cost']['race'] ? character['cost']['race'] : 0;
    pts -= character['cost']['class'] ? character['cost']['class'] : 0;
    
    pts -= character['armor'] ? character['armor'] : 0;
    pts -= character['focus'] ? character['focus'] : 0;
    pts -= character['strength'] ? character['strength'] : 0;
    pts -= character['ability'] ? character['ability'] : 0;
    pts -= character['resistance'] ? character['resistance'] : 0;
    pts -= character['accuracy'] ? character['accuracy'] : 0;
 
    pointsOK = !pts ? true : false;

    $('#points').text('Pontos (' + pts + ')');
}

var alterFocus = function(){
    pts = character['focus'];

    pts -= character['water'] ? character['water'] : 0;
    pts -= character['air'] ? character['air'] : 0;
    pts -= character['fire'] ? character['fire'] : 0;
    pts -= character['ligth'] ? character['ligth'] : 0;
    pts -= character['earth'] ? character['earth'] : 0;
    pts -= character['darkness'] ? character['darkness'] : 0;
    
    focusOK = !pts ? true : false;
}

var calcHP = function(){
    character['hp'] = character['level'] * character['resistance'] * character['armor'] * character['modhp'];
    character['hpr'] = Math.trunc(character['hp'] * Math.exp(1) * MOD_REGEM);
    $("#HP").text(character['hp'] ? character['hp'] : 0);
    $("#HPR").text(character['hpr'] ? character['hpr'] : 0);
}
var calcMP = function(){
    character['mp'] = character['level'] * character['resistance'] * character['focus'] * character['modmp'];
    character['mpr'] = Math.trunc(character['mp'] * Math.exp(1) * MOD_REGEM);
    $("#MP").text(character['mp'] ? character['mp'] : 0);
    $("#MPR").text(character['mpr'] ? character['mpr'] : 0);
}
var calcSP = function(){
    character['sp'] = character['level'] * character['resistance'] * character['ability'] * character['modsp'];
    character['spr'] = Math.trunc(character['sp'] * Math.exp(1) * MOD_REGEM);
    $("#SP").text(character['sp'] ? character['sp'] : 0);
    $("#SPR").text(character['spr'] ? character['spr'] : 0);
}

$('document').ready(function(){
    addSelectOptions('race');
    addSelectOptions('class');
    addSelectOptions('adventure');
    addSelectOptions('benefit');
    addSelectOptions('injury');
    addSelectOptions('knowledge');
    addSelectOptions('skill');
    addSelectOptions('magic');
    addSelectOptions('item');
    
    $('#race').change(function(){
        url = `https://${HOST}/race/${this.value}`;
        $.get(url, function(data){
            character['cost']['race'] = data[0]['cost'];
            character['modHP'] = data[0]['modHP'];
            character['modMP'] = data[0]['modMP'];
            character['modSP'] = data[0]['modSP'];
            alterPoints();
        });
    });
    
    $('#class').change(function(){
        url = `https://${HOST}/class/${this.value}`;
        $.get(url, function(data){
            character['cost']['class'] = data[0]['cost'];
            character['modknow'] = data[0]['modknow'];
            alterPoints();
        });
    });
    
    $('#adventure').change(function(){
        url = `https://${HOST}/adventure/${this.value}`;
        $.get(url, function(data){
            character['difficulty'] = data[0]['difficulty'];
            character['level'] = data[0]['level'];
            character['points'] = levelToPoints(character['difficulty'], character['level']);
            $('#level').text('Nivel (' + character['level'] + ')');
            alterPoints();
        });
    });
    
    $('#armor').change(function(){
        character['armor'] = this.value;
        calcHP();
        alterPoints();
    }); 
    
    $('#focus').change(function(){
        character['focus'] = this.value;
        calcMP();
        alterFocus();
        alterPoints();
    });
    
    $('#strength').change(function(){
        character['strength'] = this.value;
        alterPoints();
    });
    
    $('#ability').change(function(){
        character['ability'] = this.value;
        calcSP();
        alterPoints();
    });
    
    $('#resistance').change(function(){
        character['resistance'] = this.value;
        calcHP();
        calcMP();
        calcSP();
        alterPoints();
    });
    
    $('#accuracy').change(function(){
        character['accuracy'] = this.value;
        alterPoints();
    });
    
    $('#water').change(function(){
        character['water'] = this.value;
        alterFocus();
        alterPoints();
    });
    
    $('#air').change(function(){
        character['air'] = this.value;
        alterFocus();
        alterPoints();
    });
    
    $('#fire').change(function(){
        character['fire'] = this.value;
        alterFocus();
        alterPoints();
    });
    
    $('#ligth').change(function(){
        character['ligth'] = this.value;
        alterFocus();
        alterPoints();
    });
    $('#earth').change(function(){
        character['earth'] = this.value;
        alterFocus();
        alterPoints();
    });
    
    $('#darkness').change(function(){
        character['darkness'] = this.value;
        alterFocus();
        alterPoints();
    });
    
    
});
