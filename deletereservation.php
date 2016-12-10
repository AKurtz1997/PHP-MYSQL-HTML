<?php
session_start();
require 'sql.php';

$dormName = $_SESSION['user_dorm'];

$username = $_SESSION['user_username'];

$password = $_SESSION['user_password'];

$cwid = $_SESSION['user_cwid'];

$AvailableCheck = "SELECT available FROM Dorms Where name = '$dormName';"; 

$result = query($AvailableCheck);

$numRows = mysqli_num_rows($result);

for ($i=0; $i<$numRows; $i++) { // go through each record one by one
    $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
    $available = $aDorm['available'];
}


$UpdateReservartionsTableSQL = "delete from Reservations where cwid = '$cwid'"; //this should delete the row from the reservation table once the user deletes their resrvation
 if ($stmt = mysqli_prepare($conn, $UpdateReservationsTableSQL)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo mysqli_stmt_affected_rows($stmt)." rows were deleted from resrvation table\n<br>";
            mysqli_stmt_close($stmt);
        }


$UpdateavailableSQL = "Update Dorms SET available = ('$available' + 1) WHERE name = '$dormName'";

$deleteResevationSQL = "Update users SET userDorm = null WHERE username = '$username' AND password = password('$password')";


echo $second;

echo $third;


if($conn -> query($deleteResevationSQL) && $conn -> query($UpdateavailableSQL) && $conn -> query($UpdateReservartionsTableSQL) == TRUE){
    echo "Your reservation is now deleted";
    echo "<a href= logout.php> Logout so your profile can be updated</a> <br>";
} else {
    echo "Error: " .$UpdateReservartionsTableSQL . "<br>" . $conn -> error;
}


$conn -> close();



?>