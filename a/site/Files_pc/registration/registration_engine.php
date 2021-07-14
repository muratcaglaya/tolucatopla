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
	$temp=1;
}
else
{
	$phone=$_POST['phone'];
}
if(!@$_POST['email'])
{
	$email="who_is@toplucatopla.com";
	$temp=1;
}
else
{
	$email=$_POST['email'];
}
if(!@$_POST['address'])
{
	$address="where_is";
	$temp=1;
}
else
{
	$address=$_POST['address'];
}
if(!@$_POST['password'])
{
	$password="12345678";
	$temp=1;
}
else
{
	$password=$_POST['password'];
}
include ("../css/connection/connect_database.php");
$sql_id_email='select id,email from customers where email="'.$email.'"';
$result_id_email_array = $mysqli->query($sql_id_email);
$result_id_email=$result_id_email_array->fetch_assoc();

if($result_id_email["email"]==$email)
{
	$message="Bu Email Adresi İle Daha Önce Kayıt Yapılmış  ";
	if($button=="not")
	{
		
		ob_start();
		header("Location:../registration.php?registration=sign_up&message=".$message);
	}
	else
	{		
		ob_start();
		header("Location:../registration.php?registration=sign_up&button=".$button."&id=".$id."&message=".$message."&amount=".$amount);
	}
}
else
{
	$sql_id_phone='select id,phone from customers where phone="'.$phone.'"';
	$result_id_phone_array = $mysqli->query($sql_id_phone);
	$result_id_phone=$result_id_phone_array->fetch_assoc();
	if($result_id_phone["phone"]==$phone)
	{
		
		$message="Bu Telefon İle Daha Önce Kayıt Yapılmış  ";
		if($button=="not")
		{
			ob_start();
			header("Location:../registration.php?registration=sign_up&message=".$message);
		}
		else
		{
			ob_start();
			header("Location:../registration.php?registration=sign_up&button=".$button."&id=".$id."&message=".$message."&amount=".$amount);
		}
	}
	else
	{
		$sql="INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `password`,`email`) 
	  	VALUES (NULL, '".$name."', '".$address."', '".$phone."', '".$password."','".$email."');";
	  	$result = $mysqli->query($sql);
		$sql_id='select id from customers where name="'.$name.'" AND phone="'.$phone.'" AND password="'.$password.'" AND email="'.$email.'";';
		$result_id = $mysqli->query($sql_id);
		$result_id_arry=$result_id->fetch_assoc();
		echo "id:".$new_result_id=$result_id_arry["id"];
		
			$_SESSION['name'] = $name;
			$_SESSION['customer_id']=$result_id;
			$_SESSION['add_now_button']=$button;
			
			if($button!="not")
			{
				ob_start();
				header("Location:../basket.php?button=".$button."&id=".$id."&amount=".$amount);
			}
			else
			{
				ob_start();
				header("Location:../index.php");
			}
	}	
}














	

?>