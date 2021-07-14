<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml<?php include 'css/version.php';?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Topluca Topla</title>
<link rel="shortcut icon" type="image/x-icon" href="css/images/tt.ico<?php echo"?v=".$v ?>">
<link rel="stylesheet" href="css/generalstyle.css<?php echo"?v=".$v ?>" type="text/css" media="all" />
<link rel="stylesheet" href="css/product_page.css<?php echo"?v=".$v ?>" type="text/css" media="all" />
<link href="css/core.css<?php echo"?v=".$v ?>" rel="stylesheet" type="text/css" />
<link href="css/icon_browser.css<?php echo"?v=".$v ?>" rel="stylesheet" type="text/css" />
<link href="css/registration.css<?php echo"?v=".$v ?>" rel="stylesheet" type="text/css" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<link href="css/basket.css<?php echo"?v=".$v ?>" rel="stylesheet" />
<script src="css/js/jquery-1.6.2.min.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/core.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/phone.js<?php echo"?v=".$v ?>" type="text/javascript"></script>

</head>
<body>
	<div class="header">
      <div class="logo">
      	<a href="index.php">
        	<img src="css/images/logo.jpeg" width="100%" height="100%" />
        </a>
      </div>
      <div class="slogan">
      	<a href="index.php"></a>
      </div>
   	  <div class="search">
      	<form action='search_engine.php' method='get'>
   		  <div class="inputWithIcon">
  			  <input type="text" name='search_word' placeholder="Arama Yap">
			  <i class="fa fa-search" aria-hidden="true"></i>
       	 	  <input type='submit' id='search_button' value='Arama Yap'>         
		  </div>
         </form>
        <div id="slogan_kalite">
            	Kaliteyi Ucuza Alma Yöntemidir.
        </div>
      </div>
      <div class="saving_money">
      	<img src="css/images/saving_money.jpg" height="100%" width="100%" alt="" />
      </div>      
	</div>
    <div id="navigation">	 
		<ul>
			<li><a class="active" href="index.php?page=home">Anasayfa</a></li>
  			<li><a href="index.php?page=news">Haberler</a></li>
  			<li><a href="index.php?page=contact">İletişim</a></li>
  			<li><a href="index.php?page=about">Hakkımızda</a></li>
        	<li><a href="index.php?page=memberscompanies">Üye Firmalarımız</a></li>
        	<li><a href="index.php?page=referans">Referanslarımız</a></li>
             <div id="login_panel">
				<?php
				session_start();
								if(isset($_SESSION['name']))
								{
									echo '<div id="login_panel_basket">
									<a href="basket.php">
                                		<i class="demo-icon icon-basket">&#xe800;</i>
									</a>
                                </div>
                                <div id="login_panel_loginout">
                                	<a href="index.php?login=out">
                                		Çıkış
                                    </a>
                                </div>';
									echo '<div id="login_panel_customer_name">';
										echo $customer_name=$_SESSION['name'];
									echo '</div>';
									echo '<div id="login_panel_welcome_word">
                                	<i class="em em-smiley"></i>
                                	Hoş Geldiniz
                                </div>';
								}
								else
								{
									echo'<div id="login_panel_enter">
											<a href="registration.php?registration=sign_in">
												Giriş
											</a>
                                 		</div><div id="login_panel_register">
                                    <a href="registration.php?registration=sign_up">
                                        Kayıt
                                    </a>
                                </div>';
								}
                                
				?>
           </div>            
		</ul>
	</div>
    <div id="sign">
    <?php
	//navigatorden gelen 
		if(!@$_GET["id"])
		{	
			
			if(!@$_GET["registration"])
			{
				$registration="not";		
			}
			else
			{
				$registration=$_GET["registration"];
				if($registration=="sign_up")
				{
					include("registration/new_member.php");
				}
				elseif($registration=="sign_in")
				{
					include("registration/member.php");
				}
				elseif($registration=="forget")
				{
					include("registration/forget_password.php");
				}
				
			}
		}
		else
		{
				$product_id=$_GET["id"];
				if(!@$_GET["button"])
				{
					$button="not";
				}
				else
				{
					$button=$_GET["button"];
					if((@$_GET["registration"]=="sign_in")or(!@$_GET["registration"]))
					{
						include("registration/member.php");
					}
					elseif($_GET["registration"]=="sign_up")
					{
						include("registration/new_member.php");
					}
					elseif($_GET["registration"]=="forget")
					{
						include("registration/forget_password.php");
					}
					
				}
			}
				
	?>    
    </div>
    <div id="message">
    	<?php
			if((!@$_GET["message"])or($_GET["message"]=="not"))
			{
				
			}
			else
			{
				echo $message=$_GET["message"];
			}
		?>
    </div>
    
</body>
</html>

