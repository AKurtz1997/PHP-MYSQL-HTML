<?php
session_start(); // Starting Session
require 'sql_helper.php'; // get connection information
if ($_SESSION['login_user']) {
  if ($_SESSION['user_admin']) {?>
  <a href=admin_create_dorm.php>Create a new user dorm</a>.
  <table>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Year</td>
      <td>Capacity</td>
      <td>Avaliable</td>
      <td>Kitchen</td>
      <td>Laundry</td>
      <td>Special Needs</td>
      <td></td>
    </tr>
<?php
    $sql = "select * from $dormTable";
    $result = mysqli_query($conn,$sql);
    while ($aRow = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      //print_r($aRow);
      echo "<td>".$aRow['id']."</td>";
      echo "<td>".$aRow['name']."</td>";
      echo "<td>".$aRow['year']."</td>";
      echo "<td>".$aRow['capacity']."</td>";
      echo "<td>".$aRow['available']."</td>";
      echo "<td>".$aRow['kitchen']."</td>";
      echo "<td>".$aRow['laundry']."</td>";
      echo "<td>".$aRow['specialNeeds']."</td>";
      echo "<td><a href=admin_delete_dorms.php?id=".$aRow['id']. "&dormName=".urlencode($aRow['name']).">Delete</a></td>\n";
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