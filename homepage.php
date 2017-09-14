<?php 

	$db = mysqli_connect("localhost", "root", "", "a_database");
	if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

	$query = 'SELECT id, username, password, firstname, secondname FROM users';
	$response = mysqli_query($db, $query);

	// escape user inputs for security
	$user_name = mysqli_real_escape_string($db, $_REQUEST['username']);
	$pass_word = mysqli_real_escape_string($db, $_REQUEST['password']);

	session_start();
	$check = 0;

	if($response){
		while($row = mysqli_fetch_array($response)){
			if(($row['username'] == $user_name)&&($row['password'] == $pass_word)){
				$check = 1;

				/*echo '<p>ID: ' . $row['id'] . '</p>' .
				'<p>Username: ' . $row['username'] . '</p>' .
				'<p>Fisrt Name: ' . $row['firstname'] . '</p>' .
				'<p>Second Name: ' . $row['secondname'] . '</p>';

				echo 'Login successful';*/
				$_SESSION['message'] = 'Login successful';
				$_SESSION['firstname'] = $row['firstname'];
			}
		}
		if($check == 0){
			$_SESSION['message'] = 'Login unsuccessful';
			$_SESSION['firstname'] = 'please try logging in again';
			if(session_destroy()) {
		    	header("Location: login.php");
		   	}
		}
	}
	else{
		echo 'could not issue database query </br>';
		echo mysqli_error($db);
	}
	mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
</head>
<body>

<div class='header'>
    <p> 
    <img class='logo' src='media/GSKlogo.png' align='left'/><a class='logout' href='logout.php'>Logout</a></p>
</div>

<div class='borderCenterDIV' align='center'>
<h4><?php echo $_SESSION['message']?></h4>
<h4>Hello, <?php echo $_SESSION['firstname']?></h4>

<p>Select the menu by clicking the Menu button:</p>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">Option 1</a>
    <a href="#">Option 2</a>
    <a href="#">Option 3</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  	if (!event.target.matches('.dropbtn')) {

    	var dropdowns = document.getElementsByClassName("dropdown-content");
    	var i;
    	for (i = 0; i < dropdowns.length; i++) {
      		var openDropdown = dropdowns[i];
      		if (openDropdown.classList.contains('show')) {
        	openDropdown.classList.remove('show');
      		}
    	}
  	}
}
</script>
</div>
</body>
</html>