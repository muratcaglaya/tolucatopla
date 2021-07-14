<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml<?php include 'css/version.php';?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Dynamic Bar Chart with jQuery and CSS" />
<meta name="keywords" content="Dynamic Bar Chart with jQuery and CSS" />
<title>Topluca Topla</title>
<link href="css/core.css<?php echo"?v=".$v ?>" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="css/images/tt.ico<?php echo"?v=".$v ?>">
<link rel="stylesheet" href="css/generalstyle.css<?php echo"?v=".$v ?>" type="text/css" media="all" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<link href="css/basket.css<?php echo"?v=".$v ?>" rel="stylesheet" />
<script src="css/js/jquery-1.6.2.min.js<?php echo"?v=".$v ?>" type="text/javascript"></script>
<script src="css/js/core.js<?php echo"?v=".$v ?>" type="text/javascript"></script>	
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
	<?php      
		include ("css/connection/connect_database.php");
		@$search_word=$_GET['search_word'];
		
		if(($search_word=="")OR(!$search_word))
			{
				echo $search_temp='<div class="content"></div><div id="main_products">ARAMA  BÖLÜMÜNE  ARAMAK  İSTEDİĞİNİZ  KELİMEYİ  YAZIN';
			}
			else
			{
				$sql="select p.id from products p 
				INNER JOIN category c ON p.category_id=c.id 
				WHERE p.name LIKE '%".$search_word."%' 
				OR p.company_name LIKE '%".$search_word."%' 
				OR p.kind_of LIKE '%".$search_word."%'
				OR c.category_name LIKE '%".$search_word."%';";
				@$result_product_id = $mysqli->query($sql);
				if(!$result_product_id)
					{
						echo $search_temp='<div class="content"></div><div id="main_products">BAĞLANTIDA YAŞANAN SORUNLAR İÇİN ÖZÜR DİLERİZ
						</br>SONRA TEKRAR DENEYİNİZ !!!';
					}
				else
				{
					if($result_product_id->num_rows==0)
					   	{
							echo $search_temp='<div class="content"></div><div id="main_products">ARAMA SONUÇUNUZA GÖRE EŞLEŞME YOKTUR
							</br>TEKRAR DENEYİNİZ !!!';
						}
						else
						{
							echo'<div id="main_products">';
							$temp=0;
							while($product_table=$result_product_id->fetch_assoc())
							{
							$temp++;
							$sql = 'SELECT * FROM pictures p,products pr where p.product_id=pr.id and pr.id='.$product_table["id"];
							$result = $mysqli->query($sql);
							$pictures_table=$result->fetch_assoc();
							$total=$pictures_table['target_number'];
							$current=$pictures_table['buy_amount'];
							$percent= round(($current/$total)*100,1);						
							echo ' 
								  	<div class="product">
										<a href="product_page.php?id='.$product_table["id"].'">
            								<div class="products_picture">                	
            									<img src="Products/products_images/'.$pictures_table['picture_path'].'" width="200px" height="200px" />
											</div>
           									<div class="products_expression">
                    							<div class="target_reached_word">
                        							Topluca alan kişi sayısı = '.$pictures_table['buy_number'].'
                    							</div>
                    							<div class="target_reached">											                        
                        							<ul id="chart">
														<li title="'.$percent.'" class="inner"><span class="bar"></span><span class="percent"></span></li>      
													</ul>          
                    							</div>
                    							<div class="product_introduction">
													<div class="target_reached_word">
														Toplanan '.$pictures_table['unit_0f'].' = ';?>
														<?php
								$current_array=explode(".",$current);
								$total_array=explode(".",$total);
							 	echo $current_array[0]."/".$total_array[0];
							 ?><?php echo '                    
													</div>
													<div class="product_info">
														'.$pictures_table['name'].'
														<br />
														'.$pictures_table['kind_of'].'
														<br />
														<br />
														';?><?php echo $pictures_table['unit_0f'].": "; ?><?php
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
	?><?php echo'
													</div>
													<div class="join_us">
														
													</div>
                    							</div>           
           									</div>
            							</a>    	
       								</div>       
      							  	';
							if($temp==2)
								{
									echo '</div><div id="main_products">' ;
								}
							}
						   
							
							
							
							
						}
				}		
			}
		?>
               	    
</div>    
</body>
</html>

		