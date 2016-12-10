<?php

    $servername = "localhost";
    $username = "alexkurtz";
    $password = "";
    $dbname = "p3";
    $dormTable = "Dorms";
    $usersTable = "users";
    $reservationsTable = "Reservations";
    
    $conn = mysqli_connect($servername, $username, $password);
    
    if (!$conn) 
        die("Connection failed: ".mysqli_connect_error());
    else 
        mysqli_select_db($conn, $dbname); // at this point, we have (1) a connection to the MySQL instance, and (2) we've selected our project database


    function tableExists($table) {
        $sql = "SELECT * FROM $table";
        if (query($sql) !== FALSE) 
            return true;
        else 
            return false; 
    }
    
    function query($sql) {
        global $conn;
        return mysqli_query($conn, $sql);
    }
    
    function createTable($table, $columns) {
        $sql = "CREATE TABLE $table (" . implode(", ", $columns) . ")";
        //echo $sql; die;
        echo "Creating table with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function createRecord($table, $values) {
        return insertInto($table, ["name","year","capacity","available","kitchen","laundry","specialNeeds"], $values);
    }
    
    function createReservationRecord($table, $values) {
        return insertInto($table, ["reservationRecordID", "raID", "studentName", "class", "gender", "cwid", "kitchen", "laundry", "specialNeeds"], $values);

                                
    }
    
        function createUsersRecord($table, $values){
             return insertInto($table, ["ID", "username", "password", "firstname", "lastname", "cwid", "email", "class", "gender", "specialneeds", "laundry", "kitchen", "admin"], $values);
        }
    
    function insertInto($table, $columns, $values) {
        $sql = "INSERT INTO $table (" . implode(", ", $columns). ") VALUES (" . implode(", ", $values) . ")";
        //echo $sql; die;
        echo "Inserting a new record with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
?>







