<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
“http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html>
<head>
<title>
AchievementForm
</title>
<style>
body{
font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
	font-size: 14px;
    line-height: 1.42857143;
	margin:0;
	
}
#head
{
	height:70px;
	width:auto; /* or width:auto*/
	background-color:#3c8dbc;
	text-align:center;
	postion:absolute;
	margin:0;
}
#form{border:1px solid orange;position:absolute;top:80px;width:100%;height:auto;overflow:hidden;}
#inform{left:40%; position:relative;width:382px;height:auto;    border-color: #5DADE2;margin:5px 0px;
    border-width: 2px;
    border-style: ridge;}
form{display:block;}
form > div{padding:12px;}
label{
display: inline-block;
    max-width: 100%;
    margin-bottom: 15px;
    font-weight:600;
}
.form-ele{
	position:relative;
	display:block;
	font-size:14px;
}
.form-cont{    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;}
.textp{color: #337ab7;}
.divlabel{font-weight:700;font-size:15px;}
.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}
.btn{
display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
	overflow:visible;
	border:1px solid #d43f3a;
	border-radius:4px;
	left:20%;
}
.text-center{text-align:center;}



</style>
</head>

<body>

<header id="head">

<h3 class="pl" style="color: #fff; font-size:20px">V-TOP</h3>
</header>
<div id="content">
<div id="form">
<div id="inform">
<form method="post"  enctype="multipart/form-data" name="achievementsEdit" id="achievementsEdit" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="form-ele"><span class="divlabel">
Research Papers</span><br/>
<input type="radio" id="1" name="papers" value="papers"/>
<label class="textp" for="1">Papers</label>
<input type="radio" id="2" name="conferences" value="conferences"/>
<label class="textp" for="2">Conferences</label>
<input type="radio" id="3" name ="journals" value="journals"/>
<label class="textp" for="3">Journals</label><br/>
<label class="textp" for="4">Description</label><br/>

<textarea class ="form-cont" id="4"style="width:100%;height:100px" name="rpdescription" ></textarea><br/>
<label class="textp" for="5">Upload Document</label><br/>
<input type="file" name="paperDoc" id="5"/><br/>

</div>
<div class="form-ele"><span class="divlabel">
Workshops</span><br/>
<input type="radio" id="6" name="wattended" value="wattended"/>
<label class="textp" for="6">Attended</label>
<input type="radio" id="7" name="wconducted" value="wconducted"/>
<label class="textp" for="7">Conducted</label><br/>
<label class="textp" for="8" name="wdescription" >Description</label><br/>
<textarea id="8" class ="form-cont" style="width:100%;height:100px" ></textarea><br/><br/>
<label class="textp" for="9">Upload Certificate</label><br>
<input type="file" name="workshopDoc" id="9"/><br/>
</div>
<div class="form-ele"><span class="divlabel">
Training Sessions</span><br/>
<input type="radio" name ="tattended" id="10" value="tattended"/>
<label class="textp" for="10">Attended</label>
<input type="radio" name ="tconducted" id="11" value="tconducted"/>
<label class="textp" for="11">Conducted</label><br/>
<label class="textp" for="12">Description</label><br/>
<textarea id="12" class ="form-cont" style="width:100%;height:100px"></textarea><br/><br/>
<label class="textp" for="13">Upload Certificate</label><br/>
<input type="file" name="trainingDoc" id="13"/><br/>
</div>
<div class="form-ele"><span class="divlabel">
Awards / Recognition<span><br/>
<label class="textp" for="14">Upload Certificate</label><br/>
<input type="file" name="awardDoc" id="14"/><br/>
</div>
<div class="form-ele"><span class="divlabel">
Books<span><br/>
<label class="textp" for="15">Upload Certificate</label><br/>
<input type="file" name="bookDoc" id="15"/><br/>
</div>
<div class="form-ele"><span class="divlabel">
Experience</span><br/>
<label class="textp" for="16">Description</label><br/>
<textarea id="16" class ="form-cont" style="width:100%;height:100px"></textarea>
</div>
<div class="form-ele" >
<input type="submit" class="btn btn-danger" name="submit" style="margin-left:38%;" value="Submit" />
</div>
</form>
</div>
</div>
</div>
</body>

</html>

<?php

if(isset($_POST['submit']))
{
	//echo "Hi";
	$directoryn=array("docs/papers/","docs/workshops/","docs/trainingSessions/","docs/awards/","docs/books/");
	$name=array('paperDoc','workshopDoc','trainingDoc','awardDoc','bookDoc');
/*	if(isset($_POST['paperDoc'])){$directory1="docs/papers/";}
	if(isset($_POST['workshopDoc'])){$directory2="docs/workshops/";}
	if(isset($_POST['trainingDoc'])){$directory3="docs/trainingSessions/";}
	if(isset($_POST['awardDoc'])){$directory4="docs/awards/";}
	if(isset($_POST['bookDoc'])){$directory5="docs/books/";}*/
	//if(isset($_POST['workshopDoc'])){$directory="docs/workshops/";}
	
	for($i=0;$i<5;$i++){
	$upload=0;
	if(isset($_POST[$name[$i]])){$directory=$directoryn[$i];echo "Hi";
	$finalfile=$directory.basename($_FILES[$name[$i]]['name'][$i]);
	$filesize=$_FILES[$name[$i]]['size'][$i];
	//echo $filesize;
	$fileextension1="docx";
	$fileextension2="doc";
	$fileextension3="pdf";
	$filename1=$_FILES[$name[$i]]['name'][$i];
	$filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	if($directory=="docs/"){echo "Select Teacher";$upload=1;}
	if($filetype!=$fileextension1 && $filetype!=$fileextension2 && $filetype!=$fileextension3 ) // || 
	{
		//move_uploaded_file($_FILES['ufile']['tmp_name'],$finalfile);
		echo "Only docx , dox , pdf files are allowed";
		$upload=1;
	}
	
	
	if($filesize>5242880){
		echo "File size is greater than 5 MB";
		$upload=1;
	}
	if(file_exists($finalfile)){
		echo "File Already exists";
		$upload=1;
	}
	
	if($upload==0)
	{
		if(move_uploaded_file($_FILES[$name[$i]]['tmp_name'][$i],$finalfile)){
			echo "File Uploaded Successfully";
		}
	}
	}
	}
}

?>