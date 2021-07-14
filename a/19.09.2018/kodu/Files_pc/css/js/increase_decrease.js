// JavaScript Document

function increase(id)
{
	
	var amount_id="amount"+id;
	var sum_item_value_id="sum_item_value"+id;
	var number_id="number"+id;
		if(document.getElementById(amount_id).value<100)
			{
				var amount=document.getElementById(amount_id).value;
				var price_id="price"+id;
				var price=document.getElementById(price_id).value;
				var general_sum_hidden=document.getElementById("general_sum_hidden").value;
				general_sum_hidden=parseFloat(general_sum_hidden);			
				price=parseFloat(price);				
				amount=parseFloat(amount);
				general_sum_hidden=general_sum_hidden+price;				
				amount=amount+1;				
				var sum_of_product=amount*price;
				
				document.getElementById("general_sum_hidden").value=general_sum_hidden;
				document.getElementById(amount_id).value=amount;
				document.getElementById(number_id).innerHTML = amount;
				
				general_sum_hidden=String(general_sum_hidden);
				general_sum_hidden=change_price(general_sum_hidden);
				sum_of_product=String(sum_of_product);
				sum_of_product=change_price(sum_of_product);
				
				
				document.getElementById("general_sum").innerHTML=general_sum_hidden+" TL";	
				document.getElementById(sum_item_value_id).innerHTML=sum_of_product+" TL";
			}
			else
			{
				document.getElementById("number").innerHTML ="MAX";
			}
					
	
}
function decrease(id)
{
	var amount_id="amount"+id;
	var sum_item_value_id="sum_item_value"+id;
	var number_id="number"+id;
		if(document.getElementById(amount_id).value>0)
			{
				var amount=document.getElementById(amount_id).value;
				var price_id="price"+id;
				var price=document.getElementById(price_id).value;
				var general_sum_hidden=document.getElementById("general_sum_hidden").value;
				general_sum_hidden=parseFloat(general_sum_hidden);			
				price=parseFloat(price);				
				amount=parseFloat(amount);
				general_sum_hidden=general_sum_hidden-price;				
				amount=amount-1;				
				var sum_of_product=amount*price;
				
				document.getElementById("general_sum_hidden").value=general_sum_hidden;
				document.getElementById(amount_id).value=amount;
				document.getElementById(number_id).innerHTML = amount;
				
				general_sum_hidden=String(general_sum_hidden);
				general_sum_hidden=change_price(general_sum_hidden);
				sum_of_product=String(sum_of_product);
				sum_of_product=change_price(sum_of_product);
				
				
				document.getElementById("general_sum").innerHTML=general_sum_hidden+" TL";	
				document.getElementById(sum_item_value_id).innerHTML=sum_of_product+" TL";
			}
			else
			{
				
			}
}

function change_price(price)
{
	price = price.replace(".", ",");
	var temp_str=price.split(",");
	var first_temp=temp_str[0];
	
	if(temp_str[1]===undefined)
	{
		var second_temp="";
	}
	else
	{
		var second_temp=","+temp_str[1];
	}
	
	first_temp_len=first_temp.length;
	var new_price="";
	
	var number_temp=0;
	
	var array_price=Array.from(first_temp);
	
	for(i=first_temp_len-1;i>=0;i--)
	{
		if(number_temp<3)
		{
			new_price=new_price+array_price[i];
			number_temp++;
		}
		else
		{
			new_price=new_price+"."+array_price[i];
			number_temp=1;
		}
			
	}
	var last_price="";
	var new_price_array=Array.from(new_price);
	for(i=new_price.length-1;i>=0;i--)
	{
		last_price=last_price+new_price_array[i];
	}
	last_price=last_price+second_temp;
	return last_price;
	
}

