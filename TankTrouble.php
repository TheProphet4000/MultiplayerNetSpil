
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
<input style="position:fixed; bottom:50px; left:0%; height:80px; width:200px;" type="button" onclick="back()" value="Back" name="back">
<p> The total time you have survived </p>
<p1 id="score"> </p1>

<script>

//skærm/setup variabler
var Spiller;
var Hight = 540 //canvas højde
var Width = 960 //canvas bredte
var Xmidt = Width/2;  // skærmstørrelse/2 for at få midten af canvas
var Ymidt = Hight/2;
var point = 0;

//Tank variabler
var TankSpeed = 3;
var RotationSpeed = 2;
var TankSize = 15;
var BulletSpeed = 4;

//DB
//Forbind.connect(function(err){
//  if(err)throw err;
//  var sql ="internetgame learderboard (Bruger_ID,Kode,Email,Score)values("1","Demo","Demo@mail.com","score")"
//  Forbind.query(sql,function(err,result){
//    if(err)throw err;
//    console.log("1 tilføjet")
//  })
//  })

//opsætning
function startGame() {
    Spiller = new component(10, 10, "Tank.png", Xmidt, Ymidt, "image");
    myGameArea.start();
}
//Canvas
var myGameArea = {
    canvas : document.createElement("canvas"), start : function() {
        this.canvas.width = Width;
        this.canvas.height = Hight;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);

        //Håndtere tid og timer
        this.interval = setInterval(updateGameArea, 20);  //updatere med et enterval på 20 millisekunder
        this.interval = setInterval(givePoint, 1000); //giver point hvert sekund

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
//Spiller Start opsætning
function component(width, height, color, x, y) {
    this.gamearea = myGameArea;
    this.image = new Image();
    this.image.src = color;
    this.width = width;
    this.height = height;
    this.speedY = 0;
    this.angle = 0;
    this.x = x;
    this.y = y;
    this.update = function() {
      ctx = myGameArea.context;

      //tegner tank
      ctx.drawImage(this.image, this.x /1.175, this.y/1.45, this.width * TankSize, this.height * TankSize);
      //kassen
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.rotate(this.angle);
      ctx.fillRect(this.width / -2, this.height / -2, this.width, this.height);
      ctx.restore();
    }
    //bevæger kassen og tank
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;
    }
}
//point system
function givePoint(){
  point = point+1;
  document.getElementById("score").innerHTML = point ; //man får et point
}
function updateGameArea() {
  // sætter aller hastigheder til null, så der ikke er noget der flyder rundt
    myGameArea.clear();
    Spiller.speedX = 0;
    Spiller.speedY = 0;

    //V     Dette Styre både tank og kasse, skal bare have sat billedet til kassen
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

function back() {
  window.history.back();
}

</script>
</body>
