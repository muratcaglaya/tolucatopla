<?php
session_start();
$message="not";
if(!@$_GET["amount"])
{
	$amount="not";								
}
else
{
	$amount=$_GET["amount"];
}
if(!@$_GET['button'])
{
	$button="not";
}
else
{
	$button=$_GET['button'];
}
if(!@$_GET['id'])
{
	$id="not";
	
}
else
{
	$id=$_GET['id'];
	
}


if(!@$_POST['name'])
{
	$name="Who_is";
	
}
else
{
	$name=$_POST['name'];
}
if(!@$_POST['phone'])
{
	$phone="0 (111) 111 11 11";
	
}
else
{
	$phone=$_POST['phone'];
}
if(!@$_POST['email'])
{
	$email="who_is@toplucatopla.com";
	
}
else
{
	$email=$_POST['email'];
}
if(!@$_POST['password'])
{
	$password="12345678";
	
}
else
{
	$password=$_POST['password'];
}

include ("../css/connection/connect_database.php");
$sql_id_name='select id,name from customers where (name="'.$name.'" OR email="'.$email.'") AND phone="'.$phone.'" AND password="'.$password.'";';
$result_id_name_array = $mysqli->query($sql_id_name);
$new_result_id_name=$result_id_name_array->fetch_assoc();
if($new_result_id_name['id']=="")
{
	
	if($button=="not")
	{
		$message="Girdiğiniz Bilgiler Hatalı Olmuş olabilir</br> Tekrar Deneyin !!!";
		ob_start();
		header("Location:../registration.php?registration=sign_in&message=".$message);
	}
	else
	{
		$message="Girdiğiniz Bilgiler Hatalı Olmuş olabilir</br> Tekrar Deneyin !!!";
		ob_start();
		header("Location:../registration.php?registration=sign_in&button=".$button."&id=".$id."&message=".$message."&amount=".$amount);
	}
}
else
{
	
	$_SESSION['name'] = $new_result_id_name['name'];
	$_SESSION['customer_id']=$new_result_id_name['id'];	
	$_SESSION['product_id'] = $id;
	if($button!="not")
	{
		$_SESSION['add_now_button']=$button;
		ob_start();
		if($button=="add")
		{
			header("Location:../basket/basket_engine.php?button=".$button."&id=".$id."&amount=".$amount);
		}
		else
		{
			header("Location:../basket.php?button=".$button."&id=".$id."&amount=".$amount);
		}
		
	}
	else
	{		
		ob_start();
		header("Location:../index.php");
	}
}
?>
