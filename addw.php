<?php
$url=$_SERVER['REQUEST_URI'];
$parts=parse_url($url);
parse_str($parts['query'],$query);
$query=$_SERVER['QUERY_STRING'];
$username=$query;
$researchlink='http://localhost/research.php?'.$query;
$bookslink='http://localhost/books.php?'.$query;
$workshopslink='http://localhost/workshops.php?'.$query;
$trainingSessionslink='http://localhost/trainingSessions.php?'.$query;
$awardslink='http://localhost/awards.php?'.$query;
$experiencelink='http://localhost/experience.php?'.$query;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add workshops</title>
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />-->
<script src="jquery.js" type="text/javascript"></script>
<script src="js-script.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="vmenu.css">
<link rel="stylesheet" type="text/css" href="main.css">
<style>
body{
font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
	font-size: 14px;
    line-height: 1.42857143;
}
#box{position:absolute;left:35%;}
td{padding:10px;}
#left{background-color:#d4d3d3;}
#right{background-color:#f2dede;}
#forms{position:relative;}
#box{border:1px solid #00acd6;top:16%;}
#buttons{position:relative;text-align:center;color:white;text-decoration:none;
background-color: #00c0ef;
    padding:6px 12px;
margin:5px;border:1px solid #00acd6;border-radius:3px;}
/*button{    background-color: #00c0ef;
    padding:6px 12px;width:100px;height:30px;text-align:center;
margin:5px;border:1px solid #00acd6;border-radius:3px;}*/
#heading:before,#heading:after{content:" ";display:table;}
heading{padding:2px;}

/*.p1{postion:relative;left:50%;top:2%;}*/
	/*a{
		color:white;
		display:block;
		width:100px;height:30px;
		background-color:blue;
		text-decoration:none;
		padding:4px 4px;
		border-radius:5px;
		
	}*/
	#back{background-color:green;color:white;
		display:block;
		width:100px;height:30px;
		
		text-decoration:none;
		padding:4px 4px;
	border-radius:5px;}
	#backn{background-color:red;
	color:white;
		display:block;
		width:100px;height:30px;
		
		text-decoration:none;
		padding:4px 4px;
	border-radius:5px;}
	.container{position:absolute;
		top:30%;
		padding :2px;
		left:35%;}
		*{margin:0;}
		#s{position:absolute;top:70px;}
</style>
<link rel="stylesheet" type="text/css" href="vmenu.css">
</head>

<body>

<header id="head">

<h3 class="pl" style="color: #fff; font-size:20px">V-TOP</h3>

<form id="frm" name="frm" method="post">
<div id="logout" >
<button name="signout">Logout</button>
<!--<div id="dp" class="dropdown">
<div id="image">

</div>
<div id="lg">
Logout
</div>
</div>-->
</div>
</form>
<?php
if(isset($_POST['signout'])){
	session_destroy();
	header('Location:RealVT.php');
}
?>

</header>

<div id="s">
<ul>
<li><a href="#"><span id="s1">Research</span>
<ul>
<li><a href="<?php echo $researchlink;?>"><span class="ss1">Papers</span></a></li>
</ul>
</li>
<li><a href="<?php echo $bookslink;?>"><span class="ss1">Books</span></a></li>
<li><a href="<?php echo $workshopslink;?>"><span class="ss1">Workshops</a></span></li>
<li><a href="<?php echo $trainingSessionslink;?>"><span class="ss1">Training Sessions</a></span></li>
<li><a href="<?php echo $awardslink;?>"><span class="ss1">Awards</a></span></li>
<li><a href="<?php echo $experiencelink;?>"><span class="ss1">Experience</a></span></li>
</ul>
</div>


<div class="container">
<div class="container1" style="margin:14px 7px;">
<a href="<?php echo $workshopslink;?>" class="btn btn-large btn-info" id="back"> &nbsp; View Data</a>
</div>
<form method="post" action="addworkshops.php?">
<input type="text" name="username" value="<?php echo $username;?>" readonly>
<table class='table table-bordered'>

<tr>
<td>Enter how many records you want to insert</td>
</tr>

<tr>
<td>
<input type="text" name="no_of_rec" style="width:100%;height:30px;border-radius:5px;" placeholder="required records" maxlength="2" pattern="[0-9]+" class="form-control" required />
</td>
</tr>

<tr>
<td><button type="submit" name="btn-gen-form" class="btn btn-primary">&nbsp; Generate</button> 

<a href="<?php echo $workshopslink;?>" class="btn btn-large btn-success" id="backn">&nbsp; Back to index</a>
</td>
</tr>

</table>

</form>

</div>
</body>
</html>