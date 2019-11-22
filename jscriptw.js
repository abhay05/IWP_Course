// JavaScript Document


//  for select / deselect all

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


//window.onload()=function(){


 

//  page redirect on user click edit/delete
function edit_records() 
{
	
	document.frmw.action = "edit_workshops.php";
	document.frmw.submit();		
}
function delete_records() 
{	
	
	document.frmw.action = "deleteworkshops.php";
	document.frmw.submit();
}



//  page redirection