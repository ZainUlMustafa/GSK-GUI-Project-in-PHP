<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Account</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class='header'>
	<p> 
	<img class='logo' src='media/GSKlogo.png' align='left'/> Login or <a href='index.php'> Register </a></p>
</div>

<div class='form' align="center">
	<form action='homepage.php' method='post'>
		<table>
		    <tr>
		    	<td>Username:</td>
		    	<td><input name='username' id='userName' type='text' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td>Password:</td>
		    	<td><input name='password' id='passWord' type='password' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td></td>
		    	<td><input type='submit' name='loginBtn' value='Login' class='submitBTN'></td>
		    </tr>
		</table>
	</form>
</div> 
</body>
</html>