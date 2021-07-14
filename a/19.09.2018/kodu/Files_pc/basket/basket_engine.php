<?php
session_start();
if(!@$_GET["amount"])
{
	$amount=1;								
}
else
{
	$amount=$_GET["amount"];
}

if(!@$_GET['id'])
{
	$product_id=1;
	
}
else
{
	$product_id=$_GET['id'];
	
}
if(!@$_GET['button'])
{
	$button="add";
	
}
else
{
	$button=$_GET['button'];
	
}
include ("../css/connection/connect_database.php");
$sql_conrol_basket="select * from basket where customer_id=".$_SESSION['customer_id']." AND product_id=".$product_id." AND order_id=0 ";
$result_conrol_basket= $mysqli->query($sql_conrol_basket);
$new_result_conrol_basket=$result_conrol_basket->fetch_assoc();
if($new_result_conrol_basket["id"]=="")
{
	$sql_insert_basket="INSERT INTO basket (`id`, `customer_id`, `product_id`, `amount`,`order_id`) 
	  	VALUES (NULL, '".$_SESSION['customer_id']."', '".$product_id."', '".$amount."', '0');";
	$result_sql_insert_basket = $mysqli->query($sql_insert_basket);
	
	ob_start();
	if($button=="add")
	{
		header("Location:../product_page.php?id=".$product_id."");
	}
	else
	{
		header("Location:../basket.php?");
	}
}
else
{
	$temp_amount=$new_result_conrol_basket["amount"]+$amount;
	$sql_update_basket="UPDATE `basket` SET `amount` =".$temp_amount." WHERE id =".$new_result_conrol_basket["id"]."";
	$result_sql_update_basket = $mysqli->query($sql_update_basket);
	ob_start();
	if($button=="add")
	{
		header("Location:../product_page.php?id=".$product_id."");
	}
	else
	{
		header("Location:../basket.php?");
	}
}




	  	
?>