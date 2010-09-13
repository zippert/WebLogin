<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv-SE" lang="sv-SE">
<head></head>
<body>
<?php
// This should be moved to the db
//$allowedHash = array("86f7e437faa5a7fce15d1ddcb9eaeaea377667b8");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM login;");
$hash = $_REQUEST[ID];

echo "Printout:<hr />";
$found = False;
while(($row = mysql_fetch_array($result)) && !$found){
	echo $row[0] . " == " . $hash . "<br />";
	if(($row[0] == $hash)){
		$found = True;
	}
}
echo "<hr />";

if($found){
header("Location: index.php?login=" . $hash); 
} else {
header("Location: start.html");
}


sql_close($con);
?>
</body>
</html>