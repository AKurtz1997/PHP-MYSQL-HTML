<?php
echo "<form action=deletereservationcheck.php method=POST>\n";
echo "Are you sure you want to delete your reservation:<br> <input type='radio' name='confirmation' value='Yes' required>Yes";
echo "<input type='radio' name='confirmation' value='No' required>No<br>";

echo "<br><input type=\"submit\" value=\"Confirm\">\n<br>";
?>