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


function edit_recordsa() 
{
	
	document.frma.action = "editawards.php";
	document.frma.submit();		
}
function delete_recordsa() 
{	
	
	document.frma.action = "deleteawards.php";
	document.frma.submit();
}