<?php
session_start();
$pe_db = mysqli_connect("localhost", "root", "", "authentication");
if(isset($_SESSION['a_username'])){
	if (isset($_POST['present'])) {
		//$username = mysql_real_escape_string($_POST['username']);
		//$email = mysql_real_escape_string($_POST['email']);
		//$password = mysql_real_escape_string($_POST['password']);
		//$password2 = mysql_real_escape_string($_POST['password2']);
		$pe_student_id=$_POST['pe_student_id'];
		$pe_class_id=$_POST['pe_class_id'];
		$p_date=$_POST['p_date'];
		$p_status=$_POST['p_status'];
			$pe_sql = "INSERT INTO attendence(student_id,class_id,p_date,status) 
			VALUES('$pe_student_id',$pe_class_id,'$p_date','$p_status')";
			mysqli_query($pe_db, $pe_sql);
			$_SESSION['pe_student_id'] = $pe_student_id;
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

	<form method="post" id="font" onSubmit="return validate_form(this)" action="ad_attendence.php">
    <label for="fname">Student ID:</label>
    <input type="text"  name="pe_student_id" placeholder="Student ID..">

    <label for="lclass">Class:</label>
    <select  name="pe_class_id">
      <option value="1">ONE</option>
      <option value="2">TWO</option>
      <option value="3">THREE</option>
      <option value="4">FOUR</option>
      <option value="5">FIVE</option>
    </select>

    <label for="lpresent">Present Date:</label>
    <input type="date"  name="p_date" >

    <label for="lstatus">Status:</label>
     <select  name="p_status">
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    </select>

    <input type="submit" name="present" value="Submit Attendence">
  </form>

		</div>
	</div>


	</body>

	</html>

	<?php
}
else{
	echo "shah";
	//echo "<script>window.open('admin.php','_self)</script>";
	header("location: admin.php");
}
?>