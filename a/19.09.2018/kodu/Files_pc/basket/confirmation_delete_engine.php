<?php
session_start();
include ("../css/connection/connect_database.php");
if(!@$_GET["order_id"])
{
	$order_id=0;
}
else
{
	$order_id=$_GET["order_id"];
}

if(!@$_GET["order_number"])
{
	$order_number=0;
}
else
{
	$order_number=$_GET["order_number"];
}

if(!@$_GET['basket_count'])
{
	$basket_count=0;
}
else
{
	$basket_count=$_GET["basket_count"];
}

$basket_count--;
$sql_order_delete="CALL `Delete_orders_Cange_order_number`(".$order_id.",".$_SESSION['customer_id'].");";
$result_order_delete = $mysqli->query($sql_order_delete);

ob_start();
		header("Location:../confirmation.php?order_number=".$order_number."&basket_count=".$basket_count."");
?>