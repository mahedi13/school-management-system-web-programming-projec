<?php
session_start();
?>
<DOCTYPE html>
	<html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style.css">
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
		if (isset($_SESSION['username'])||isset($_COOKIE['cook'])) {
			echo '<li><a href="logout.php"><button>LOGOUT</button></a></li> <h3 id="font"><u>'.$_COOKIE['cook'].'</u></h3>';
		}
		else{
			echo '<li><a href="login.php"><button>LOGIN</button></a></li>';
		}
		?>
		</ul>

		<center>
		<div class="header"> 
		About<h2 text-color="grey"> Brinsly Primary School</h2>
    	</div>
        </center>
        <p></p>
		<center>
		<div class="header"> 
		<h3>
		 <P>Brinsly Primary School is a well known popular kindergarden school. 
		 It provides children student education with proper nursery. 
		 In this school, students from play,nursery to class V can study.
		 
		 </p>
		</h3>
    	</div>
        </center>

	</div>
</body>

	</html>