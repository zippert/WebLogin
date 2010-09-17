<html>
<body>

<?php
$hash = $_REQUEST[hash];
echo "<br /><b>hash: " . $hash . "</b><br />";
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
  echo "<a href=\"checklogin.php?hash=" . $hash . "&redirect=delete&params=fName:" . $row['FirstName'] . ",lName:" . $row['LastName'] . ",age:" . $row['Age'] . "\">";
  echo "<img src=DeleteIcon.gif></a>";
	
  echo "<br />";
  }

mysql_close($con);

echo "<hr />";
echo "<form action=\"insert.php?hash=" . $hash . "\" method=\"post\">";
?>


Firstname: <input type="text" name="firstname" />
Lastname: <input type="text" name="lastname" />
Age: <input type="text" name="age" />
<input type="submit" value="Add"/>
</form>

</body>
</html>