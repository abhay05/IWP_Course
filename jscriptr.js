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


function edit_recordsr() 
{
	
	document.frmr.action = "editresearch.php";
	document.frmr.submit();		
}
function delete_recordsr() 
{	
	
	document.frmr.action = "deleteresearch.php";
	document.frmr.submit();
}