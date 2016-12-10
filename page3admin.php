<!DOCTYPE html>
<html>
<body>
    <h1>Results</h1>
    First Name: <?php session_start(); echo $_SESSION['user_firstname']; ?> <br>
    Last Name: <?php echo $_SESSION['user_lastname']; ?> <br>
    Dorm: <?php echo $_POST['dorm']; ?> <br>
    CWID: <?php session_start(); echo $_SESSION['user_cwid']; ?> <br>
<?php
require 'sql.php';
$_SESSION['user_dorm'] = $_POST['dorm'];
$checkKitchen = $_SESSION['user_kitchen'];
$checkLaundry = $_SESSION['user_laundry'];
$checkSpecialNeeds = $_SESSION['user_specialneeds'];
?>
Laundry: <?php 
    if ($checkLaundry == 1){
	    echo "Yes";
        } else {
	    echo "No";
    }
?> <br>
Special Needs: <?php 
    if ($checkSpecialNeeds == 1){
	    echo "Yes";
        } else {
	    echo "No";  
    }
?> <br>
Kitchen: <?php
    if ($checkKitchen == 1){
	    echo "Yes";
        } else {
	    echo "No";
    }
?> <br>        

</body>
</html>
<?php
/*Function to create the reservationID*/
function randomKey($length) {
    $pool = array_merge(range(0,9), range('A', 'Z'));

    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}


$confirmationID = randomKey(6);

$dormName = $_POST['dorm'];

$sql = "SELECT id FROM Dorms Where name = '$dormName';"; 

$result = query($sql);

$numRows = mysqli_num_rows($result); 

for ($i=0; $i<$numRows; $i++) { // go through each record one by one
    $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
    $dormID = $aDorm['id'];
}

$AvailableCheck = "SELECT available FROM Dorms Where name = '$dormName';"; 

$result = query($AvailableCheck);

$numRows = mysqli_num_rows($result);

for ($i=0; $i<$numRows; $i++) { // go through each record one by one
    $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
    $available = $aDorm['available'];
}

    $username = $_SESSION['user_username'];
    $password = $_SESSION['user_password'];
    $firstName = $_SESSION['user_firstname'];
    $lastName = $_SESSION['user_lastname'];
    $class = $_SESSION['user_class'];
    $gender = $_SESSION['user_gender'];
    $kitchen = $_SESSION['user_kitchen'];
    $laundry = $_SESSION['user_laundry'];
    $specialNeeds =  $_SESSION['user_specialneeds'];
    $cwid = $_SESSION['user_cwid'];
    $userDorm = $_SESSION['user_dorm'];

// createReservationRecord($reservationsTable, ["RXB103", $_POST[RA_ID], $_POST[firstname]." 
//".$_POST[lastname], $_POST[class], $_POST[gender]])

$reservationSQL = "INSERT INTO $reservationsTable(ConfirmationID, DormID, firstName, lastName, class, gender, cwid,
kitchen, laundry, specialNeeds)
VALUES('$confirmationID', '$dormID', '$firstName', '$lastName', '$class', '$gender', '$cwid', '$kitchen', '$laundry', '$specialNeeds')";


$userUpdateSQL = "update $usersTable set userDorm = '$userDorm' WHERE username = '$username' AND password = password('$password')";

// get curretn available for the dorm as a variable$available using a result set and a quick sql query
// set $available--;

$availableSQL = "Update Dorms SET available = ('$available' - 1) WHERE name = '$dormName';";

if($conn -> query($reservationSQL) && $conn -> query($availableSQL) && $conn -> query($userUpdateSQL) == TRUE){
    echo "<br>";
    echo "Reservation Number: $confirmationID <br>";
    echo "Your reservation has been saved <br>";
    echo "<a href= admin_main.php> Return to the admin page </a> <br>";
    echo "<a href=logout.php>Logout</a>\n";
}

$conn -> close();


?>