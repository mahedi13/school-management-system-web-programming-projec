<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "authentication");
if(isset($_SESSION['a_username'])){
	if (isset($_POST['register_btn'])&&isset($_POST['username'])) {
		//$username = mysql_real_escape_string($_POST['username']);
		//$email = mysql_real_escape_string($_POST['email']);
		//$password = mysql_real_escape_string($_POST['password']);
		//$password2 = mysql_real_escape_string($_POST['password2']);
		$student_id=$_POST['student_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$class_id=$_POST['class_id'];
		$phone=$_POST['phone'];
		$dob=$_POST['dob'];
		$join_date=$_POST['join_date'];
		$email=$_POST['email'];
		if ($password == $password2 && $password!="") {
			// create user
			//$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO result(student_id,username,class_id,email,password,birth_date,phone,join_date) 
			VALUES('$student_id', '$username',$class_id,'$email','$password','$dob','$phone','$join_date')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			header("location: admin_panel.php"); //redirect to home page
		}else{ 
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>

<DOCTYPE html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style_ad.css">
		<style>
		.status-available{color:#2FC332;}
		.status-not-available{color:#D60202;}
		</style>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
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
  if (validate_required(student_id,"Student ID must be filled out!")==false)
  {  student_id.focus(); return false;}
  if (validate_required(username,"username must be filled out!")==false)
  {  username.focus(); return false;}
 if (validate_required(class_id,"class must be filled out!")==false)
  {  class_id.focus(); return false;}
  if (validate_required(email,"email must be filled out!")==false)
  {  email.focus(); return false;}
  if (validate_required(password,"password must be filled out!")==false)
  {  password.focus(); return false;}
  if (validate_required(password2,"password2 must be filled out!")==false)
  {  password2.focus(); return false;}
  if (validate_required(dob,"Date Of Birth must be filled out!")==false)
  {  dob.focus(); return false;}
  if (validate_required(join_date,"Join Date must be filled out!")==false)
  {  join_date.focus(); return false;}

  }
}

function checkAvailability() {
	jQuery.ajax({
	url: "check_availability.php",
	data:'student_id='+$("#student_id").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
	},
	error:function (){}
	});
}
</script>

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

<div id="formdiv">
	<?php
	if (isset($_SESSION['message'])) {
		echo "<center><div id='error_msg'>".$_SESSION['message']."</div></center>";
		unset($_SESSION['message']);
	}
?>
	
	<form method="post" id="font" onSubmit="return validate_form(this)" action="register.php">
	<label for="lstudentid">Student ID:</label>
    <input type="text" name="student_id" id="student_id" placeholder="Your name.."  class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>
    <br>
    <label for="luser">Username:</label>
    <input type="text"  name="username" placeholder="Username..">

	<label for="lpassword">Password:</label>
    <input type="password"  name="password" placeholder="Password..">

	<label for="lpasswordre">Retype Password:</label>
    <input type="password"  name="password2" placeholder="Retype Password..">

	 <label for="lclass">Class:</label>
    <input type="text"  name="class_id" placeholder="Class..">	

	 <label for="lemail">Email:</label>
    <input type="email"  name="email" placeholder="Email..">

	 <label for="lphone">Phone:</label>
    <input type="text"  name="phone" placeholder="Phone..">	

	 <label for="ldob">Date Of Birth:</label>
    <input type="date"  name="dob" >	

	<label for="ljoin">Join Date:</label>
    <input type="date"  name="join_date" >	
		
	<input type="submit" name="register_btn" value="Register"></td>
		
</form>



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