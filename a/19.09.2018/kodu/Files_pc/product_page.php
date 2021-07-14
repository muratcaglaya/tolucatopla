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
<script src="css/js/next_swapimage.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/phone.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/timer.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/change_action.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
</head>
<body onload="MM_preloadImages('Products/products_images/ali_seker/toz_seker_1.jpg','Products/products_images/ali_seker/toz_seker_2.jpg','Products/products_images/ali_seker/toz_seker_3.jpg')">
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
    <div id="main_products_page">    	
        	<?php
				include ("css/connection/connect_database.php");
				if(isset($_GET['id']))
				{
					$product_id= $_GET['id'];
				}
				else
				{
					$product_id=1;
				}
				$sql="SELECT * FROM pictures p,products pr where p.product_id=pr.id and pr.id=".$product_id." ORDER BY p.id ASC";
				$result = $mysqli->query($sql);
				$pictures_table=$result->fetch_assoc();
				$pictures1=$pictures_table["picture_path"];
			?>
        	<div class="picture_main">
            	<div class="big_picture">
                    <div class="next_icon">
                        <a href="javascript:;" onclick="next()">
                        	<img src="Products/products_images/<?php echo $pictures1?>" name="big" width="500px" height="400px" id="big"/>
                        </a>
                        <a href="javascript:;" onclick="next()">
                            <i id="left_icon" class="fa fa-angle-left fa-4x" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:;" onclick="previous()">
                            <i id="right_icon" class="fa fa-angle-right fa-4x" aria-hidden="true"></i>
                        </a>   
                  	</div>
                </div>
                <div class="small_pictures">
                    <div class="small_picture">
                        <a href="javascript:;" onclick="MM_swapImage('big','','Products/products_images/<?php echo $pictures1;?>',1)">
                            <img src="Products/products_images/<?php echo $pictures1;?>" width="149px" height="149px" id="small_one" border="0" />
                         </a>
                     </div>
                    <?php
                        $pictures_table=$result->fetch_assoc();
                        $pictures2=$pictures_table["picture_path"];
                    ?>
                    <div class="small_picture">
                        <a href="javascript:;" onclick="MM_swapImage('big','','Products/products_images/<?php echo $pictures2;?>
                        ',1)">
                            <img src="Products/products_images/<?php echo $pictures2;?>" width="149px" height="149px" id="small_two" border="0" />
                        </a>
                    </div>
                    <?php
                        $pictures_table=$result->fetch_assoc();
                        $pictures3=$pictures_table["picture_path"];
                    ?>
                    <div class="small_picture">
                        <a href="javascript:;" onclick="MM_swapImage('big','','Products/products_images/<?php echo $pictures3; ?>',1)">
                            <img src="Products/products_images/<?php echo $pictures3; ?>" width="149px" height="149px" id="small_three" border="0" />
                        </a>
                    </div>
            	</div>
            </div>
            <div class="infomation_main">
                <div id="opportunity">
                	<div id="product_kind_of">
                    	<?php echo $pictures_table['kind_of'] ?>
                    </div>
                    <div id="opportunity_image">
                    	<img src="css/images/opportunity.jpg" width="148" height="60px" />
                    </div>
                    <div id="opportunity_timer">
                    	<div id="opportunity_timer_top">
                    		Kampanyanın Başlama Tarihi: 
							<?php $product_date=$pictures_table['Product_time_start'];?>
                            <?php echo $new_product_date=substr($product_date,8,2)."/".substr($product_date,5,2)."/".substr($product_date,0,4);?>
                        </div>
                        <div id="opportunity_timer_bottom">
                        	<span id="ny_date" data-value="<?php echo $pictures_table['product_time_end'];?>">Kalan Süre</span>
                        </div>
                    </div>
                </div>
                <div id="main_product_and_other_product">
                	<form id="form_id" method="get">
                        <div id="product_info_big">
                            <?php								
                                            $total=$pictures_table['target_number'];
                                            $current=$pictures_table['buy_amount'];
                                            $percent= round(($current/$total)*100,1);
                            ?>
                            <div class="target_reached_word">
                                        Topluca alan kişi sayısı = <?php echo $pictures_table['buy_number'];?>
                            </div>                    
                            <div class="target_reached">                            
                                <ul id="chart">
                                        <li title="<?php echo $percent; ?>" class="inner"><span class="bar"></span><span class="percent"></span></li>
                                </ul>             
                            </div>                
                            <div class="product_introduction">
                                <div class="target_reached_word">
                                    Hedef <?php echo $pictures_table['unit_0f'] ?> = <?php
                                    $current_array=explode(".",$current);
                                    $total_array=explode(".",$total);
                                    echo $current_array[0]."/".$total_array[0];
                                 ?>                   
                                </div> 
                                <div id="space_10">
                                </div>
                                <div id="product_info_top">
                                    <?php echo $pictures_table['name'] ?>
                                </div>
                                <div id="space_10">
                                </div>                
                                <div id="product_info">                            	
                                    <div id="space_10">
                                    </div>                                
                                    <div id="product_info_bottom">
                                        <?php echo $pictures_table['unit_0f']." Fiyatı : "; ?><?php
                                           $new_price=str_replace(".",",",$pictures_table['price']); 
                                           $new_price_array=explode(",",$new_price);
                                           $new_price_char_array=str_split($new_price_array[0]);
                                           $new_price_array_len=count($new_price_char_array);
                                           $temp_new_price=array();
                                           $temp=0;
                                           $j=0;
                                           for($i=$new_price_array_len-1;$i>=0; $i--)
                                           {
                                               if($temp<3)
                                               {		   
                                                   $temp_new_price[$j]=$new_price_char_array[$i];
                                                   $temp++;		    
                                                }
                                                else
                                               {
                                                    $temp_new_price[$j]=".";
                                                    $j++;
                                                    $temp_new_price[$j]=$new_price_char_array[$i];
                                                    $temp=1;			
                                                }		
                                                $j++;  
                                            }
                                            $last_new_price_array=array();
                                            $last_new_price_array=array_reverse($temp_new_price);
                                            $last_new_price_array_len=count($last_new_price_array);
                                            $last_new_price="";
                                            for($i=0;$i<$last_new_price_array_len;$i++)
                                            {		
                                             $last_new_price=$last_new_price.$last_new_price_array[$i];		 
                                            }
                                            if($new_price_array[1]!=0)
                                            {
                                                $last_new_price=$last_new_price.",".$new_price_array[1];
                                            }	 
                                            echo $last_new_price." TL";
                                        ?>
                                    </div>
                                </div>
                            </div>                    
                            <div id="amount_place">
                                <div id="amount_inside_all_left">
                                    <div id="amount_inside_top">
                                        <div class="amount_word">
                                           <?php echo $pictures_table['unit_0f']." :" ?>
                                        </div>
                                        <div class="amount_text_box">
                                            <input id="amount" placeholder="1" name="amount" value="1"/>
                                        </div>
                                    </div>                                
                                    <div id="amount_inside_bottom">
                                    </div>
                                </div>
                                <div id="amount_inside_all_right">
                                    <img src="css/images/kargo_bedava.jpg" width="100" height="50" />
                                </div>
                            </div>
                            <div class="buttons">                    
                                <div class="add_basket_button_box">
                                    <?php
									
                                        if(isset($_SESSION['name']))
                                        {
                                            $page="basket/basket_engine.php";
                                        }
                                        else
                                        {
                                            $page="registration.php";
                                        }
                                    ?>
                                    	<input type="hidden" name="id" value="<?php echo $product_id; ?>" />
                                   		<input type="hidden" id="button" name="button" />
                                        <input id="add_button" type="submit" onclick="changevalue_add_button('<?php echo $page;?>')" class="add_basket_button" value="Sepete Ekle"  />
                                  
                                </div>
                                <div class="now_buy_button_box">
                                   
                                        <input id="now_button"onclick="changevalue_now_button('<?php echo $page;?>')"type="submit" class="now_buy_button" value="Hemen Al"/>
                                    
                                </div>               
                            </div>
                            <div id="space_10">
                            </div>
                            <div id="production_explanation_databases">
                                <div id="production_explanation_databases_left">
                                    <fieldset>
                                    <legend>Açıklama</legend>
                                        <?php echo $pictures_table['explanation_of_product'];?>
                                    </fieldset>
                                </div>
                                <div id="production_explanation_databases_right">
                                </div>
                            </div>                                
                        </div>
                        <div id="other_product">
                        
                            
                        </div>
                    </form>
                </div>             
        	</div>
    	
	</div>
</body>
</html>

