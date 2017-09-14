<?php
	/*session_start();
    $db = mysqli_connect('localhost', 'root', '', 'a_database');
    if (isset($_POST['registerBtn'])) {
    	session_start();
        $firstname = mysqli_real_escape_string($_POST['firstname']);
        $secondname = mysqli_real_escape_string($_POST['secondname']);
        $username = mysqli_real_escape_string($_POST['username']);
        $password = mysqli_real_escape_string($_POST['password']);
        $cpassword = mysqli_real_escape_string($_POST['cpassword']);

        if ($password == $cpassword) {
        	// create user
        	$password = md5($password);
        	// hash password for security
        	$sql = "INSERT INTO users (firstname, secondname, username, password) VALUES ('$firstname', '$secondname', '$username', '$password')";
        	//$sql = "INSERT INTO users(username, password, firstname, secondname) VALUES('$username', '$password', '$firstname', '$secondname')";
        	//mysqli_query($db, $sql);
        	if(mysqli_query($db, $sql)){
		        echo "Records added successfully.";
		    } else{
		        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
		    }
        	$_SESSION['message'] = "Registration successful";
        	$_SESSION['username'] = $username;
        	header('location: insert.php'); 
        }else{
        	// passwords dont match
        	$_SESSION['message'] = "The two passwords don't match";
        }
    }*/


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
