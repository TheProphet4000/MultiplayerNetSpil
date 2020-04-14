<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<body onload="startGame()">
<script>
//variabler
var Spiller;
var Xmidt = 960/2;
var Ymidt = 540/2;
var TankSpeed = 3;
var RotationSpeed = 2;
var TankSize = 4;

//opsætning
function startGame() {
    Spiller = new component(30, 10, "Tank.png", Xmidt, Ymidt, "image");
    myGameArea.start();
}
//Canvas
var myGameArea = {
    canvas : document.createElement("canvas"), start : function() {
        this.canvas.width = 960;
        this.canvas.height = 540;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.interval = setInterval(updateGameArea, 20);

        window.addEventListener('keydown', function (e) {
            myGameArea.keys = (myGameArea.keys || []);
            myGameArea.keys[e.keyCode] = (e.type == "keydown");
        })
        window.addEventListener('keyup', function (e) {
            myGameArea.keys[e.keyCode] = (e.type == "keydown");
        })
    },
    clear : function(){
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}
//Spiller Spawn
function component(width, height, color, x, y) {
    this.gamearea = myGameArea;
    this.image = new Image();
    this.image.src = color;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.angle = 0;
    this.x = x;
    this.y = y;
    this.update = function() {
      ctx = myGameArea.context;
      ctx.drawImage(this.image, this.x, this.y, this.width * TankSize, this.height * TankSize *3);
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.rotate(this.angle);
      ctx.fillStyle = color;
      ctx.fillRect(this.width / -2, this.height / -2, this.width, this.height);
      ctx.restore();
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;
    }
}
//Controls
function updateGameArea() {
    myGameArea.clear();
    Spiller.speedX = 0;
    Spiller.speedY = 0;
    //V
    if (myGameArea.keys && myGameArea.keys[37]) {Spiller.angle -= RotationSpeed*Math.PI / 180;}
    //Ø
    if (myGameArea.keys && myGameArea.keys[39]) {Spiller.angle += RotationSpeed*Math.PI / 180;}
    //N
    if (myGameArea.keys && myGameArea.keys[38]) {Spiller.speedY = -TankSpeed; }
    //S
    if (myGameArea.keys && myGameArea.keys[40]) {Spiller.speedY = TankSpeed; }
    Spiller.newPos();
    Spiller.update();
}
</script>
</body>
