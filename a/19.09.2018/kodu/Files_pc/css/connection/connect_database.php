<?php
 $mysql_hostname = "localhost";
 $mysql_username = "root";
 $dbpass = "";
 $db = "toplucatopla"; 
 @$mysqli = new mysqli($mysql_hostname, $mysql_username, $dbpass, $db);
 $sql = "SET NAMES UTF8";
 @$mysqli->query($sql);
if ($mysqli->connect_errno)
 {
   echo'Bağlanamadı:';
   exit;
 }
?>
