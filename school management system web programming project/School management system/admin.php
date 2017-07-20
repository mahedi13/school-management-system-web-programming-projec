<?php 
	session_start();
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	if (isset($_POST['admin_login'])) {
		$a_username = $_POST['a_username'];
		$a_password =$_POST['a_password'];
		
		$ad_sql = "SELECT * FROM admin WHERE username='$a_username' AND password='$a_password'";
		$ad_result = mysqli_query($db, $ad_sql);
		if (mysqli_num_rows($ad_result) == 1) {
			//$cookie_value=$username;
			//setcookie($cookie_name, $cookie_value,time()+(100),"/");
			$_SESSION['ad_message'] = "You are now logged in";
			$_SESSION['a_username'] = $a_username;
			header("location: admin_panel.php"); //redirect to home page
		}
		else{
			$_SESSION['ad_message'] = "Username/Password Combination Incorrect";
		}
	}
?>
<DOCTYPE html>
	<html>
	<head>
		<title>admin</title>
		<link rel="stylesheet" type="text/css" href="style_ad.css">
	

<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(username,"username must be filled out!")==false)
  {  username.focus(); return false;}
  if (validate_required(password,"password must be filled out!")==false)
  {  password.focus(); return false;}
 }
}
</script>
	
	</head>
	<body>
		<div id="header">
		<center><img src="adminlogo.png" alt="adminlogo" id="adminlogo"><h4 id="font"><i>This is Admin Panel!!</i></h4></center>
		</div>
		<div id="sidebar">

		</div>
		<div id="data">
			<center>
				<br>
				<marquee behavior="alternate" direction="right" scrollamount="10"><h2 id="font">Brinsley School Academy</h2></marquee>
				<a href="home.php"><button class="button button2">Home</button></a>
			<h2 id="font">Enter As Admin</h2>
		</center>

	<?php
	if (isset($_SESSION['ad_message'])) {
		echo "<div id='error_msg'>".$_SESSION['ad_message']."</div>";
		unset($_SESSION['ad_message']);
	}
?>		
		<center>
		<div id="formdiv_admin">
	<form method="post" id="font" onSubmit="return validate_form(this)" action="admin.php">
		<label for="ladminuser">Admin Username:</label>
    	<input type="text" name="a_username" placeholder="Admin Username..">

		<label for="ladminpass">Admin Password:</label>
    	<input type="password" name="a_password" placeholder="Admin password..">
		
		<input type="submit"  name="admin_login" value="Submit"></td>
		
	</form>
   </div>

   </div>

	</body>

	</html>