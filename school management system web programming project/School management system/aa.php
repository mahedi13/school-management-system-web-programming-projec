<?php 
	session_start();
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
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
			$sql = "INSERT INTO users(student_id,username,class_id,email,password,birth_date,phone,join_date) 
			VALUES('$student_id', '$username',$class_id,'$email','$password','$dob','$phone','$join_date')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: reg_done.php"); //redirect to home page
		}else{ 
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>
<DOCTYPE html>
	<html>
	<head>
		
		
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
</script>
	</head>
<body>

	<div id="Maindiv">
		
	
		

	<center>
	<div class="header"> 
	<h1>Register as student</h1>
	</div>
	</center>
	<?php
	if (isset($_SESSION['message'])) {
		echo "<center><div id='error_msg'>".$_SESSION['message']."</div></center>";
		unset($_SESSION['message']);
	}
?>

	<form method="post" onSubmit="return validate_form(this)" action="register.php">
	<table>
		<tr>
			<td><b>Student ID:</b></td>
			<td><input type="text" name="student_id" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Username:</b></td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Password:</b></td>
			<td><input type="password"  name="password" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Retype Password:</b></td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Class:</b></td>
			<td><input type="text" name="class_id" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Phone:</b></td>
			<td><input type="text" name="phone" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Date Of Birth:</b></td>
			<td><input type="date" name="dob" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Join Date:</b></td>
			<td><input type="date" name="join_date" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>



	</div>
</body>

	</html>