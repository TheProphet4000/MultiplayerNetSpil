
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LogInSite/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
    bottom: 100px;
}

</style>
<p id="demo" style="position:fixed; bottom:75%; left:0%" name = "hej"><p>
</head>
<body style="position:fixed; bottom:4%; left:22%";, onload="startGame()">
<input style="position:fixed; bottom:0%; left:0%" type="button" onclick="restart()" value="Reset">

<script>

var myGamePiece;
var myObstacles = [];
var ScoreTimer;
var plusOne = 0;
var minutes = 0;
var ScoreTimer1 = "Time: " + minutes + "m " + plusOne + "s";
var score = minutes * 60 + plusOne;
var hejhej = "hejhejhej";

document.getElementById("demo").innerHTML = hejhej;

function startGame() {
    myGamePiece = new component(30, 30, "red", 10, 120);
    ScoreTimer = new component("30px", "Consolas", "black", 1100, 40, "text");
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1300;
        this.canvas.height = 700;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
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

        
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.gamearea = myGameArea;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }    
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
  var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            myGameArea.stop();
            
            return;
        } 
    }
    
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(100)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 80;
        maxGap = 130;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(30, height, "green", x, 0));
        myObstacles.push(new component(30, x - height - gap, "green", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].x += -8;
        myObstacles[i].update();
    }
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;    
    if (myGameArea.keys && myGameArea.keys[37]) {myGamePiece.speedX = -0; }
    if (myGameArea.keys && myGameArea.keys[39]) {myGamePiece.speedX = 0; }
    if (myGameArea.keys && myGameArea.keys[38]) {myGamePiece.speedY = -8; }
    if (myGameArea.keys && myGameArea.keys[40]) {myGamePiece.speedY = 8; }

    if (plusOne > 59){
        plusOne = plusOne - 60;
        minutes = minutes + 1;
    }
    ScoreTimer.text = "Time: " + minutes + "m " + plusOne + "s";
    ScoreTimer.update();
    myGamePiece.newPos();    
    myGamePiece.update();
    ScoreTimer1.update();

}

function restart() {
    myGameArea.stop();
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].x += -1300; 
        myObstacles[i].update();
    }
    plusOne = 0;
    minutes = 0;
    myGameArea.clear();
    myGameArea.start();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function Timer123() {
    plusOne = plusOne + 1;
}

setInterval(Timer123, 1000);
    
</script>

</body>
</html>
