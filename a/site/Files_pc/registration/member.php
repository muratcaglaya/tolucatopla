<div id="sign_in">
    			<form action="registration/login_engine.php?<?php																
								if(!@$product_id)
								{
									
								}
								else
								{
									echo "&id=".$product_id."&button=".$button;
								}
								if(!@$_GET["amount"])
								{
									
								}
								else
								{
									echo "&amount=".$amount=$_GET["amount"];
								}
								?>" method="post" class="registration_form_style">
                    <fieldset>
                        <legend>Üye Girişi</legend>
                        <table class="registration_form_style">
                           <div class="inputWithIcon_member">
                                <input type="text" name="name" placeholder="İsminiz ve Soyadınız" required="required" minlength="2"/>
                                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                           </div>
                            <div class="inputWithIcon_member">
                                Veya
                           </div>
                           <div class="inputWithIcon_member">
                                <input type="email" name="email" required="required" placeholder="Email Adresiniz" />
                                <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>  
                        	</div>
                           <div class="inputWithIcon_member">
                                <input type="text" name="phone" onkeyup="javascript:writephone(this,event);" placeholder="Telefon Numaranız " 
                                required="required" pattern=".{17,17}" />
                                <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"></i> 
                          	</div>
                           <div class="inputWithIcon_member">
                                <input name="password" type="password" required="required" placeholder="Şifreniz" />
                                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>  
                           </div>
                        </table> 				
                        <div id="registration_buttons">
                            <div id="enter_registration_botton">
                                <a class="active" href="registration.php?registration=sign_up<?php								
								if(!@$product_id)
								{
									
								}
								else
								{
									echo "&id=".$product_id."&button=".$button;
								}
								if(!@$_GET["amount"])
								{
									
								}
								else
								{
									echo "&amount=".$amount=$_GET["amount"];
								}
								?>">
                                    <div class="registration_form_style">
                                        <input id="sign_up_button" type="button" value="Kayıt Ol">
                                    </div>
                                </a>
                            </div>                        
                            <div id="space_registration_botton">
                            </div>
                            <div id="enter_botton"> 				
                                <div class="registration_form_style">
                                    <input id="sign_in_button" type="submit" value="Giriş">
                                </div>
                            </div>
                        </div>                       
                    </fieldset>
                    	 <div id="forget_password_word">
                         	<a href="registration.php?registration=forget<?php
								$message="Şifrenizi Alabilmek için Hatırladığınız Bilgileri</br> Yandaki Bölümlere Doldurup Gönderin </br>Şifreniz Telefonunaz ve Mail adresine gönderilektir. !!!";
								echo"&message=".$message;
								if(!@$product_id)
								{
									
								}
								else
								{
									echo "&id=".$product_id."&button=".$button;
								}
								if(!@$_GET["amount"])
								{
									
								}
								else
								{
									echo "&amount=".$amount=$_GET["amount"];
								}
								?>">
                            	Şifremi Unuttum
                            </a>
                        </div>
				</form>
        	</div>