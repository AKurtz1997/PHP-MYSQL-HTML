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
    if ($available == 0){
            $errorString = "You cannot live in $dormName because there are no available spots";
            echo $errorString;
            $error = true;
        }

         echo '<form action="page3admin.php" method="post">';
            foreach($_POST as $key => $value){
             echo '<input type="hidden" name="', $key, '" value="', $value, '"> ';
            }
            if($error == false){
            echo "<input type=\"submit\" value=\"submit\" class = \"submit\">";
            echo "</form>";
            echo "Your reservation has no conflicting data please press the button to save your reservation";
            }
            else if($error == true){
            echo "<a href='housingform.php'>Return to form</a>";
            }
?>


