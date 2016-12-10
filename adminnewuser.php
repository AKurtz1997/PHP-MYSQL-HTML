<?php
    require_once 'sql_helper.php';
   
    $firstName = $_POST['firstname'];

    $lastName = $_POST['lastname'];

    $cwid = $_POST['cwid'];
    
    $email = $_POST['email'];

    $gender = $_POST['gender'];

    $class = $_POST['class'];

    $kitchen = isset($_POST['kitchen']);

    $laundry = isset($_POST['laundry']);

    $specialneeds = isset($_POST['specialneeds']);
    
    $password = $_POST['password'];
    
    $username = $_POST['username'];
    
    $admin = isset($_POST['admin']);
    
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect("localhost", "alexkurtz", "");
  
    // Selecting Database
    $db = mysqli_select_db($connection,"p3");

    // SQL query to fetch information of registered users and finds user match.
    $sql = "insert into users (username, password, firstname, lastname, cwid, email ,class, gender, specialneeds, laundry, kitchen, admin) 
    values('$username', password('$password'),'$firstName', '$lastName', '$cwid', '$email', '$class', '$gender'
    , '$specialneeds', '$laundry', '$kitchen', '$admin');";
    mysqli_query($connection,$sql);
    
    echo "Your information has been saved you can now return to the login page.<a href=index.php>Login Page</a><br>\n";
    
    echo "Your username is $username and your password is $password";
    
    
?>