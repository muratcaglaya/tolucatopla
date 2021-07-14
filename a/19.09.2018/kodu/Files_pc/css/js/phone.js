var telSTR="";
function writephone(object,e)
{
	
	if(e)
		{ 
			e = e 
		}
		else
		{
			e = window.event 
		}
		if(e.which)
		{ 
			var keycode = e.which 
		}
		else 
		{
			var keycode = e.keyCode 
		}
	telSTR=object.value;
	telSTR=telSTR.replace(/[^\d]*/gi,"");
	var themp="";
	for(i=0;i<telSTR.length;i++)
	{
		if(telSTR.charAt(i)>="0"&&telSTR.charAt(i)<="9")
		{
			themp=themp+telSTR.charAt(i);
		}		
	}
	var tempstring="";
	if(themp.length==1)
	{		
		if(themp.charAt(0)=="0")
		{			
			tempstring="0"+" "+"(";			
		}
		else
		{
			tempstring="0"+" "+"("+themp.charAt(0);
		}
	}
	if(themp.length==2)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.charAt(1);
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,2);
		}
	}
	if(themp.length==3)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,3);
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3);
		}
	}
	if(themp.length==4)
	{
		if(themp.charAt(0)=="0")
		{
			
			tempstring="0"+" "+"("+themp.substring(1,4)+")";			
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.charAt(3);			
		}
	}
	if(themp.length==5)
	{
		if(themp.charAt(0)=="0")
		{			
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,5);			
			
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,5);
			
		}
	}
	if(themp.length==6)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,6);		
		}
		else
		{			
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6);			
		}
	}
	if(themp.length==7)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,7);		
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6)+" "+themp.substring(6,7);			
		}
	}
	if(themp.length==8)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,7)+" "+themp.substring(7,8);		
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6)+" "+themp.substring(6,8);			
		}
	}
	if(themp.length==9)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,7)+" "+themp.substring(7,9);		
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6)+" "+themp.substring(6,8)+" "+themp.substring(8,9);			
		}
	}
	if(themp.length==10)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,7)+" "+themp.substring(7,9)+" "+themp.substring(9,10);		
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6)+" "+themp.substring(6,8)+" "+themp.substring(8,10);			
		}
	}
	if(themp.length>=11)
	{
		if(themp.charAt(0)=="0")
		{
			tempstring="0"+" "+"("+themp.substring(1,4)+")"+" "+themp.substring(4,7)+" "+themp.substring(7,9)+" "+themp.substring(9,11);		
		}
		else
		{
			tempstring="0"+" "+"("+themp.substring(0,3)+")"+" "+themp.substring(3,6)+" "+themp.substring(6,8)+" "+themp.substring(8,10);			
		}
	}
	
	object.value=tempstring;	
		
}
