<?php
  
  //phpinfo();
  
$servername = "brain.it.fit.edu";
$username = "cwille2012";
$password = "Dr6buuDr6buu****";
$dbname = "udb_cwille2012";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else 
{
  echo "Success <br>";
}

  
  
  ?>
    
   