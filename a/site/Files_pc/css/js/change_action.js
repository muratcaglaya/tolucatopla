 function changevalue_add_button(action)
    {
		
		document.getElementById('button').value="add";
        document.getElementById('form_id').action = action;
        document.getElementById('form_id').submit();
    }
	function changevalue_now_button(action)
	{
	
		document.getElementById('button').value="now";
        document.getElementById('form_id').action = action;
        document.getElementById('form_id').submit();
		
	}// JavaScript Document