<?php
if(isset($_SESSION['login_user'])){
header("location: profile.php");
die;
}
?>
<html>
<body>
<h1>PHP Login Session Example</h1>
<h2>Login Form</h2>
<form action="login.php" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
</form>
</body>
<a href=signup.php>New Users</a><br>
</html> 