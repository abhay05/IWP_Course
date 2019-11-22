<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
“http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html>
<head>
<title>
Research
</title>
<link rel="stylesheet" type="text/css" href="vmenu.css">
<link rel="stylesheet" type="text/css" href="main.css">
<!--<style>
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
	postion:absolute;
}
/*.p1{postion:relative;left:50%;top:2%;}*/
	a{
		text-color:white;
		display:block;
		color:blue;
	}
</style>-->
<script src="jquery.js" type="text/javascript"></script>
<script src="jscriptr.js" type="text/javascript"></script>
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
<li><a href="research.php"><span class="ss1">Papers</span></a></li>
</ul>
</li>
<li><a href="books.php"><span class="ss1">Books</span></a></li>
<li><a href="workshops.php"><span class="ss1">Workshops</a></span></li>
<li><a href="trainingSessions.php"><span class="ss1">Training Sessions</a></span></li>
<li><a href="awards.php"><span class="ss1">Awards</a></span></li>
<li><a href="experience.php"><span class="ss1">Experience</a></span></li>
</ul>
</div>


<div id="box">

<div id="heading" style="font-size:20px">

Research
</div>

<div id="form">
<div >
<a href="addr.php" class="btn btn-large btn-info" id="buttons"> &nbsp; Update</a>
</div>
<div id="content">
<form method="post" name="frmr">
<table>
<tr>
<td colspan=5 id="left" align:"center">Papers</td>
</tr>
<tr>
<td id="left">
Title
</td>
<td id="left">
Year
</td>
<td id="left" >
Description
</td>
<td id="left" >
Accession Number
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
	$res = $conn->query("SELECT * FROM research where id = 'abhay'");
	$count = $res->num_rows;

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
			<?php  echo $row['year']; ?></td>

			<td id="right">
			<?php  echo $row['description']; ?>
			</td>
			<td id="right">
			<?php  echo $row['accessionNumber']; ?>
			</td>

			<td  id="right" >
			<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['accessionNumber']; ?>"  />
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

<?php

if($count > 0)
{
	?>
	<tr>
    <td colspan="4">
    <label><input type="checkbox" class="select-all" /> Check All</label>

    
    <label style="margin-left:100px">
    
    <span><img src="edit.png" onClick="edit_recordsr();" alt="edit" />edit</span> 
    <span><img src="delete.png" onClick="delete_recordsr();" alt="delete" />delete</span>
    </label>
    
    
    </td>
	</tr>    
    <?php
}

?>

</table>
</form>
</div>
</div>
</body>
</html>