<?php
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // HTTP/1.1
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache"); // HTTP/1.0


//we get 2 vars: fieldname and content. so you get: $fieldname=$content;
//and we get the vars set in the function setVarsForm(vars). These could be used 
//to identify a user with sending userID=1 
//you also can use $_COOKIE['someID'] in the file.


//THIS UPDATES A DATABASE
//create DB connection


$servername = "brain.it.fit.edu";
$username = "cwille2012";
$password = "Dr6buuDr6buu****";
$dbname = "udb_cwille2012";
$loginStatus = false;
$passwordtext = $_POST['#password'];

// Create connection
console.log("php started");
  
  
function passwordCheck($pssword) {    
  console.log("entered function");
  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 session_start();
  
  
//$sql = "SELECT userid, username, isAdmin FROM users WHERE password=$password";
$sql = "SELECT userid='1', username='admin', isAdmin='1' FROM users WHERE password=$pssword";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        //echo "id: " . $row["userid"]. " - Name: " . $row["username"]. " " . $row["isAdmin"]. "<br>";
      $loginStatus = true;
      echo "loginTrue";
      
     }
}
  
 else 
 {
    echo "0 results";
}
$conn->close();
  
  return $loginStatus;

}
//update from table set $fieldname = $content where userID = $_COOKIE['userID']


//OR

//THIS STARTS A FUNCTION
//if($_GET['fieldname'] == "userName")
//  setUserName($_GET['content']);
//if($_GET['fieldname'] == "userCity")
//  setUserCity($_GET['content']);
//
//

//OR


//THIS WRITES CONTENT TO A TEXT FILE
//$handle = fopen($_GET['fieldname'].".txt", "w+");
//fwrite($handle, stripslashes($_GET['content']));
//fclose($handle);

//$fieldname = $_GET['fieldname'];
//echo stripslashes(strip_tags($_GET['content'],"<br><p><img><a><br><strong><em>"));
?>