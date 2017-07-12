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
  if(empty($_POST['formMajor'])) 
  {
    $errorMessage .= "<li>Please enter your major. </li>";
  }
  if(empty($_POST['formYear'])) 
  {
    $errorMessage .= "<li>Please enter your graduation year. </li>";
  }
 
  $varName = $_POST['formName'];
  $varEmail = $_POST['formEmail'];
  $varMajor = $_POST['formMajor'];
  $varYear = $_POST['formYear'];
 
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
  $fs = fopen("../data/prospective-student-data.csv","a");
  fwrite($fs,$date . ", " .$varName . ", " . $varEmail . ", " . $varMajor . ", " . $varYear . "\n");
  fclose($fs);
 
  header("Location: ../success.html");

  exit;
}


?> 