<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$db="studentportal";
$link = mysql_connect($servername,$username,$password);
if (!$link) {
	die('could not connect ' . mysql_error());
} else {
	$db_selected = mysql_select_db($db);
	if (!$db_selected) {
		die('could not connect '. mysql_error());
}
}
?>