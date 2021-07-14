var temp_address=0;
var temp_customer=0;

function hide_address(id){
		var divObject=document.getElementById(id);
		divObject.style.display="none";
	}	
function show_address(id){
		var divObject=document.getElementById(id);
		divObject.style.display="block";
	}

function change_area_address(id){
		if(temp_address==0)
		{
			show_address(id);
			temp_address=1;
		}
		else
		{
			hide_address(id);
			temp_address=0;
		}
	}
	

function hide_customer(id){
		var divObject=document.getElementById(id);
		divObject.style.display="none";
	}
	
function show_customer(id){
		var divObject=document.getElementById(id);
		divObject.style.display="block";
	}

function change_area_customer(id){
		if(temp_customer==0)
		{
			show_customer(id);
			temp_customer=1;
		}
		else
		{
			hide_customer(id);
			temp_customer=0;
		}
	}
function changed_customer(){
		var new_name=document.getElementById('new_name').value;
		var new_tel=document.getElementById('new_tel').value;
		if((new_address=="")&&(new_tel==""))
		{
			hide_customer('new_customer');
			temp_customer=0;
		}
		else
		{
			document.getElementById('info_name').innerHTML='Alıcı: '+new_name;
			document.getElementById('info_tel').innerHTML='Telefonu: '+new_tel;
			hide_customer('new_customer');
			temp_customer=0;
		}		
	new_customer
	
	}
	
function changed_address(){	
		var new_address=document.getElementById('new_address_textarea').value;
		if(new_address=="")
		{
			hide_address('new_address');
			temp_address=0;
		}
		else
		{
			document.getElementById('address').innerHTML=new_address;
			hide_address('new_address');
			temp_address=0;
		}		
	}