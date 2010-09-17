<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv-SE" lang="sv-SE">
<head></head>
<body>
<?php

function checkHash($hash){
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM login;");

$found = False;
while(($row = mysql_fetch_array($result)) && !$found){
	if(($row[0] == $hash)){
		$found = True;
	}
}

mysql_close($con);

return $found;
}


function reparse($params){
	if($params == ""){
		return "";
	}
	return "&" . str_replace(",", "&", str_replace(":", "=", $params));
}

$hash = $_REQUEST[hash];
$redirect = $_REQUEST[redirect];
$additionalParams = $_REQUEST[params];

if(checkHash($hash)){
	header("Location: " . $redirect . ".php?hash=" . $hash . reparse($additionalParams)); 		
} else {
header("Location: start.html");
}
?>
</body>
</html>