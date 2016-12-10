<?php
session_start();
require 'sql_helper.php';
echo "Welcome ".$_SESSION['login_user'].", it's nice to have you here!\n<br>";
//echo "<a href=time.php>Do you want to know what time it is in UNIX lingo?</a>\n";

if ($_SESSION['user_dorm'] == null){
    echo "<a href= housingform.php> New Housing Form </a>"; 
    echo "<BR>";
} else {
    echo "<a href=viewhousingform.php>View Current Housing Reciept</a>";
    echo "<BR>";
}
echo "<a href=logout.php>Logout</a>\n";
?>