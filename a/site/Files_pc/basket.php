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
    <div id="basket_panel">
    	<form  method="get">   	
    	<?php
			$message="Sepete Hiç Bir Ürün Yoktur.!!!";
			include ("css/connection/connect_database.php");
			///
			$sql_customer_basket="SELECT * FROM `basket` WHERE `customer_id`=".$_SESSION['customer_id']." AND `order_id`=0";
			$result_customer_basket_array = $mysqli->query($sql_customer_basket);
			$new_result_customer_basket=$result_customer_basket_array->fetch_assoc();
			
			if($new_result_customer_basket["id"]=="")
			{
				echo'<div id="basket_panel_no_product_word">
						'.$message.'
						</br>
						</br>
						</br>
						<a href="index.php">
							Ana Sayfa Dön
						</a>
        			</div>';
			}
			else
			{	
				$totalprice=0;
				$basket_number=0;
				///
				$sql_customer="SELECT * FROM `customers` WHERE `id`=".$_SESSION['customer_id']."";
				$result_customer_array = $mysqli->query($sql_customer);
				$new_result_customer=$result_customer_array->fetch_assoc();
				///
				
				include 'function/price.php';
								
				$sql_customer_basket="SELECT * FROM `basket` WHERE `customer_id`=".$_SESSION['customer_id']." AND `order_id`=0";
				$result_customer_basket_array = $mysqli->query($sql_customer_basket);
				
				echo '<div id="basket_panel_left">';
				while ($new_result_customer_basket=$result_customer_basket_array->fetch_assoc())
				{
					$basket_number++;
					$sql_product="SELECT * FROM pictures p,products pr 
						  WHERE p.product_id=pr.id and pr.id=".$new_result_customer_basket["product_id"]." 
						  ORDER BY p.id ASC";
					$result_product = $mysqli->query($sql_product);
					$product_table=$result_product->fetch_assoc();
					$totalprice=$totalprice+$product_table["price"]*$new_result_customer_basket["amount"];
					echo '<div id="basket_line">
           		 		  </div>
						  <div id="basket_panel_row">
							<div id="basket_panel_small_picture">
								<a href="product_page.php?id='.$new_result_customer_basket["product_id"].'">
								<img src="Products/products_images/'.$product_table["picture_path"].'" width="144px" height="144px" id="small_two" border="0" />
								</a>
							</div>
							<div id="basket_panel_info">
								<div id="basket_panel_product_name">
									<div id="basket_panel_product_name_left">
										Ürün Adı: &nbsp'. $product_table["name"].'
									</div>
									<div id="basket_panel_product_name_right">
										<a href="basket/basket_delete_engine.php?basket_id='.$new_result_customer_basket["id"].'">
											<div id="basket_panel_product_delete_word">                            	
												Sil                                
											</div>
										</a>                        	
									</div>
								</div>
								<div id="basket_panel_product_company">
									Üretici Firma: &nbsp'.$product_table["company_name"].'
								</div>
								<div id="basket_panel_product_price">
									<div id="basket_panel_product_price_left">
										<div id="price"> 
											<div id="unit_price">
												Birim Fiyat: &nbsp'.price($product_table["price"]*1).'
											</div>                			
											<div id="sum_item">
												<div id="sum_item_word">
													Toplam: &nbsp
												</div>
												<div id="sum_item_value'.$new_result_customer_basket["id"].'">
												';
													
														$new_price=$product_table["price"]*$new_result_customer_basket["amount"];
														echo price($new_price);
													
											   echo'</div>                                	
											</div>																												
										</div>
										<div id="item">
											'.$product_table['unit_0f'].' :
										</div>
									</div>
									<div id="basket_panel_product_price_right">
										<input type="hidden" id="price'.$new_result_customer_basket["id"].'" value="'.$product_table["price"].'">
							<input type="hidden" name="basket_'.$new_result_customer_basket["id"].'" id="amount'.$new_result_customer_basket["id"].'" value="'.$new_result_customer_basket["amount"].'" />
										<a href="javascript:;" onclick="increase(\''.$new_result_customer_basket["id"].'\')">
											<div id="basket_panel_product_price_right_plus">                            	
													<i class="fa fa-plus fa-1x"></i>                                
											</div>
										</a>
										<div id="basket_panel_product_price_right_item">
											<div id="number'.$new_result_customer_basket["id"].'">                                	
												'.$new_result_customer_basket["amount"].'
											</div>                            	
										</div>
										<a href="javascript:;" onclick="decrease(\''.$new_result_customer_basket["id"].'\')">
											<div id="basket_panel_product_price_right_minus">
												<i class="fa fa-minus fa-1x"></i>
											</div>
										</a>
									</div>
								</div>                	
							</div>
						</div>
						<div id="basket_line">
						</div>
						<div id="row_space_14">                    
						</div>';
				}
				echo '</div>';
				?>
        <div id="basket_panel_right">        	
        	<div id="basket_panel_right_top">
            	<div id="basket_panel_right_top_left">
                </div>
                <div id="basket_panel_right_top_right">
                	<div id="basket_line">
            		</div>                	
                    	<input type="submit" value="Siparişi Onayla" id="basket_panel_right_top_right_top" formaction="basket/confirmation_engine.php" />           
                    <div id="basket_panel_right_sum_info">
                    	<div id="basket_panel_right_sum_left">
                        	<div id="basket_number_word">
                        		Sepetdeki Ürün Saysı
                            </div>
                            <div id="basket_number_word">
                            	<?php echo $basket_number; ?>
                            </div>
                        </div>
                        <div id="basket_panel_right_sum_right">
                        	<div id="basket_number_word">
                            	Genel Toplam Tutar
                            </div>
                            <input type="hidden" id="general_sum_hidden" value="<?php echo $totalprice; ?>" />
                        	<div id="basket_number_word">
                            	<div id="general_sum">
                            		<?php echo price($totalprice); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="basket_line">
            		</div>
                    <div id="row_space_14">
                    
                    </div>
                    <div id="basket_panel_right_top_right_bottom_address">
                    	<div id="customer_info_word">
                        	<i class="fa fa-user" aria-hidden="true"></i>
                        	Alıcı Bilgisi:
                        </div>
                        <div id="customer_info">
                        	<div id="info_name">
                            	Alıcı: <?php echo $new_result_customer["name"]?>
                            </div>
                            <div id="info_tel">
                            	Telefonu: <?php echo $new_result_customer["phone"] ?>
                            </div>                           
                        </div>
                        <div id="new_customer">                        	
                                <input type="text"  placeholder="İsim Soyadı" name="new_name" id="new_name" />
                                <input type="text"  placeholder="Telefon" name="new_phone" id="new_tel" onkeyup="javascript:writephone(this,event);"/>
                                <input type="button" value="Kayıt Et" id="new_customer_button" onclick="changed_customer()"/>         	
                        </div>
                       	<div id="Change_word">
                         	<a href="javascript:;" onclick="change_area_customer('new_customer')">
                        		Alıcı Değişikliği&nbsp;
                            </a>
                        </div>                    	
                    </div>                    
                    <div id="row_space_14">                    
                    </div>
                    <div id="basket_panel_right_top_right_bottom_address">
                    	<div id="address_word">
                        	<i class="fa fa-address-card fa-lg fa-fw" aria-hidden="true"></i>
                        	Alıcı Adres Bilgisi:
                        </div>
                        <div id="address">
                        	 <?php echo $new_result_customer["address"]?>                            
                        </div>
                        <div id="new_address">                        	
                   			<textarea name="new_address"  placeholder="Adresiniz" rows="5" cols="44" id="new_address_textarea"></textarea>
                            <input type="button" value="Kayıt Et" id="new_address_button" onclick="changed_address()"/>
                        </div>                       
                        <div id="Change_word">
                        	<a href="javascript:;" onclick="change_area_address('new_address')">
                        		Adres Değişikliği&nbsp;
                            </a>
                        </div>                    	
                    </div>
                </div>
            </div>        
           </div>
                <?php								 					
			}			
		?>       
        
        </form>
    </div>   
</body>
</html>
