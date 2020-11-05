window.onload = function() {
    for (let i=0;i<30;i++){
        document.getElementById('comet').innerHTML += '<div class="comet" id="comet'+i+'"></div>';
    }
};

function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

var logoY = getOffset(document.getElementById("logo")).top + 27;


function move_mouse(event) {
    document.body.style.background = 'radial-gradient(circle at ' + event.clientX + 'px ' + event.clientY + 'px, #1B2735 0%, #090A0F 100%)';
    let x = event.clientX;
    let y = event.clientY;
    if (x >= window.innerWidth/2-300 && y >= window.innerHeight/2-200 &&
        x <= window.innerWidth/2+300 && y <= window.innerHeight/2+200){
        for (let i=0;i<30;i++){
            document.getElementById('comet'+i).style.color = 'yellow';
        }
    }
    else {
        for (let i=0;i<30;i++){
            document.getElementById('comet'+i).style.color = 'pink';
        }
    }

    let xmove = (event.clientX)/(window.innerWidth)*40-20
    let ymove = (event.clientY)/(window.innerHeight)*40-logoY/window.innerHeight*40
    document.getElementById('logo').style.textShadow = -xmove + 'px ' + -ymove +  'px 10px black';

}
document.addEventListener("mousemove", move_mouse);
