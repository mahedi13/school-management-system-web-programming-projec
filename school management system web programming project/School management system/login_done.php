<?php 
	session_start();
if(isset($_SESSION['username'])){
?>
<DOCTYPE html>
	<html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
.logsuccess{
	background: rgba(39, 79, 77, 0.96);
	color: white;
	text-align: center;
	border-radius:4px;
	top:0px;
	width:60%;
	padding: 5px;
	background-size: cover;
}
		</style>
	</head>
<body>

	<div id="Maindiv">
		
	</ul>
		<div id="navdiv">

			<br><br><br><br><br><br>
	
			<ul>
				<h2>Brinsley School Academy</h2>
				<li><a href="home.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="list.php">List</a></li>
				<li><a href="result.php">Result</a></li>
				<li><a href="attendence.php">Attendence</a></li>
				<li><a href="admin.php">Admin Control</a></li>
			</ul>

		</div>

		<ul id="id1">
		<?php
		if (isset($_SESSION['username'])) {
			echo '<li><a href="logout.php"><button>LOGOUT</button></a></li> <h3 id="font">(<u>'.$_SESSION['username'].'</u>)</h3>';
		}
		?>
		</ul>
	<center>	
	<div class="logsuccess"> 
<?php 
	if(isset($_SESSION['username'])){
	 echo '<h1 id="font">LOGIN SUCCESSFUL '.$_SESSION['username'].'</h1>'; 
	}
	else 
	{
		echo "<script>window.open('home.php','_self)</script>";
	}
?>	


	</div>
	</center>
</div>
</body>

	</html>
<?php
}
else {
	header("location: login_done.php");
}
?>
