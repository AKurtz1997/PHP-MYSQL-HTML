<?php
session_start(); // Starting Session
require 'sql_helper.php'; // get connection information
if ($_SESSION['login_user']) {
  if ($_SESSION['user_admin']) {?>
  <a href=admin_create_reservation.php>Create a new reservation</a>.
  <table>
    <tr>
      <td>ID</td>
      <td>ConfirmationID</td>
      <td>DormID</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Class</td>
      <td>Gender</td>
      <td>CWID</td>
      <td>Kitchen</td>
      <td>Laundry</td>
      <td>Special Needs</td>
      <td>Reservation Time</td>
      <td></td>
    </tr>
<?php
    $sql = "select * from $reservationsTable";
    $result = mysqli_query($conn,$sql);
    while ($aRow = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      //print_r($aRow);
      echo "<td>".$aRow['ID']."</td>";
      echo "<td>".$aRow['ConfirmationID']."</td>";
      echo "<td>".$aRow['DormID']."</td>";
      echo "<td>".$aRow['firstName']."</td>";
      echo "<td>".$aRow['lastName']."</td>";
      echo "<td>".$aRow['class']."</td>";
      echo "<td>".$aRow['gender']."</td>";
      echo "<td>".$aRow['cwid']."</td>";
      echo "<td>".$aRow['kitchen']."</td>";
      echo "<td>".$aRow['laundry']."</td>";
      echo "<td>".$aRow['specialNeeds']."</td>";
      echo "<td>".$aRow['reservationTime']."</td>";
      echo "<td><a href=admin_delete_reservation.php?id=".$aRow['ID']. "&dormid=".$aRow['DormID']."&cwid=".$aRow['cwid'].">Delete</a></td>\n";  
      echo "</tr>";
    }
    echo "</table>\n";
  } else {
      header('location:profile.php?message=You%20do%20not%20have%20access%20to%20this%20admin%20page.');
  }
} else { 
    header('location: index.php?message=You%20are%20not%20logged%20in.');
}


?>