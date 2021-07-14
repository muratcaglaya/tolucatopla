<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml<?php include 'css/version.php';?>"<?php include ("css/connection/connect_database.php");
?>>
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

<!-- düzelt-->
<link href="css/confirmation.css" rel="stylesheet" type="text/css" />
<link href="css/basket.css" rel="stylesheet" />
<script src="css/js/jquery-1.6.2.min.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/core.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/phone.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<!-- düzelt-->
<script src="css/js/increase_decrease.js" type="text/javascript"></script>
<script src="css/js/openchange.js" type="text/javascript"></script>
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
    <div id="confirmation">
    	<?php
			if($_GET['basket_count']!=0)
			{  
		?>
				<?php
                    include 'function/price.php';
                    date_default_timezone_set('Europe/Istanbul');
                    $order_number=$_GET["order_number"] ;
                    $sql_customer="SELECT * FROM `customers` WHERE id=".$_SESSION['customer_id']."";
                    $result_customer = $mysqli->query($sql_customer);
                    $new_result_customer=$result_customer->fetch_assoc();
                    $sql_order="SELECT o.id,o.customer_id,o.basket_id,o.product_id,o.amount,o.order_comment,o.new_address,o.new_customer,o.new_phone,o.order_date,o.order_number,o.status,s.status_word  FROM orders o INNER JOIN status s ON o.status=s.id WHERE customer_id=".$_SESSION['customer_id']." AND order_number=".$order_number."";			
                    $result_order = $mysqli->query($sql_order);
                ?>
                <div id="top_space">
                </div>
                <div id="main_order">
                    <div id="order">
                        <div id="order_word">
                            Sipariş Bilgisi
                        </div>
                        <div id="order_inside">
                            <div id="order_customer_info">
                                <div id="order_customer_name">
                                    Müşteri: <?php echo $new_result_customer["name"];?>
                                </div>
                                <div id="order_phone">
                                    Telefon: <?php echo $new_result_customer["phone"];?>
                                </div>
                                <div id="order_time">
                                    Tarih: <?php echo date('d-m-Y') ?>
                                </div>
                            </div>
                            <div id="order_line">
                            </div>
                            <div id="order_inside_word_production">
                                Ürünler:(<?php echo $_GET['basket_count']; ?>)
                            </div>
                            <div id="order_line">
                            </div>                    
                            <div id="order_productionss">
                                <?php
                                    $product_number=1; 
                                    $total_sum=0;
                                    $temp_order_new_customer="";
                                    $temp_order_new_phone="";
                                    $temp_order_new_address="";
                                    while($new_result_order=$result_order->fetch_assoc())
                                    {
                                        $temp_order_new_customer=$new_result_order["new_customer"];
                                        $temp_order_new_phone=$new_result_order["new_phone"];
                                        $temp_order_new_address=$new_result_order["new_address"];
                                        $sql_order_product="SELECT * FROM `products` WHERE id=".$new_result_order["product_id"]." ";
                                        $result_order_product = $mysqli->query($sql_order_product);
                                        $new_result_order_product=$result_order_product->fetch_assoc();
                                ?>
                                    <div id="order_inside_number">
                                            <?php echo $product_number.".".$new_result_order_product["kind_of"];?>:
                                        </div>
                                        <div id="order_inside_info">
                                            <div id="order_inside_info_word">
                                                <div id="order_inside_info_word_left">
                                                    <?php echo $new_result_order_product["name"]; ?> 
                                                </div>
                                                <div id="order_inside_info_word_right">
                                                    <div id="order_inside_info_word_right_amount">
                                                        Miktar : <?php echo $new_result_order['amount'];?>                                            
                                                    </div>
                                                    <div id="order_inside_info_word_right_price">
                                                        Birim Fiyat: <?php echo price($new_result_order_product["price"]); ?> 
                                                    </div>                        	 
                                                </div>
                                            </div>
                                            <?php
                                                $total=$new_result_order_product['target_number'];
                                                $current=$new_result_order_product['buy_amount'];
                                                $percent= round(($current/$total)*100,1);
                                            ?>                            
                                            <div id="order_inside_status">
                                                <div id="order_inside_status_left">
                                                    Hedef <?php echo $new_result_order_product['unit_0f']; ?> = <?php echo $current."/".$total; ?> 
                                                </div>
                                                <div id="order_inside_status_right">
                                                    <div class="target_reached">                            
                                                        <ul id="chart">
                                                            <li title="<?php echo $percent; ?>" class="inner"><span class="bar"></span><span class="percent"></span></li>
                                                        </ul>             
                                                    </div> 
                                                </div>
                                                <a href="basket/confirmation_delete_engine.php?order_id=<?php echo $new_result_order["id"]; ?>&order_number=<?php echo $new_result_order["order_number"] ?>&basket_count=<?php echo $_GET['basket_count'];?>">
                                                    <div id="order_inside_status_delete">                            	
                                                        Sil                                
                                                    </div>
                                                </a>  
                                                <div id="order_inside_status_word">
                                                    <div id="order_inside_status_word_left">
                                                        Durum:
                                                    </div>
                                                    <div id="order_inside_status_word_right">
                                                       <?php echo $new_result_order['status_word']; ?>
                                                    </div>                            	 
                                                </div>                                                       
                                            </div>                                                  
                                        </div>
                                        <div id="order_inside_sum">
                                            <?php  $total_sum=$total_sum+$new_result_order_product["price"]*$new_result_order['amount'];?>                   	
                                            Ara Toplam: <?php echo price($new_result_order_product["price"]*$new_result_order['amount']); ?> 
                                        </div>
                                <?php
                                        echo'<div id="order_inside_line">
                                             </div>';
                                        $product_number++;
                                    }
                                    
                                ?>
                            </div>                   
                            <div id="order_line">
                            </div>
                            <div id="general_sum">
                                GENEL TOPLAM: <?php echo price($total_sum);  ?>
                            </div> 
                            <div id="order_address_word_production">
                                Adres:
                            </div>                    
                            <div id="order_address_inside_border">
                                <div id="order_address_inside">
                                    <?php echo $new_result_customer["address"]; ?>                         
                                </div>
                            </div>
                            <?php
                                if($temp_order_new_customer!="yok")
                                {
                                    ?>
                                     <div id="order_new_customer_word">
                                        <div id="order_customer_info">
                                        <div id="order_customer_name">
                                            Alıcı: <?php echo $temp_order_new_customer;?>
                                        </div>
                                        <div id="order_phone">
                                            Telefon: <?php echo $temp_order_new_phone;?>
                                        </div>                            
                                    </div>
                                    <div id="order_line">
                                    </div>                         
                                    </div>
                                     <div id="order_address_word_production">
                                        Adres:
                                    </div>
                                    <div id="order_address_inside_border">
                                        <div id="order_address_inside">
                                          <?php echo $temp_order_new_address; ?>                          
                                        </div>
                                    </div>
                                    <?php
                                }            
                            ?>                                       
                        </div>
                        <div id="order_foot">
                            
                        </div>
                    </div>
                </div>
        <?php
			}
			else
			{
				echo'<div id="confirmation_order_mesaj">
						Onaylanmış Hiç bir Alış-Veriş Yoktur.
						</br>
						</br>
						</br>
						<a href="index.php">
							Ana Sayfa Dön
						</a>
					 </div>';
				
			}
		?>    	
    </div>
</body>
</html>