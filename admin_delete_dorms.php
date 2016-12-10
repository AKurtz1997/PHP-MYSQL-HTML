<?php
session_start(); // Starting Session
require 'sql_helper.php';

if ($_SESSION['user_admin']) {
    if ($_GET[id]) { // user is admin and I have an ID to delete from database
        $sql = "delete from $dormTable where id = ".$_GET[id];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo mysqli_stmt_affected_rows($stmt)." rows were deleted from Users table\n<br>";
            mysqli_stmt_close($stmt);
        }
        
        $userDormUpdateSQL = "Update users SET userDorm = null WHERE userDorm = '".urldecode($_GET[dormName])."'";
        
        
     if($conn -> query($userDormUpdateSQL) == TRUE){
        echo "updating users table";   
        echo "<BR>";
        echo "<a href=admin_main.php>Return to admin main page";
    }
    } else { // user is admin, but I don't have an ID for some reason
        echo "No ID specified, bailing out."; die;
    }
} else {
    header('location:index.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
}


?>