<?php
function price($product_price) 
	{
	
	$new_price=str_replace(".",",",$product_price);
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
     if(@$new_price_array[1]!=0)                                      
       {
		 $new_price_char_array_second=str_split($new_price_array[1]);
	$new_price_char_array_second_len=count($new_price_char_array_second);
	$temp_new_price_second=array();
	$temp_second=0;
	$j_second=0;
	for($i=$new_price_char_array_second_len-1; $i>=0; $i--)
	{
		if(($new_price_char_array_second[$i]==0)&&($temp_second==0))
		{
		}
		else
		{
			$temp_new_price_second[$j_second]=$new_price_char_array_second[$i];
			$j_second++;
			$temp_second=1;
		}	
	}
	$last_new_price_array_second=array();
	$last_new_price_array_second=array_reverse($temp_new_price_second);
	$last_new_price_array_second_len=count($last_new_price_array_second);
	$last_new_price_second="";
	for($i=0;$i<$last_new_price_array_second_len;$i++)
	{
		$last_new_price_second=$last_new_price_second.$last_new_price_array_second[$i];	
	}              
         $last_new_price=$last_new_price.",".$last_new_price_second;                                   
       }                                         
                                            											 
   return $last_new_price." TL"; 
}

?>