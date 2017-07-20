<?php 
	session_start();
	$cookie_name="cook";
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	if(!isset($_SESSION['username'])){

	if (isset($_POST['login_btn'])) {
		$username = $_POST['username'];
		$password =$_POST['password'];
		
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) {
			$cookie_value=$username;
			setcookie($cookie_name, $cookie_value,time() + (180), "/");
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: login_done.php"); //redirect to home page
		}
		else{
			$_SESSION['message'] = "Username/password combination incorrect";
		}
	}
?>
<DOCTYPE html>
	<html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style.css">

	<style>

	input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

#formdiv_admin {
    background-color: rgba(39, 79, 77, 0.96);
    padding: 20px;
    width:602px;
}
.headerlogin{
	background-color: #1A3333;
	background: rgba(39, 79, 77, 0.96);
	color: white;
	text-align: center;
	top:0px;
	width:50%;
	padding: 5px;
}

	</style>
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
  if (validate_required(username,"Username must be filled out!")==false)
  {  username.focus(); return false;}
  if (validate_required(password,"Password must be filled out!")==false)
  {  password.focus(); return false;}
  }
}
</script>
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
		
	
     <?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
	<center>
	<div id="formdiv_admin">
	<h1 id="font">Login As Student</h1>
	<form method="post" id="font" onSubmit="return validate_form(this)" action="login.php">
		<label for="luser">Username:</label>
    	<input type="text" name="username" placeholder="Username..">
	
		<label for="lpass">Password:</label>
    	<input type="password" name="password" placeholder="Password..">
		
		<input type="submit"  name="login_btn" value="LOGIN"></td>
		</form>
		</div>
		</center>

	</div>
</body>

</html>
<?php
}
else{
	header("location: home.php");
}
?>