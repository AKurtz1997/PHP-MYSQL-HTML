<?php
session_start();
unset($_SESSION['login_user']);
echo "You are logged out.\n";
header ("location: index.php?message=You%20are%20logged%20out.");
?>