<?php

if(isset($_POST["FlappyFugl"])) {
    header("location: FlappybirdWITHLOGIN.php");
}

if(isset($_POST["TankTrouble"])) {
    header("location: TankTroubleWITHLOGIN.php");
}

if(isset($_POST["Back"])) {
    header("location: http://localhost/MultiplayerNetSpil/Forside.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Tournament</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14% sans-serif; text-align: center; }
.button {
    background-color:#f23a43;
    border: none;
    color: white;
    text-align: center;
    font-size: 26px;
    box-shadow: 4px 4px 2px #444;
    cursor: pointer;
  }
.button:hover {
  box-shadow: 2px 2px 1px #444;
}
.Smalltext{
display: block;
font-size: 26px;
}
.button2 {
      background-color: #f23a43;
      border: none;
      color: white;
      text-align: center;
      font-size: 26px;
      cursor: pointer;
      box-shadow: 4px 4px 5px #444;
      border-spacing: 5px;
    }
.button2:hover {
  box-shadow: 2px 2px 1px #444;
}
.Smalltext2{
display: block;
font-size: 26px;
}
.div1{
  padding: 20px;
}
.div2{
  padding: 20px;
}

img {
  width: 100%;
}
    </style>
</head>
  <body>
<form method="POST">
  <div class="page-header">
      <h1> <b><font color="white">Welcome The Ultimate Internet Game!!</font></b>.</h1>
      <h2>  <b><font color="white">Here you can test your skills and show how worthy you are</font></b>.</h1>
  </div>

  <style>
body {
  background-image: url('EPIC.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>


          <div class= "div2">
            <button style="height:80px; width:200px; bottom:100%;" name="FlappyFugl" class="button"> FlappyFugl </button>
              <small class="Smalltext"><font color="white"> Press this button to test your skill </font></Small>
          </div>
          <div class="div1">
            <button style="height:80px; width:200px; bottom:20%;" name="TankTrouble" class="button2"> TankTrouble </button>
                  <small class="Smalltext2"><font color="white"> Press this button to test your skill </font> </Small>
          </div>
          <div class= "div2">
            <button style="height:80px; width:200px; bottom:20%;" name="Back" class="button"> Back </button>
          </div>
  </body>
</html>
