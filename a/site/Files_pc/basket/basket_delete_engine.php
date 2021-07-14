<?php
include ("../css/connection/connect_database.php");
if(!@$_GET["basket_id"])
{
	$basket_id=0;
}
else
{
	$basket_id=$_GET["basket_id"];
}
$sql_basket_delete="DELETE FROM basket WHERE id = '".$basket_id."'";
$result_sql_basket_delete = $mysqli->query($sql_basket_delete);
ob_start();
header("Location:../basket.php?");
?>