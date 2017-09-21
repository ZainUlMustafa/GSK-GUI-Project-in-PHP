<?php

	$db = mysqli_connect("localhost", "root", "", "a_database");
	if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $_SESSION['message'] = 'Login with your credentials';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from login form 

		$query = 'SELECT id, username, password, firstname, secondname FROM users';
		$response = mysqli_query($db, $query);

		// escape user inputs for security
		$user_name = mysqli_real_escape_string($db, $_POST['username']);
		$pass_word = mysqli_real_escape_string($db, $_POST['password']);

		session_start();
		$check = 0;

		if($response){
			while($row = mysqli_fetch_array($response)){
				if(($row['username'] == $user_name)&&($row['password'] == $pass_word)){
				//if(($row['username'] == $user_name)&&(password_verify($row['password'], $pass_word))){
					$check = 1;
					$_SESSION['status']="Active";
					//echo $row['password'];
					//echo $pass_word;

					/*echo '<p>ID: ' . $row['id'] . '</p>' .
					'<p>Username: ' . $row['username'] . '</p>' .
					'<p>Fisrt Name: ' . $row['firstname'] . '</p>' .
					'<p>Second Name: ' . $row['secondname'] . '</p>';

					echo 'Login successful';*/
					//if(session_destroy()){
					$_SESSION['message'] = 'Login successful';
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['username'] = $row['username'];
					header("Location: homepage.php");
					//}
				}
			}
			if($check == 0){
				$_SESSION['message'] = 'Login unsuccessful. Password or Username is wrong';
				//$_SESSION['firstname'] = 'please try logging in again';
				/*if(session_destroy()) {
			    	header("Location: login.php");
			   	}*/
			}
		}
		else{
			echo 'could not issue database query </br>';
			echo mysqli_error($db);
		}
	//end of first if
	}
	mysqli_close($db);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class='header'>
	<p> 
	<img class='logo' src='media/GSKlogo.png' align='left'/><a href='index.php' class="regLog"> Register </a> or Login </p>
</div>

<div class='form' align="center">
	<form action='' method='post'>
		<table>
		    <tr>
		    	<!--<td>Username :</td>-->
		    	<td><input name='username' id='userName' type='text' class='textInput' required autocomplete='off' placeholder="Username"></td>
		    </tr>
		    <tr>
		    	<!--<td>Password :</td>-->
		    	<td><input name='password' id='passWord' type='password' class='textInput' required autocomplete='off' placeholder="Password"></td>
		    </tr>
		    <tr>
		    	<!--<td></td>-->
		    	<td><input type='submit' name='loginBtn' value='Login' class='submitBTN'></td>
		    </tr>
		    <tr>
		    	<td><a href="#" class="fp">Forgot Password?</a></td>
		    </tr>
		</table>
	</form>
	<p><?php echo $_SESSION['message']?></p>
</div> 
</body>
</html>