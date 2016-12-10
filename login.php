<?php
session_start(); // Starting Session
require_once 'sql_helper.php';
 // Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "alexkurtz", "");
  
  // Selecting Database
  $db = mysqli_select_db($connection,"p3");

if (isset($_POST['submit'])) {
  
  if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Username , Password or email is empty, please provide input for the fields.";
  } else {
    // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email = $_POST['email'];

    $_SESSION['user_username'] = $username;
    $_SESSION['user_password'] = $password;
    
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect("localhost", "alexkurtz", "");
  
    // Selecting Database
    $db = mysqli_select_db($connection,"p3");

    // SQL query to fetch information of registered users and finds user match.
    $sql = "select * from users where password=password('$password') AND username='$username'";
    echo "Running this SQL $sql to see if this user is defined\n<br>";
    $result = mysqli_query($connection,$sql);
    echo mysqli_num_rows($result). " is the number of rows";
    if (mysqli_num_rows($result) == 1) {  // we have the user in the database
      $_SESSION['login_user']=$username; // Initializing Session
      $aUser = mysqli_fetch_assoc($result); // get the user entry from database
      //echo "<BR>";
      //print_r($aUser);
      $_SESSION['user_firstname'] = $aUser['firstname'];
      $_SESSION['user_lastname'] = $aUser['lastname'];
      $_SESSION['user_class'] = $aUser['class'];
      $_SESSION['user_gender'] = $aUser['gender'];
      $_SESSION['user_admin'] = $aUser['admin'];
      $_SESSION['user_kitchen'] = $aUser['kitchen'];
      $_SESSION['user_laundry'] = $aUser['laundry'];
      $_SESSION['user_specialneeds'] = $aUser['specialneeds'];
      $_SESSION['user_cwid'] = $aUser['cwid'];
      $_SESSION['user_email'] = $aUser['email'];
      $_SESSION['user_dorm'] = $aUser['userDorm'];
      $_SESSION['user_active'] = $aUser['active'];
      //echo "<BR>";
      //print_r($_SESSION);
      //echo "<BR>";
      if ($aUser['admin']) {
        header("location: admin_main.php");
      } else {
        header("location: profile.php"); // Redirecting To Other Page
      }
    } else { // no such login
      echo "Username or Password is invalid.";
    }
  
    mysqli_close($connection); // Closing Connection

  }

}
?>