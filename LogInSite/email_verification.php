<?php

include('connectmysql.php');

$message = '';

if(isset($_GET['get_activation_code'])){
    
    $sql = "UPDATE brugere SET email_status = ? WHERE activation_code = ?";

    if($statement = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $statement->bind_param("ss", $param_status, $param_code);
        
        // Set parameters
        $param_status = 'verified';
        $param_code = $_GET['get_activation_code'];
        
        // Attempt to execute the prepared statement
        if($statement->execute()){
            // store result
            $statement->store_result();

            $message = '<label class="text-info">Your Email Adress have been verified!</label>';
        
            if($statement->num_rows == 1){
    
                $message = '<label class="text-info">Your Email Address Already Verified</label>';
                }
                
                } 
            
            else{
                $message = '<label class="text-danger">Invalid Link</label>';
                }
            
            }
        
    
            
        // Close statement
        $statement->close();
}
 
?>
<!DOCTYPE html>
<html>
 <head>
  <title>PHP Register Login Script with Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">PHP Register Login Script with Email Verification</h1>
  
   <h3><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>
