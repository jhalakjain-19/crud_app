<?php
define("HOSTNAME","127.0.0.1:3307");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","crud_operations");

$connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(!$connection){
    
    die("Database connection error".mysqli_connect_error());
}
// else{
//     echo "Database connection success";
// }

?>
