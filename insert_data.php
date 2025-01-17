<?php
include "dbcon.php";
if(isset($_POST['add_students']))
//check if button is set/pressed or not
{
//echo"added";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];

if($fname == "" || empty($fname) ){
header("location:index.php?message=Please enter your first name");
}
else{
  $query="INSERT INTO `students`(`first_name`,`last_name`,`age`) VALUES('$fname','$lname','$age')";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_connect_error());
  }
  else{
    header("location:index.php?insert_msg=Data added successfully");
    
}
}
}
?>