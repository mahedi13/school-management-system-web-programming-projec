<?php
session_start();
if(isset($_SESSION['a_username'])){
?>
<DOCTYPE html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style_ad.css">
<style>


 
</style>

	</head>

	<body>

		<div id="header">
		<center><img src="adminlogo.png" alt="adminlogo" id="adminlogo"><br><h4 id="font"><i>This Is Admin Panel !!</i></h4></center>
		</div>
		

			<div id="data1">
				<center>
				
				<marquee behavior="alternate" direction="right" scrollamount="10"><h2 id="font">Brinsley School Academy</h2></marquee>
		  		<div id="navdiv">
				<ul>
				<li><a href="home.php"><button class="button button2">Home</button></a></li>
				<li><a href="register.php"><button class="button button2">Register Student</button></a></li>
				<li><a href="ad_result.php"><button class="button button2">Update   Results</button></a></li>
				<li><a href="ad_attendence.php"><button class="button button2">Update Attendence</button></a></li>
				<li><a href="ad_payment.php"><button class="button button2">Update Payment</button></a></li>
				<li><a href="logout.php"><button class="button button2">Logout Admin</button></a></li>
				</ul>
				</div>
			</center>
		 	</div>


	<div id="data2">
		<div id="panel"></div>
		<div id="table">
		</div>
	</div>


	</body>

	</html>

	<?php
}
else{
	//echo "<script>window.open('admin.php','_self)</script>";
	header("location: admin.php");
}
?>