<html>
<head></head>
<body>
<?php
$con = mysql_connect("localhost","root","root");
$fName = $_REQUEST[fName];
$lName = $_REQUEST[lName];
$age = $_REQUEST[age];
$hash = $_REQUEST[hash];

$sql="DELETE FROM Persons WHERE FirstName='$fName' AND LastName='$lName' AND Age='$age'";

echo $sql;

mysql_select_db("my_db", $con);
mysql_query($sql);

mysql_close($con);

header("Location: checklogin.php?hash=" . $hash . "&redirect=index");
?>

</body>
</html>