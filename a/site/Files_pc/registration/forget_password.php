<div id="forget_password">
    			<form action="registration/forget_password_engine.php?button=<?php
				 if(!@$button)
					{
						echo "not";
					}
					else
					{
						echo $button;
					}; 
					?>&id=
					<?php  
					if(!@$product_id)
					{
						echo "not";
					}
					else
					{
						echo $product_id."&amount=".@$_GET["amount"];
					}; 
					?>" method="post"; class="registration_form_style">
                    <fieldset>
                      <legend>Şifre Alma İşlemi</legend>
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
                        
                                           
                      </table> 
                      <div id="new_enter_registration_botton"> 
                          <div class="registration_form_style">
                               <input id="fotget_password_button" type="submit" value="Gönder">
                           </div>
                      </div>
                    </fieldset>
				</form>
           
        	</div>