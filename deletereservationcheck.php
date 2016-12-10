<?php

$check = $_POST['confirmation'];

if ($check == "Yes"){
    header("location: deletereservation.php");
} else {
   header("location: profile.php");
}
?>