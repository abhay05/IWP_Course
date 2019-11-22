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


function edit_recordsb() 
{
	
	document.frmb.action = "editbooks.php";
	document.frmb.submit();		
}
function delete_recordsb() 
{	
	
	document.frmb.action = "deletebooks.php";
	document.frmb.submit();
}