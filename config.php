<?php
$username = "mpingiad";
$password = "Mpingi@123";
$hostname = ""; 
$db_name="mpingiad_market";

//connection to the database
$con=mysqli_connect($hostname, $username, $password, $db_name);
                    /* check connection */
                    if (mysqli_connect_error())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  exit();
                      }  
					 // Change character set to utf8
mysqli_set_charset($con,"utf8");
    
 //magic quotes logic
if (get_magic_quotes_gpc())
{
function stripslashes_deep($value)
{
    $value = is_array($value) ?
    array_map('stripslashes_deep', $value) :
    stripslashes($value);
    return $value;
}
$_POST = array_map('stripslashes_deep', $_POST);
$_GET = array_map('stripslashes_deep', $_GET);
$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}

?>
