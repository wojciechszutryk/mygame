var platform_shown = false
var factory_shown = false
var powerhouse_shown = false
var farm_shown = false

/*
0 - no building , 11 - platform lvl1, 12 - platform lvl2,
21 - factory lvl1, 22 - factory lvl2 ...
 */
var building = 0

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
    console.log(building);
}
function build_platform2(){
    building = 11;
}
function build_factory1(){
    building = 21;
}
function build_factory2(){
    building = 22;
}
function build_powerhuse1(){
    building = 31;
}
function build_powerhouse2(){
    building = 32;
}
function build_farm1(){
    building = 41;
}
function build_farm2(){
    building = 42;
}

function build(where_to_build){
    if (building){
        console.log(building);
        document.getElementById('field'+where_to_build).innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        document.getElementById('field'+where_to_build).innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    }
}