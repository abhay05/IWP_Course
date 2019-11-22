<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
“http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html>
<head>
<title>
Books
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
	position:absolute;
}
/*.p1{postion:relative;left:50%;top:2%;}*/
	a{
		text-color:white;
		display:block;
		color:blue;
	}
	#content{height:auto;overflow:auto;}
	#logout{width:100px;position:absolute;bottom:0px;right:0px;}
	#s{
			position:absolute;
			top:70px;
		}
</style>
<script src="jquery.js" type="text/javascript"></script>
<script src="jscriptb.js" type="text/javascript"></script>
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
Books
</div>

<div id="form">

<!--<div id="buttons">-->
<a href="addb.php" class="btn btn-large btn-info" id="buttons"> &nbsp; Update</a>

<!--</div>-->
<div >
<form method="post" name="frmb">
<div id="content">
<table>
<tr>
<td colspan=4 id="left" align:"center">Books</td>
</tr>
<tr>
<td id="left">
Title
</td>

<td id="left" >
ISBN
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
	$res = $conn->query("SELECT * FROM books where id = 'abhay'");
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
			<?php  echo $row['isbn']; ?></td>

			<td id="right">
			<?php  echo $row['description']; ?>
			</td>

			<td  id="right" >
			<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['isbn']; ?>"  />
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
	
	</table>
	</div>
	<div>
    <label><input type="checkbox" class="select-all" /> Check All</label>

    
    <label style="margin-left:100px">
    
    <span><img src="edit.png" onClick="edit_recordsb();" alt="edit" />edit</span> 
    <span><img src="delete.png" onClick="delete_recordsb();" alt="delete" />delete</span>
    </label>
    
    </div>   
    <?php
}

?>


</form>
</div>
</div>
</body>
</html>