<?php
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
include ("../css/connection/connect_database.php");
$sql_password='select id,password,email from customers where (name="'.$name.'" OR email="'.$email.'") AND phone="'.$phone.'" ;';
$result_password_array = $mysqli->query($sql_password);
$new_result_password=$result_password_array->fetch_assoc();
if($new_result_password["id"]=="")
{
	
	if($button=="not")
	{
		$message="Girdiğiniz Bilgiler Hatalı Olmuş olabilir</br> Tekrar Deneyin !!!";
		ob_start();
		header("Location:../registration.php?registration=forget&message=".$message);
	}
	else
	{
		$message="Girdiğiniz Bilgiler Hatalı Olmuş olabilir</br> Tekrar Deneyin !!!";
		ob_start();
		header("Location:../registration.php?registration=forget&button=".$button."&id=".$id."&message=".$message."&amount=".$amount);
	}
}
else
{
	echo $to = $new_result_password["email"];	
	echo "</br>";
	echo $subject = "Şifreniz";
	echo "</br>";
	echo $txt =$new_result_password["password"];
	echo "</br>";
	echo $headers = "muratcaglayan425@gmail.com";
	echo "</br>";
	require("../mail/class.phpmailer.php");
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
	$mail->Host = "smtp.yandex.com"; // Mail sunucusuna ismi
	$mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username = "toplucatopla@yandex.com"; // Mail adresimizin kullanicı adi
	$mail->Password = "Fnjpk22?pk!.."; // Mail adresimizin sifresi
	$mail->SetFrom("toplucatopla@yandex.com", "WebMaster"); // Mail attigimizda gorulecek ismimiz
	$mail->AddAddress($to); // Maili gonderecegimiz kisi yani alici
	$mail->Subject =$subject ; // Konu basligi
	$mail->Body = "Kayıtlı Şifreniz: ".$txt; // Mailin icerigi
	if(!$mail->Send())
	{
    	echo "Mailer Error: ".$mail->ErrorInfo;
	} 
	else
	{
    	echo "Mesaj gonderildi";
	}
	
}
?>
