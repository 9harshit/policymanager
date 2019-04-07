<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = $age = $bgroup = $medical = $pid  = $mid ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$bgroup = $_POST['bgroup'];
	$medical= $_POST['medical'];
	$pid= $_POST['pid'];
	$mid = $_GET['id'];
}
$sql = "SELECT * FROM medical where pid= $pid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	 {
		if($name == "")
			$name = $row["name"];
		if($age == "")
			$age = $row["age"];
		if($bgroup == "")
			$bgroup= $row["bgroup"];
		if($medical == "")
			$medical= $row["medical"];
	 }
}
	$sql = "UPDATE medical SET name= '$name' , age= '$age' , bgroup= '$bgroup', medical= '$medical'  WHERE   pid = '$pid' ";

	
if ($conn->query($sql) === TRUE) {
    echo "Policy edited";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #e24a4a;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  opacity:0.8 ;
}

hr {
  border: 1px solid lightgrey;
}


hr{color : #4CAF50; }

.active {
  background-color: #4CAF50;
  color: white;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
   background-color: #f2f2f2;
}

li {
  float: left;
}

li a {
  display: block;
  
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
   background-color: #f2f2f2;
  color: black;
  display: block;
 
  cursor: pointer;
}

li a:hover {
  background-color: #ccc;
}
li a:active {
 background-color: #e24a4a;;
}
.menu
{
	border: 1px solid lightgrey;
  border-radius: 3px;
}


</style>
<script>
function go()
	{
		window.open(" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/account.php?id=$mid" ;?> ","_top");
		
	}

</script>
</head>
<body >
<form action="updatemedical.php" method="post">
<div class="menu">
<ul>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatevehicle.php?id=$mid" ; ?>">Vehicle</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatelife.php?id=$mid" ; ?>">Life</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatemedical.php?id=$mid" ; ?>">Medical</a></li>
 
</ul>
</div>
  <br>

<b>
	
    <div class="container">
      <form action="updatemedical.php" method = "POST">
			  
	 <label for="id">Policy ID</label>
             <input type="text" id="pid" name="pid" required>
	<label for="Name"><b>Name of Person</b></label>
    <input type="text" name="name" >
	
	<label for="Age"><b>Age Of Person</b></label>
    <input type="text"  name="age"   >

    <label for="blood"><b>Blood Group</b></label>
    <input type="text"  name="bgroup"  >

    <label for="disease"><b>Previous Medical History</b></label>
    <input type="text"  name="medical" >
	<input type="submit" value="Update Information" class="btn" onclick="go()" >
      </form>
  
  </div>
<br>

</div>

</div>
</body>
</html>