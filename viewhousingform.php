<!DOCTYPE html>
<html>
<body>
    <h1>Results</h1>
    First Name: <?php session_start(); echo $_SESSION['user_firstname']; ?> <br>
    Last Name: <?php echo $_SESSION['user_lastname']; ?> <br>
    Dorm: <?php echo $_SESSION['user_dorm']; ?> <br>
    CWID: <?php session_start(); echo $_SESSION['user_cwid']; ?> <br>
<?php
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
echo "<a href=confirmation.php>Delete Current Housing Reservation</a>";
?>

