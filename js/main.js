function writeMessage(canvas, mousePos) {
        document.getElementById('x').innerHTML=mousePos.x;
        document.getElementById('y').innerHTML=mousePos.y;
}
var dragging=false;
var canvas = document.getElementById('whiteboard');
var context = canvas.getContext('2d');
radius=5;
context.lineWidth=radius*2;
function putPoint(canvas,mousePos){
    mousePos.x-=20;
    mousePos.y-=20;
    if(dragging){
        context.lineCap='round';
        context.lineTo(mousePos.x,mousePos.y);
        context.stroke();
        context.beginPath();
        context.arc(mousePos.x,mousePos.y,radius,0,Math.PI*2);
        context.fill();
        context.beginPath();
        context.moveTo(mousePos.x,mousePos.y);
    }
}


function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
          x: evt.clientX - rect.left,
          y: evt.clientY - rect.top
        };
}


canvas.addEventListener('mousemove', function(evt) {
        var mousePos = getMousePos(canvas, evt);
        writeMessage(canvas, mousePos);
}, false);

canvas.addEventListener('mousemove',function(evt){
        var mousePos = getMousePos(canvas,evt);
        putPoint(canvas,mousePos);
},false);

var start = function(){
    dragging=true;   
}

var stop = function(){
    dragging=false;
    context.beginPath();
}
canvas.addEventListener('mousedown',start);
canvas.addEventListener('mouseup',stop);
canvas.addEventListener('mouseout',stop);
    

