function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}

window.onload = function() {
    for (let i=0;i<30;i++){
        document.getElementById('comet').innerHTML += '<div class="comet" id="comet'+i+'"></div>';
    }
};
function move_mouse(event) {
    document.body.style.background = 'radial-gradient(circle at ' + event.clientX + 'px ' + event.clientY + 'px, #1B2735 0%, #090A0F 100%)';

    for (let i=0;i<30;i++){
        let x = getOffset( document.getElementById('comet0') ).left;
        let y = getOffset( document.getElementById('comet0') ).top;
        if (event.clientX + 200 >= x){
            document.getElementById('comet'+i).style.color = 'red';
        }
    }
}
document.addEventListener("mousemove", move_mouse);
