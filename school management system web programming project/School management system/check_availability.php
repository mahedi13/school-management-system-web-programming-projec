<?php
//require_once("dbcontroller.php");
//$db_handle = new DBController();
	//$db = mysqli_connect("localhost", "root", "", "authentication");
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('authentication') or die("cannot select db");


if(!empty($_POST["student_id"])) {
  $result = mysql_query("SELECT count(*) FROM users WHERE student_id='" . $_POST["student_id"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Student ID Not Available.</span>";
  }else{
      echo "<span class='status-available'> Student ID Available.</span>";
  }
}
?>