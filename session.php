<?php

// Establishing Connection with Server
$connection = mysqli_connect("localhost", "alexkurtz", "");

// Selecting Database
$db = mysqli_select_db($connection, "p3");

session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$sql=mysqli_query($connection,"select username from users where username='$user_check'");
$row = mysqli_fetch_assoc($sql);
$login_session=$row['username'];
// the rest of the user information is in other columns 
// you can do something like foreach($column in $row) 
?>