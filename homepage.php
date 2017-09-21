<?php 

	session_start();

	if($_SESSION['status']!="Active")
	{
    	header("location: login.php");	
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <script type="text/javascript" src="js/Chart.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/fa.js"></script>

	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
</head>
<body>

<div class='header'>
    <p> 
    <img class='logo' src='media/GSKlogo.png' align='left'/><a class='logout' href='logout.php'>Logout</a></p>
</div>

<div class='borderCenterDIV' align='center'>
<h4><?php echo $_SESSION['message']?><i class="fa fa-check" aria-hidden="true"></i></h4>
<hr>
<h4>Hello, <?php echo $_SESSION['firstname']?></h4>
<hr>
<h4><?php echo $_SESSION['username']?>'s Dashboard</h4>

<p>Select the graph type by clicking the Menu button:</p>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#myChart1" id="op1">Line Chart</a>
    <a href="#myChart2" id="op2">Bar Chart</a>
    <a href="#myChart3" id="op3">Doughnut Chart</a>
  </div>
</div>

<div class='container'>
	<canvas id="myChart1"></canvas>
	<canvas id="myChart2"></canvas>
	<canvas id="myChart3"></canvas>
</div>

<!-- Some in code scripts -->
<script>
	$(document).ready(function(){
	    $("#op1").click(function(){
	        $("#myChart1").show();
	        $("#myChart2").hide();
	        $("#myChart3").hide();
	    });
	    $("#op2").click(function(){
	        $("#myChart2").show();
	        $("#myChart1").hide();
	        $("#myChart3").hide();
	    });
	    $("#op3").click(function(){
	        $("#myChart3").show();
	        $("#myChart1").hide();
	        $("#myChart2").hide();
	    });
	});
</script>

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