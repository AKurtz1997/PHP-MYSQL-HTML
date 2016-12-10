<html>
<head>
<link rel="stylesheet" type="text/css" href="proj2.css">
</head>
    <body>
        <h1>New User Form</h1>
        <?php
            require_once 'sql.php';
            // at this point I have access to a global $conn
            
            echo "This is the first page for our second project. At his point I have a connection to a database and I can assume that Dorms and Reservations tables exist.\n<br>";

            echo "<form action=newuser.php method=POST>\n";
            echo "UserName: <input type=text name=username required>\n<br>";
            echo "Password: <input type=text name=password required>\n<br>";    
            echo "First Name: <input type=text name=firstname required>\n<br>";
            echo "Last Name: <input type=text name=lastname required>\n<br>";
            echo "CWID: <input type=\"text\" name=\"cwid\" required>\n<br>";
            echo "Email: <input type=text name=email required>\n<br>";
            echo "Year: <br><select name =\"class\" size = \"1\" required><br><br>";
            echo "<option value = 1>Freshmen</option>";
            echo "<option value = 2>Sophmore</option>";
            echo "<option value = 3>Junior</option>"; //junior and seniors have the same values for housing
            echo "<option value = 3>Senior</option>";
            echo  "</select><br>";
            echo "Gender:<br> <input type='radio' name='gender' value='male' required>Male";
            echo "<input type='radio' name='gender' value='female' required>Female<br>";
            echo "Preferences: <br> <input type='checkbox' name = 'specialneeds' value = 'specialneeds'>Special Needs<br>";
            echo "<input type='checkbox' name = 'laundry' value = 'laundry'>Laundry on premises <br>";
            echo "<input type='checkbox' name = 'kitchen' value = 'kitchen'>Fully equipped kitchen <br>";
            echo "</select>\n<br>";
            
            echo "<br><input type=\"submit\" value=\"New User\">\n<br>";
        ?>
        </form>

    </body>
</html>