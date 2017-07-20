<?php

if(isset($_POST['search']))
{
	$valueToSearch = $_POST['val'];
	$query = "SELECT * FROM result WHERE student_id LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);
}
else{
	$query = "SELECT * FROM result";
	$search_result = filterTable($query);
}
function filterTable($query)
{
	$connect = mysqli_connect("localhost","root","","authentication");
	$filter_Result = mysqli_query($connect,$query);
	return $filter_Result;
}
?>
<!DOCTYPE html>
<html>
<head>
<title> result </title>
<style>
body
{
	font-family: sans-serif;
	font-size: 11pt;
	background-image: url('background_school.jpg');
	background-size: cover;
	background-attachment: fixed;
}
table
{width:80%;}
table,tr,td,th
{
	border: 1px solid black;
	border-collapse: collapse;
	opacity: 0.95;
}
th,td
{
	padding:10px;
	text-align:center;
}
th
{
	background-color: gray;
	color:white;
}
tr:nth-child(even)
{
	background-color:#e8e8e8;
}
tr:nth-child(odd)
{
	background-color:white;
}
h1
{
	font-size: 10;
	color: black;
}
#search
{
   width: 150px;
   padding : 7px;
   border: 1px solid #607d8b;
   text-align: left;
   color:black;
   background-color:rgba(208, 191, 16, 0.76);
   border-radius: 4px;
   
}

#submit
{
	padding: 7px;
	background: #607d8b;
	border: 2px solid #607d8b;
	color: white;
	margin-left: -5px;
	cursor: pointer;
	border-radius: 4px;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius:4px;
}

.button1 {
    background-color: gray; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<center> <h1>STUDENTS RESULT </h1> </center>
<a href="home.php"><button class="button button1"><b>HOME</b></button></a><br><br>
<form action="result.php" method="post">
<input type="text" name="val" id="search" placeholder="Student ID..."><br></br>
<input type="submit" name="search" id="submit" value="Search"><br></br>
<center>
<table>
<tr>
<th>Student ID</th>
<th>Class</th>
<th>Subject</th>
<th>Marks</th>
</tr>
<?php while($row = mysqli_fetch_array($search_result)):?>
<tr>
<td><?php echo $row['student_id'];?></td>
<td><?php echo $row['class_id'];?></td>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['marks'];?></td>
</tr>
<?php endwhile;?>
</table>
</center>
</form>
</body>
</html>