<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
include ("../css/connection/connect_database.php");
if(!@$_GET["new_name"])
{
	$new_name="yok";
}
else
{
	$new_name=$_GET["new_name"];
}
if(!@$_GET["new_phone"])
{
	$new_phone="yok";
}
else
{
	$new_phone=$_GET["new_phone"];
}
if(!@$_GET["new_address"])
{
	$new_address="yok";
}
else
{
	$new_address=$_GET["new_address"];
}

	$sql_order_number="SELECT MAX(order_number) AS order_number FROM orders WHERE customer_id=".$_SESSION['customer_id']."";
	$result_order_number = $mysqli->query($sql_order_number);
	$new_result_order_number=$result_order_number->fetch_assoc();	
	$order_number=0;	
	if($new_result_order_number["order_number"]!="-1")
		{
			$order_number=$new_result_order_number["order_number"];
			$order_number++;
		}
	else
		{
			$order_number++;
		}
	
	
	
	
$sql_basket_id="select * from basket where customer_id=".$_SESSION['customer_id']." AND order_id=0";
$result_basket_id = $mysqli->query($sql_basket_id);
$temp_basket_count=0;
while($result_basket_id_table=$result_basket_id->fetch_assoc())
{
	
	$temp_basket_count=$temp_basket_count+1;
	
	$temp_basket_id="basket_".$result_basket_id_table["id"];
	$sql_basket_update_amount="UPDATE `basket` SET `amount` = '".$_GET[$temp_basket_id]."' , order_id = '1' WHERE `basket`.`id` =".$result_basket_id_table["id"]." ";
	$result_basket_update = $mysqli->query($sql_basket_update_amount);
	$mysqldate = date( 'Y-m-d');
	
	
	$sql_update_product="UPDATE products SET buy_amount=buy_amount+".$_GET[$temp_basket_id].",buy_number=buy_number+1  WHERE id=".$result_basket_id_table["product_id"]."";
	$result_update_product = $mysqli->query($sql_update_product);
	
	$sql_order_insert="INSERT INTO `orders` (`id`, `customer_id`, `basket_id`,`product_id`,`amount`, `order_comment`, `new_address`, `new_customer`,`new_phone`,`order_date`,`order_number`,`status`)
VALUES(NULL, '".$_SESSION['customer_id']."', '".$result_basket_id_table["id"]."','".$result_basket_id_table["product_id"]."','".$_GET[$temp_basket_id]."', 'Yok', '".$new_address."', '".$new_name."','".$new_phone."','".$mysqldate."','".$order_number."','1') ";
	$result_order_insert = $mysqli->query($sql_order_insert);
	
	
	
	$Procedure_product_id=intval($result_basket_id_table["product_id"]);
	$sql_orders_control="CALL `control_orders`(".$Procedure_product_id.",@out_value); ";
	$result_orders_control = $mysqli->query($sql_orders_control);
	
	$sgl_CallOutPut="SELECT @out_value";
	$resultCallOutPut=$mysqli->query($sgl_CallOutPut);
	$s=$resultCallOutPut->fetch_assoc();
	print_r($s);
	
		
}

		ob_start();

header("Location:../confirmation.php?order_number=".$order_number."&basket_count=".$temp_basket_count."&new_address=".$new_address."&new_name=".$new_name."&new_tel=".$new_tel."");
	



?>