<?php
session_start();
//print_r($_SESSION);die;
if ($_SESSION['user_admin']) {
    echo "<h1>Administrative Interface</h1>\n";
    echo "Welcome admin user ".$_SESSION['login_user'].", it's nice to have you here!\n<br>";
    echo "<BR>";
    echo "<a href=admin_users.php>Manage Users</a><br>\n";
    echo "<a href=admin_dorms.php>Manage Dorms</a><br>\n";
    echo "<a href=admin_reservations.php>Manage Reservations</a><br>\n";
    //print_r($_SESSION);
    
    echo "<BR>";
} else {
    header("location: index.php");
}

echo "<a href=logout.php>Logout</a>\n";
?>