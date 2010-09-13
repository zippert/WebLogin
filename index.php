<html>
<body>

<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM Persons");

echo "<b>Current entries:</b><br /><br />";
while($row = mysql_fetch_array($result))
  { 
  
  echo $row['FirstName'] . " " . $row['LastName'] . " " . $row['Age'];
  echo "<a href=\"delete.php?fName=" . $row['FirstName'] . "&lName=" . $row['LastName'] . "&age=" . $row['Age'] . "\">
	<img src=DeleteIcon.gif>
	</a>";
  echo "<br />";
  }

mysql_close($con);
?>

<hr />
<form action="insert.php" method="post">
Firstname: <input type="text" name="firstname" />
Lastname: <input type="text" name="lastname" />
Age: <input type="text" name="age" />
<input type="submit" value="Add"/>
</form>

</body>
</html>