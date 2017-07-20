<?php
session_start();
$re_db = mysqli_connect("localhost", "root", "", "authentication");
if(isset($_SESSION['a_username'])){
	if (isset($_POST['ad_result'])) {
		//$username = mysql_real_escape_string($_POST['username']);
		//$email = mysql_real_escape_string($_POST['email']);
		//$password = mysql_real_escape_string($_POST['password']);
		//$password2 = mysql_real_escape_string($_POST['password2']);
		$re_student_id=$_POST['re_student_id'];
		$re_class_id=$_POST['re_class_id'];
		$re_subject=$_POST['re_subject'];
		$re_marks=$_POST['re_marks'];
			$re_sql = "INSERT INTO result(student_id,class_id,subject,marks) 
			VALUES('$re_student_id',$re_class_id,'$re_subject',$re_marks)";
			mysqli_query($re_db, $re_sql);
			$_SESSION['re_student_id'] = $re_student_id;
			header("location: admin_panel.php"); //redirect to home page
		}
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
				<li><a href="ad_result.php"><button class="button button2">Update Results</button></a></li>
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

	<form method="post" id="font" onSubmit="return validate_form(this)" action="ad_result.php">
    <label for="fname">Student ID:</label>
    <input type="text"  name="re_student_id" placeholder="Student ID..">

    <label for="lclass">Class:</label>
    <select  name="re_class_id">
      <option value="1">ONE</option>
      <option value="2">TWO</option>
      <option value="3">THREE</option>
      <option value="4">FOUR</option>
      <option value="5">FIVE</option>
    </select>

    <label for="country">Subject:</label>
    <select id="country" name="re_subject">
      <option value="Bangla">Bangla</option>
      <option value="English">English</option>
      <option value="Math">Math</option>
      <option value="Science">Science</option>
      <option value="Arts">Arts</option>
    </select>

    <label for="lname">Marks:</label>
    <input type="text"  name="re_marks" placeholder="Marks..">

    <input type="submit" name="ad_result" value="Submit Result">
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