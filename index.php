<?php

?>



<!DOCTYPE html>
<html>
<head>
    <title>Make an Account</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class='header'>
	<p> 
	<img class='logo' src='media/GSKlogo.png' align='left'/> Register or <a href='login.php'> Login </a></p>
</div>

<div class='form' align="center">
	<form action='insert.php' method='post'>
		<table>
			<tr>
				<td>First Name:</td>
		    	<td><input name='firstname' id='firstName' type='text' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td>Second Name:</td>
		    	<td><input name='secondname' id='secondName' type='text' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td>Username:</td>
		    	<td><input name='username' id='userName' type='text' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td>Password:</td>
		    	<td><input name='password' id='passWord' type='password' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td>Confirm Password:</td>
		    	<td><input name='cpassword' id='cpassWord' type='password' class='textInput' required autocomplete='off'></td>
		    </tr>
		    <tr>
		    	<td></td>
		    	<td><input type='submit' name='registerBtn' value='Register' class='submitBTN'></td>
		    </tr>
		</table>
	</form>
</div> 
</body>
</html>
