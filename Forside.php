<?php
if(isset($_POST["create"])) {
    header("location: CreateRoom.php");
}
if(isset($_POST["join"])) {
    header("location: JoinRoom.php");
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
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 30px 35px;
    text-align: center;
    font-size: 26px;
    box-shadow: 4px 4px 2px #444;
    cursor: pointer;
  }
.button:hover {
  background-color: green;
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
    </style>
</head>
  <body>
<form method="POST">
  <div class="page-header">
      <h1>Hi  <b>The Ultimate Internet Game!!</b>.</h1>
  </div>
          <div class= "div2">
            <button name="join" class="button"> Enter TheTournement </button>
              <small class="Smalltext"> Press this button to fight for the highscore </Small>
          </div>
          <div class="div1">
            <button name="create" class="button2"> Practice mode </button>
                  <small class="Smalltext2"> Give this button a big slapping to test your skills </Small>
          </div>
  </body>
</html>
