<?php
/*
$url=$_SERVER['REQUEST_URI'];
$parts=parse_url($url);
parse_str($parts['query'],$query);
$query=$_SERVER['QUERY_STRING'];*/
$query='abhay';
$researchlink='http://localhost/research.php?'.$query;
$bookslink='http://localhost/books.php?'.$query;
$workshopslink='http://localhost/workshops.php?'.$query;
$trainingSessionslink='http://localhost/trainingSessions.php?'.$query;
$awardslink='http://localhost/awards.php?'.$query;
$experiencelink='http://localhost/experience.php?'.$query;
?>

<?php
	
	error_reporting(0);

	include_once 'dbconnection.php';
	$conn=openconn();
	if(isset($_POST['chk'])=="")
	{
		?>
        <script>
		alert('At least one checkbox Must be Selected !!!');
		window.location.href='workshops.php';
		</script>
        <?php
	}
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Training Sessions</title>
<!--<link rel="stylesheet" href="style.css" type="text/css" />-->
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />-->
<link rel="stylesheet" type="text/css" href="vmenu.css">
<script src="jquery.js" type="text/javascript"></script>
<script src="jscriptt.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="main.css">
<style>
body{
font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
	font-size: 14px;
    line-height: 1.42857143;
}
.textp{color: #337ab7;}
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
    padding:6px 12px;width:130px;height:40px;color:white;
margin:1px;border:1px solid #00acd6;border-radius:3px;}*/
#heading:before,#heading:after{content:" ";display:table;}
heading{padding:2px;}

/*.p1{postion:relative;left:50%;top:2%;}*/
	#addrecords{
		color:white;
		display:block;
		width:100px;height:30px;
		background-color:blue;
		text-decoration:none;
		padding:4px 4px;
		border-radius:5px;
		
	}
	td{background-color:#f2dede;}
	#back{background-color:green;}
	#backn{background-color:red;}
	.container{position:absolute;
		top:20%;
		padding :2px;
		left:35%;}
		*{margin:0;}
		
		input{ width:100%;height:30px;border-radius:3px;-webkit-box-shadow: none;box-shadow:none;border:none;background-color:#f2dede;}
		
		.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}
		.btn{
display: inline-block;
    padding: 4px 8px;
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
#content{height:auto;overflow:auto;}
#s{position:absolute;top:70px;}
</style>

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


<br />

<div class="container">
<div class="container1">
<a href="addt.php" class="btn btn-large btn-info" id="addrecords"> &nbsp; Add Records</a>
</div>
<div id="content">
<form method="post" action="updatetrainings.php">
<table class='table table-bordered'>
<tr>
<td colspan=4 id="left" align:"center">Training Sessions</td>
</tr>
<tr>
<td id="left" class="textp" >
Title
</td>
<td id="left" class="textp" >
Role
</td>
<td id="left" class="textp">
Date
</td>
<td id="left" class="textp">
Description
</td>
</tr>
<?php

for($i=0; $i<$chkcount; $i++)
{
	$id = $chk[$i];		
		
	$res=$conn->query("SELECT * FROM trainingsessions where sno = '$id'");
	
	while($row=$res->fetch_array())
	{
		
		?>
		<tr>
		
		<td>
		<input type="hidden" name="id[]" value="<?php echo $row['sno'];?>" />
		<input type="text" name="title[]" value="<?php echo $row['title'];?>" class="form-control" required>
		</td>
		<td>
		<input type="text" name="role[]" value="<?php echo $row['role'];?>" class="form-control" required>
		</td>
		<td>
		<input type="date" name="date[]" value="<?php echo $row['date'];?>" class="form-control" required>
		</td>
        <td>
		<input type="text" name="description[]" value="<?php echo $row['description'];?>" class="form-control" required>
		</td>
		</tr>
		<?php	
	}			
}
?>
</table>
</div>
<div>

<button type="submit" name="savemul" class="btn btn-primary">&nbsp; Update all</button>&nbsp;
<a href="trainingSessions.php" class=" btn btn-danger" style="float:right";> &nbsp; cancel</a>

</div>

</form>

</div>
</body>
</html>