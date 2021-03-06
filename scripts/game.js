var platform_shown = false;
var factory_shown = false;
var powerhouse_shown = false;
var farm_shown = false;

/*
0 - no building , 11 - platform lvl1, 12 - platform lvl2,
21 - factory lvl1, 22 - factory lvl2 ...
 */
var building = 0;
var symbol = '';

//hides all submenus
function switch_menu(){
    if (factory_shown == true) {
        document.getElementById('factory1').style.transform = "translateY(0px)";
        document.getElementById('factory2').style.transform = "rotate(60deg) translateY(0px) rotate(-60deg)";
        factory_shown = false;
    }
    if (platform_shown == true) {
        document.getElementById('platform1').style.transform = "translateY(0px)";
        document.getElementById('platform2').style.transform = "rotate(60deg) translateY(0px) rotate(-60deg)";
        platform_shown = false;
    }
    if (powerhouse_shown == true) {
        document.getElementById('powerhouse1').style.transform = "translateY(0px)";
        document.getElementById('powerhouse2').style.transform = "rotate(60deg) translateY(0px) rotate(-60deg)";
        powerhouse_shown = false;
    }
    if (farm_shown == true) {
        document.getElementById('farm1').style.transform = "translateY(0px)";
        document.getElementById('farm2').style.transform = "rotate(60deg) translateY(0px) rotate(-60deg)";
        farm_shown = false;
    }

}

function switch_factory(){
    if (factory_shown == false){
        document.getElementById('factory1').style.transform = "translateY(-80px)";
        document.getElementById('factory2').style.transform = "rotate(-50deg) translateY(-80px) rotate(50deg)";
        factory_shown = true;
    }
    else {
        document.getElementById('factory1').style.transform = "translateY(0px)";
        document.getElementById('factory2').style.transform = "translateY(0px)";
        factory_shown = false;
    }
}

function switch_platform(){
    if (platform_shown == false){
        document.getElementById('platform1').style.transform = "rotate(-100deg) translateY(-80px) rotate(100deg)";
        document.getElementById('platform2').style.transform = "rotate(-40deg) translateY(-80px) rotate(40deg)";
        platform_shown = true;
    }
    else {
        document.getElementById('platform1').style.transform = "translateY(0px)";
        document.getElementById('platform2').style.transform = "translateY(0px)";
        platform_shown = false;
    }
}

function switch_powerhouse(){
    if (powerhouse_shown == false){
        document.getElementById('powerhouse1').style.transform = "translateY(-80px)";
        document.getElementById('powerhouse2').style.transform = "rotate(50deg) translateY(-80px) rotate(-50deg)";
        powerhouse_shown = true;
    }
    else {
        document.getElementById('powerhouse1').style.transform = "translateY(0px)";
        document.getElementById('powerhouse2').style.transform = "translateY(0px)";
        powerhouse_shown = false;
    }
}
function switch_farm(){
    if (farm_shown == false){
        document.getElementById('farm1').style.transform = "rotate(100deg) translateY(-80px) rotate(-100deg)";
        document.getElementById('farm2').style.transform = "rotate(40deg) translateY(-80px) rotate(-40deg)";
        farm_shown = true;
    }
    else {
        document.getElementById('farm1').style.transform = "translateY(0px)";
        document.getElementById('farm2').style.transform = "translateY(0px)";
        farm_shown = false;
    }
}

function build_platform1(){
    building = 11;
    symbol = '<i class="fas fa-vector-square symbol"></i>';
}
function build_platform2(){
    building = 11;
    symbol = '<i class="fas fa-vector-square symbol"></i>';
}
function build_factory1(){
    building = 21;
    symbol = '<i class="fas fa-tools symbol"></i>';
}
function build_factory2(){
    building = 22;
    symbol = '<i class="fas fa-tools symbol"></i>';
}
function build_powerhuse1(){
    building = 31;
    symbol = '<i class="fas fa-bolt symbol"></i>';
}
function build_powerhouse2(){
    building = 32;
    symbol = '<i class="fas fa-bolt symbol"></i>';
}
function build_farm1(){
    building = 41;
    symbol = '<i class="fas fa-apple-alt symbol"></i>';
}
function build_farm2(){
    building = 42;
    symbol = '<i class="fas fa-apple-alt symbol"></i>';
}

function build(where_to_build){
    if (building) {
        console.log(building);
        document.getElementById('field' + where_to_build).innerHTML = '<i class="fas fa-spinner fa-spin symbol"></i>' + symbol;

        var mysql      = require(['mysql']);
        var connection = mysql.createConnection({
            host     : 'localhost',
            user     : 'root',
            password : '',
            database : 'mygame'
        });

        connection.connect(function(err) {
            if (err) throw err;
            console.log("Connected!");
        });

        connection.query('SELECT 1 + 1 AS solution', function (error, results, fields) {
            if (error) throw error;
            console.log('The solution is: ', results[0].solution);
        });

        connection.end();
    }

}