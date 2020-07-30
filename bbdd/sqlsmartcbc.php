<?php
date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("localhost", "bbddsmartcbc", "Jas170174#") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bbddciudadanos");
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");
extract($_COOKIE);
extract($_POST);
extract($_GET);
?>