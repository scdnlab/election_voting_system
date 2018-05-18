<?php
$conf = array
(
	"host" => "mysql.weberz.com",
	"user" => "blood_user2",
	"pass" => "2kl24f008f",
	"name" => "blood_intranet"
);
$link = mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die ("Unable to connect to the MySQL Database: " . mysql_error());
mysql_select_db($conf['name']) or die ("Unable to connect to the MySQL Database: " . mysql_error());
?>
