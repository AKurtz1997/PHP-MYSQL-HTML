<?php
session_start(); // Starting Session
require 'sql_helper.php';

if ($_SESSION['user_admin']) {
    if ($_GET[id]) { // user is admin and I have an ID to delete from database
        $sql = "delete from $usersTable where id = ".$_GET[id];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo mysqli_stmt_affected_rows($stmt)." rows were deleted from Users table\n<br>";
            mysqli_stmt_close($stmt);
        }
    
    
    $AvailableCheck = "SELECT available FROM Dorms Where name = '".urldecode($_GET[dormName])."'";
    
    $result = query($AvailableCheck);

    $numRows = mysqli_num_rows($result);

    for ($i=0; $i<$numRows; $i++) { // go through each record one by one
        $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
        $available = $aDorm['available'];   
    }
    
    
    
    $availableSQL = "Update Dorms SET available = ('$available' + 1) WHERE name =   '".urldecode($_GET[dormName])."'";
    
     if($conn -> query($availableSQL) && $conn -> query($AvailableCheck) == TRUE){
        echo "updating users table";   
        echo "<BR>";
        echo "updating dorm available";
        echo "<BR>";
        echo "<a href=admin_main.php>Return to admin main page";
    }
    
    $conn -> close();
    
    
    } else { // user is admin, but I don't have an ID for some reason
        echo "No ID specified, bailing out."; die;
    }
} else {
    header('location:index.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
}


?>