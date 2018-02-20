var levelToExp = function(level, difficulty){

    base = Math.pow(level, difficulty);
    base = parseInt(base * 10) + parseInt(level * 10);
    console.log("Base = " + base);

    multBase = parseInt(1) + parseFloat(difficulty / 100);
    multiplier = Math.pow(multBase, level);
    console.log("Multiplier = " + multiplier);

    expToLevelUp = base * multiplier;

    return parseInt(expToLevelUp);
}

