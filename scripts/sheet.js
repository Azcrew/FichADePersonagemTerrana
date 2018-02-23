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
    
});