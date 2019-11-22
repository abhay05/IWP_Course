$('document').ready(function()
{
    $(".select-all").click(function ()
    {
        $('.chk-box').attr('checked', this.checked)
    });
        
    $(".chk-box").click(function()
    {
        if($(".chk-box").length == $(".chk-box:checked").length)
        {
            $(".select-all").attr("checked", "checked");
        }
        else
        {
            $(".select-all").removeAttr("checked");
        }
    });
});


function edit_recordst() 
{
	
	document.frmt.action = "edittrainings.php";
	document.frmt.submit();		
}
function delete_recordst() 
{	
	
	document.frmt.action = "deletetrainings.php";
	document.frmt.submit();
}