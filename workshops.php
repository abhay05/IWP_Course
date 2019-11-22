<?php
/*$url=$_SERVER['REQUEST_URI'];
$parts=parse_url($url);
parse_str($parts['query'],$query);
$query=$_SERVER['QUERY_STRING'];*/
$username='abhay';
$researchlink='http://localhost/research.php?';//.$query;
$bookslink='http://localhost/books.php?';//.$query;
$workshopslink='http://localhost/workshops.php?';//.$query;
$trainingSessionslink='http://localhost/trainingSessions.php?';//.$query;
$awardslink='http://localhost/awards.php?';//.$query;
$experiencelink='http://localhost/experience.php?';//.$query;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
“http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html>
<head>
<title>
Workshops
</title>
<link rel="stylesheet" type="text/css" href="vmenu.css">
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
button{    background-color: #00c0ef;
    padding:6px 12px;
margin:5px;border:1px solid #00acd6;border-radius:3px;}
#heading:before,#heading:after{content:" ";display:table;}
heading{padding:2px;}
#head
{
	height:70px;
	width:100%; /* or width:auto*/
	background-color:#3c8dbc;
	text-align:center;
	position:relative;
	
}
/*.p1{postion:relative;left:50%;top:2%;}*/
	a{
		text-color:white;
		display:block;
		color:blue;
	}
	#content{height:400px;overflow:auto;}
	#options{margin-top:20px;}
	#logout{position:absolute;
	bottom:0px;right:0px;
	background-color:#3c8dbc;width:100px;height:40px;color:white;text-align:center;display:block;
	pointer-events:auto;}
	.dropdown{
		width:150px;
		height:100p
		display:none;
		position:absolute;
		background-color:black;
		top:0px;
		right:0px;
	}
	.show{
		display:block;
	}
</style>
<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />-->
<!--<script src="jquery.js" type="text/javascript"></script>-->
<script src="jquery.js" type="text/javascript"></script>
<script src="jscriptw.js" type="text/javascript"></script>

</head>
<body style="background-color">
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


<div id="box">

<div id="heading" style="font-size:20px">
Workshops
</div>

<div id="form">
<a href="<?php echo 'addw.php?'.$username;?>" class="btn btn-large btn-info" id="buttons"> &nbsp; Update</a>
</div>

<form method="post" name="frmw">
<input type="text" name="username" value="<?php echo $username;?>" readonly>
<div id="content">
<table>
<tr>
<td colspan=5 id="left" align:"center">Workshops</td>
</tr>
<tr>
<td id="left">
Title
</td>
<td id="left">
Role
</td>
<td id="left" >
Date
</td>
<td id="left" >
Description
</td>

<td id="left" >
Update/Edit
</td>
<!--<td rowspan=2 id="right">
<!--<input type="submit" value="View" name="viewp"/>
</td>-->
</tr>

<?php
	include 'dbconnection.php';
	$conn=openconn();
	$res = $conn->query("SELECT * FROM workshops where id = '$username'");
	$count = $res->num_rows;
	//echo $_SESSION['naam'];
	if($count > 0)
	{
		while($row=$res->fetch_array())
		{
			?>
			<tr>
			<td id="right">
			<?php  echo $row['title']; ?>
			</td>
			<td  id="right">
			<?php  echo $row['role']; ?></td>

			<td id="right">
			<?php  echo $row['date']; ?>
			</td>
			
			<td id="right">
			<?php  echo $row['description']; ?>
			</td>

			<td  id="right" >
			<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['sno']; ?>"  />
			</td>
			</tr>
			
			<?php
		}	
	}
	else
	{
		?>
        <tr>
        <td colspan="3"> No Records Found ...</td>
        </tr>
        <?php
	}
?>
</table>
</div>
<div id="options">
<?php

if($count > 0)
{
	?>
	<div>
    <label><input type="checkbox" class="select-all"  /> Check All</label>

    
    <label style="margin-left:150px">
    
    <span><img src="edit.png" onClick="edit_records();" alt="edit" />edit</span> 
    <span><img src="delete.png" onClick="delete_records();" alt="delete" />delete</span>
    </label>
    
    
    <div>  
    <?php
}

?>

</div>

</form>

</div>
</body>
</html>

