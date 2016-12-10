<?php
    require_once 'sql_helper.php';
   
    $dormName = $_POST['dormName'];
    
    $class = $_POST['class'];
    
    $kitchen = isset($_POST['kitchen']);
    
    $laundry = isset($_POST['laundry']);
    
    $specialneeds = isset($_POST['specialneeds']);
    
    $capacity = 5;
    
    $available = 5;
    
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect("localhost", "alexkurtz", "");
  
    // Selecting Database
    $db = mysqli_select_db($connection,"p3");

    // SQL query to fetch information of registered users and finds user match.
    $sql = "insert into Dorms(name, year, capacity, available, kitchen, laundry, specialNeeds) 
    values('$dormName', '$class', '$capacity', '$available', '$kitchen', '$laundry', '$specialneeds');";
    mysqli_query($connection,$sql);
    
    echo "Your information has been saved you can now return to the login page.<a href=index.php>Login Page</a><br>\n";
    
?>