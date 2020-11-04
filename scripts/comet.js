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

function move_mouse(event) {
    document.body.style.background = 'radial-gradient(circle at ' + event.clientX + 'px ' + event.clientY + 'px, #1B2735 0%, #090A0F 100%)';
    let x = event.clientX;
    let y = event.clientY;
    let logoX = getOffset(document.getElementById(""));
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



}
document.addEventListener("mousemove", move_mouse);
