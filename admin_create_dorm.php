<html>
<head>
<link rel="stylesheet" type="text/css" href="proj2.css">
</head>
    <body>
        <h1>Admin Dorm Form</h1>
        <?php
            require_once 'sql.php';
            // at this point I have access to a global $conn
            
            echo "This is the first page for our second project. At his point I have a connection to a database and I can assume that Dorms and Reservations tables exist.\n<br>";

            echo "<form action=adminnewdorm.php method=POST>\n";
            echo "Dorm Name: <input type=text name=dormName required>\n<br>";
            echo "Year: <br><select name =\"class\" size = \"1\" required><br><br>";
            echo "<option value = 1>Freshmen</option>";
            echo "<option value = 2>Sophmore</option>";
            echo "<option value = 3>Junior</option>"; //junior and seniors have the same values for housing
            echo "<option value = 3>Senior</option>";
            echo  "</select><br>";
            echo "Preferences: <br> <input type='checkbox' name = 'specialneeds' value = 'specialneeds'>Special Needs<br>";
            echo "<input type='checkbox' name = 'laundry' value = 'laundry'>Laundry on premises <br>";
            echo "<input type='checkbox' name = 'kitchen' value = 'kitchen'>Fully equipped kitchen <br>";
            echo "</select>\n<br>";
            
            echo "<br><input type=\"submit\" value=\"New Dorm\">\n<br>";
        ?>
        </form>

    </body>
</html>