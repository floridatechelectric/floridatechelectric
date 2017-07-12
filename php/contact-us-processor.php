<?php

  date_default_timezone_set('America/New_York');
  $date = date('m-d-Y, g:i a');
 
if($_POST['formSubmit'] == "Submit") 
{
  $errorMessage = "";
 
  if(empty($_POST['formName'])) 
  {
    $errorMessage .= "<li>Please enter your name. </li>";
  }
  if(empty($_POST['formEmail'])) 
  {
    $errorMessage .= "<li>Please enter your email address. </li>";
  }
 
  $varName = $_POST['formName'];
  $varEmail = $_POST['formEmail'];
  $varAbout = $_POST['formAbout'];
 
  if(!empty($errorMessage)) 
  {
    echo("<p>Error:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
 
}


if($errorMessage != "") 
{
  echo("<p>There was an error:</p>\n");
  echo("<ul>" . $errorMessage . "</ul>\n");
} 
else
{
  $fs = fopen("../data/contact-us-data.csv","a");
  fwrite($fs,$date . ", " .$varName . ", " . $varEmail . ", " . $varAbout . "\n");
  fclose($fs);
 
  header("Location: ../success.html");

  exit;
}


?> 