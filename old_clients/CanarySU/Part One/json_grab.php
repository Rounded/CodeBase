<?php
$myusername="root";
$password="root";
$dbhost="localhost";
$database="su_canary";
mysql_connect($dbhost,$myusername,$password);
mysql_select_db("$database");
?>
<?
$enrolledData = "{";
$query1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = 'current' AND COLUMN_NAME!='id'";
$result1 = mysql_query($query1);
$result1_rows = mysql_num_rows($result1);
$i = 1;

while($row1 = mysql_fetch_array($result1)) {
	$c = $row1["COLUMN_NAME"];
	$enrolledData.='"'.$c.'" : {';

	$query2 = "SELECT ".$c.",count(".$c.") AS col_num FROM current WHERE enrolled_current_term='Y' GROUP BY ".$c." ASC";
	$result2 = mysql_query($query2);
	$result2_rows = mysql_num_rows($result2);
	$z = 1;
	
	
	while($row2 = mysql_fetch_array($result2)) { 
		$enrolledData.= '"'.$row2[$c].'" : '.$row2[count($c)];
		if($result2_rows != $z) { $enrolledData.= ","; }
		$z++;
	}
	$enrolledData.= "}";
	if($result1_rows != $i) { $enrolledData.= ","; }
	$i++;


}
$enrolledData.="}";
?>


<?
$notEnrolledData = "{";
$query1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = 'current' AND COLUMN_NAME!='id'";
$result1 = mysql_query($query1);
$result1_rows = mysql_num_rows($result1);
$i = 1;

while($row1 = mysql_fetch_array($result1)) {
	$c = $row1["COLUMN_NAME"];
	$notEnrolledData.='"'.$c.'" : {';

	$query2 = "SELECT ".$c.",count(".$c.") AS col_num FROM current WHERE enrolled_current_term='N' GROUP BY ".$c." ASC";
	$result2 = mysql_query($query2);
	$result2_rows = mysql_num_rows($result2);
	$z = 1;
	
	
	while($row2 = mysql_fetch_array($result2)) { 
		$notEnrolledData.= '"'.$row2[$c].'" : '.$row2[count($c)];
		if($result2_rows != $z) { $notEnrolledData.= ","; }
		$z++;
	}
	$notEnrolledData.= "}";
	if($result1_rows != $i) { $notEnrolledData.= ","; }
	$i++;


}
$notEnrolledData.="}";
?>
<?
$enrolled = 7833;
$notEnrolled = 142;
?>