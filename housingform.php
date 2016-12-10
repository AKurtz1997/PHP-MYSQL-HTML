<html>
<head>
<link rel="stylesheet" type="text/css" href="proj2.css">
</head>
    <body>
        <h1>Marist Housing Form</h1>
        <?php
            require_once 'sql.php';
            // at this point I have access to a global $conn
            session_start();
            echo "This is the first page for our second project. At his point I have a connection to a database and I can assume that Dorms and Reservations tables exist.\n<br>";
            echo "<form action=page2.php method=POST>\n";
            $sql = "SELECT name, available FROM $dormTable"; // this is the SQL to get RA entries from database
            //echo "sql is $sql\n<br>";die;
            if ($result=mysqli_query($conn, $sql)) { // run the select query on database and get result set
                $numRows = mysqli_num_rows($result); // determine how many rows(i.e., records) are returned
                echo "Dorm Selction: <br> <select name=dorm>\n";
                echo "<option value=None>Please select</option>\n";
                for ($i=0; $i<$numRows; $i++) { // go through each record one by one
                    $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
                    $dormName = $aDorm['name'];
                    $dormAvailable = $aDorm['available'];
                    echo "<option value=\"$dormName\">$dormName ($dormAvailable)</option>\n";
                }
                echo "</select>\n";
            } else {
                echo "something is wrong: ".mysqli_error($conn);
                echo $result;
                die;
            }
            echo "<br><input type=\"submit\" value=\"Page 2\">\n<br>";
        ?>
        </form>

    </body>
</html>