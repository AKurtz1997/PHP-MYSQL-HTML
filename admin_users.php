<?php
session_start(); // Starting Session
require 'sql_helper.php'; // get connection information
if ($_SESSION['login_user']) {
  if ($_SESSION['user_admin']) {?>
  <a href=admin_create_user.php>Create a new user account</a>.
  <table>
    <tr>
      <td>ID</td>
      <td>userDorm</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Class</td>
      <td>Gender</td>
      <td>Kitchen</td>
      <td>Laundry</td>
      <td>Special Needs</td>
      <td>Email</td>
      <td>Admin</td>
      <td></td>
    </tr>
<?php
    $sql = "select * from $usersTable";
    $result = mysqli_query($conn,$sql);
    while ($aRow = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      //print_r($aRow);
      echo "<td>".$aRow['id']."</td>";
      echo "<td>".$aRow['userDorm']."</td>";
      echo "<td>".$aRow['firstname']."</td>";
      echo "<td>".$aRow['lastname']."</td>";
      echo "<td>".$aRow['class']."</td>";
      echo "<td>".$aRow['gender']."</td>";
      echo "<td>".$aRow['kitchen']."</td>";
      echo "<td>".$aRow['laundry']."</td>";
      echo "<td>".$aRow['specialneeds']."</td>";
      echo "<td>".$aRow['email']."</td>";
      echo "<td>".$aRow['admin']."</td>";
      echo "<td><a href=admin_delete_user.php?id=".$aRow['id']. "&dormName=".urlencode($aRow['userDorm']).">Delete</a></td>\n";
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