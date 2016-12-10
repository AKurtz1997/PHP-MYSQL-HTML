<?php

    require 'sql_helper.php';
    
    
    if (!mysqli_select_db($conn, $dbname)) { // if I can select $dbname, its fine, otherwise, create the database for me.
        $sql = "CREATE DATABASE $dbname";
        if (mysqli_query($conn, $sql)) {
            mysqli_select_db($conn, $dbname); // at this point, we have (1) a connection to the MySQL instance, and (2) we've selected our project database for creating tables in it
        } else {
            echo "Error creating database: ".mysqli_error($conn);
            die;
        }
    } 
    if($result = query("SHOW TABLES LIKE users")) {
    if($result->num_rows == 1) {
        echo "Table exists";
    } else{
        echo "Table like users not exists";
    }
}else{
    $sql = "CREATE TABLE users(
        id INT(11)  AUTO_INCREMENT UNIQUE, 
        username VARCHAR(100),
        password VARCHAR(100),
        firstname VARCHAR(100),
        lastname VARCHAR(100),
        userDorm VARCHAR(100),
        cwid VARCHAR(8),
        class TINYINT(1),
        gender VARCHAR(10),
        email VARCHAR(50),
        specialneeds TINYINT(1),
        laundry TINYINT(1), 
        kitchen TINYINT(1), 
        active VARCHAR(11)  NULL DEFAULT  '0',
        admin TINYINT(1)
    )";

    if (query($sql) == TRUE) {
        echo "Table users created successfully";
    }  
}
    $table = $dormTable;//"Dorms";
    
    if (!tableExists($table)) { // if the $table does not exist, then create it
    
        createTable($table, [   "id INT(6) AUTO_INCREMENT UNIQUE", "name VARCHAR(100)", "year TINYINT(1)",
                                "capacity INT", "available INT", "kitchen TINYINT(1)", "laundry TINYINT(1)", 
                                "specialNeeds TINYINT(1)"]);
        //name, year, capacity, avaliable, kitchen, laundry, specialneeds                        
        createRecord($table, ["'Leo Hall'", "1", "5", "5", "0", "1", "1"]);
        createRecord($table, ["'Marian Hall'", "1", "5", "5", "0", "1", "1"]);
        createRecord($table, ["'Sheahan Hall'", "1", "5", "5", "0", "1", "1"]);
        createRecord($table, ["'Champagnat Hall'", "1", "5", "5", "0", "1", "1"]);
        createRecord($table, ["'Midrise Hall'", "2", "5", "5", "0", "1", "1"]);
        createRecord($table, ["'Foy Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'Upper New Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'Lower New Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'Lower West Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'Upper West Townhouses'", "2", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'Building A'", "3", "5", "5", "1", "1", "1"]);
        createRecord($table, ["'New Fulton'", "3", "5", "5", "1", "1", "1"]); 
        createRecord($table, ["'Fulton Street Townhouses'", "3", "5", "5", "1", "1", "1"]); 
        createRecord($table, ["'Talmadge Court'", "3", "5", "5", "1", "1", "1"]); 
    }

    $table = $reservationsTable; //"Reservations";
    
    $table = $reservationsTable;
    if (tableExists($table) == false){
         createTable($table,[   "ID INT(11) AUTO_INCREMENT UNIQUE","ConfirmationID TEXT" ,"DormID INT(6)" ,"firstName VARCHAR(100)", 
                                "lastName VARCHAR(100)","class TINYINT(1)",
                                "gender VARCHAR(10)", "cwid VARCHAR(8)", 
                                "kitchen TINYINT(1)", "laundry TINYINT(1)", "specialNeeds TINYINT(1)",
                                "reservationTime TIMESTAMP"]);
    }

?>