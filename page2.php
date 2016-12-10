<?php
    session_start();
    require_once 'sql_helper.php';
    $class = $_SESSION['login_user']; 
    $residenceAreaChoice = $_POST["dorm"];
    $error = false;
    $dormName = $_POST['dorm'];
    $AvailableCheck = "SELECT available FROM Dorms Where name = '$dormName';"; 
    $class = $_SESSION['user_class'];
    
    
    $result = query($AvailableCheck);


    $numRows = mysqli_num_rows($result);

    for ($i=0; $i<$numRows; $i++) { // go through each record one by one
        $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
        $available = $aDorm['available'];
    }
    
    if ($residenceAreaChoice != "None") { // check against user preferences
        $sql = "SELECT * FROM $dormTable where name = '".$_POST["dorm"]."'";
        //echo $sql;die;
        if ($result = mysqli_query($conn, $sql)) {
            $count = mysqli_num_rows($result);
            $aDorm = mysqli_fetch_assoc($result); // get the RA entry that user picked
            //print_r($aDorm);
            if ($aDorm['year'] == $class) {
                if ($_SESSION['user_kitchen']) {
                    if ($aDorm['kitchen']) {
                        unset($errorString);
                        $error = false;
                    } else {
                        $errorString = "$residenceAreaChoice does not provide kitchen facilities.\n<br>";
                        echo $errorString;
                        $error = true;
                        //echo "<a href='index.php'>Return to form</a>";
                    }
                }
                
            } else {
                $errorString = "You cannot live in $residenceAreaChoice due to your class status.\n<br>";
                echo $errorString;
                $error = true;
                //echo "<a href='index.php'>Return to form</a>";
            }
            if ($available == 0){
                $errorString = "You cannot live in $dormName because there are no available spots";
                echo $errorString;
                $error = true;
            }

        } else {
            echo "Something went wrong in getting Residence Area details from database.".mysqli_error($conn); die;
        }
         echo '<form action="page3.php" method="post">';
            foreach($_POST as $key => $value){
             echo '<input type="hidden" name="', $key, '" value="', $value, '"> ';
            }
            if($error == false){
            echo "Your reservation has no conflicting data please press the button to save your reservation";
            echo "<BR>";
            echo "<input type=\"submit\" value=\"submit\" class = \"submit\">";
            echo "</form>";
            }
            else if($error == true){
            echo "<a href='housingform.php'>Return to form</a>";
            }
            
} else { // do the filtering as you've done in project 1, copy the code from page1 of project2, change $sql as follows:
    
        
        $sql = "SELECT name, available FROM $dormTable where year = $class";
        $result = query($sql);
        $numRows = mysqli_num_rows($result);
        echo '<form action="page3.php" method="POST">';
        echo "Dorm Selction: <br> <select name=dorm>\n";
        for ($i=0; $i<$numRows; $i++) { // go through each record one by one
            $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
            $dormName = $aDorm['name'];
            $dormAvailable = $aDorm['available'];
            if ($dormAvailable == 0){
                echo "<option value=\"$dormName\disabled>$dormName ($dormAvailable)</option>\n";
            } else{
            echo "<option value=\"$dormName\">$dormName ($dormAvailable)</option>\n";
            }
        }   
        
        foreach($_POST as $key => $value){
            if ($key != "dorm"){
                echo '<input type="hidden" name="', $key, '" value="', $value, '"> ';
            }
        }
        
        if($error == true){
            echo "<a href='housingform.php'>Return to form</a>";
            } else {
            echo "Your reservation has no conflicting data please press the button to save your reservation";
            echo "<BR>";
            echo "<input type=\"submit\" value=\"submit\" class = \"submit\">";
            echo "</form>";
            }
        // this is the SQL to get RA entries from database
        //echo $sql;die;
            

}
?>