<?php
if(isset($_POST["Login"])) {
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LogInSite/login.php");
    exit;
  }
}
if(isset($_POST["Demo"])) {
    header("location: Flappybird.php");
}
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14% sans-serif; text-align: center; }
.button {
    background-color:#f23a43;
    border: none;
    color: white;
    padding: 30px 35px;
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
      padding: 30px 35px;
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
  padding: 50px;
}
.div2{
  padding: 50px;
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
            <button name="Login" class="button"> Enter TheTournement </button>
              <small class="Smalltext"><font color="white">Press this button to fight for the highscore </font></Small>
          </div>
          <div class="div1">
            <button name="Demo" class="button2"> Practice mode </button>
                  <small class="Smalltext2"><font color="white"> Give this button a big slapping to test your skills</font> </Small>
          </div>
  </body>
</html>
