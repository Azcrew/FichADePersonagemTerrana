const POINTS_MOD = 1.8;
var levelToExp = function(level, difficulty){
    
    base = Math.pow(level, difficulty);
    base = parseInt(base * 10) + parseInt(level * 10);
    
    multBase = parseInt(1) + parseFloat(difficulty / 100);
    multiplier = Math.pow(multBase, level);
    
    expToLevelUp = base * multiplier;
    return parseInt(expToLevelUp);
}

var expToLevel = function(exp, difficulty){
    var level;
    var _exp;
    for (let i = 0; exp >= _exp; i++) {
        _exp = levelToExp(i, difficulty);
        level = i;
    }
    return level;
}

var levelToPoints = function(level, difficulty){
    var exp = levelToExp(level, difficulty);
    var points = Math.pow(exp, POINTS_MOD/level);
    return parseInt(points);
}

var pointsToLevel = function(points){
    var exp = levelToExp();
    return level;
}

var combatLevelToPoints = function(level, difficulty){
    
    return points;
}

var pointsToCombatLevel = function(points){
    
    return combatLevel;
}



