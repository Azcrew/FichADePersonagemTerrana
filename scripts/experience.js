var levelToExp = function(level, difficulty){
    
    base = Math.pow(level, difficulty);
    base = parseInt(base * 10) + parseInt(level * 10);
    
    multBase = parseInt(1) + parseFloat(difficulty / 100);
    multiplier = Math.pow(multBase, level);
    
    expToLevelUp = base * multiplier;
    console.log(expToLevelUp);
    return parseInt(expToLevelUp);
}

