<?php
error_reporting(0);
include_once 'dbconnection.php';
$conn=openconn();
if(isset($_POST['save_mul']))
{		
	$total = $_POST['total'];
		
	for($i=1; $i<=$total; $i++)
	{
		$title = $_POST["title$i"];
		$isbn = $_POST["isbn$i"];
		$description = $_POST["description$i"];
		$result=$conn->query("select * from books where isbn='$isbn'");
		if($result->num_rows>0){echo $isbn." ".$title." "."Record already exist"."<br>";$sql=0;
		}
		$sql="INSERT INTO books(id,title,isbn,description) VALUES('abhay','".$title."','".$isbn."','".$description."')";
		$sql = $conn->query($sql);		
	}
	
	if($sql)
	{
		echo $total." records was inserted !!!";
		?>
        <script>
		
		window.location.href='books.php';
		</script>
        <?php
	}
	else
	{
		echo 'error while inserting , TRY AGAIN';
		?>
        <script>
		
		window.location.href='addbooks.php';
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add training Sessions</title>
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
button{    background-color: #00c0ef;
    padding:6px 12px;
margin:5px;border:1px solid #00acd6;border-radius:3px;}
#heading:before,#heading:after{content:" ";display:table;}
heading{padding:2px;}

/*.p1{postion:relative;left:50%;top:2%;}
	a{
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
	#backn{background-color:red;color:white;
		display:block;
		width:100px;height:30px;
		
		text-decoration:none;
		padding:4px 4px;
	border-radius:5px;}
	.container{position:absolute;
		top:20%;
		padding :2px;
		left:35%;}
		*{margin:0;}
		#s{position:absolute;top:70px;}
		#content{height:400px;overflow:auto;}
		
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

<br />

<div class="container">
<div class="container1">
<a href="addb.php" class="btn btn-large btn-info" id="back">&nbsp; Add Records</a>
</div>
<?php
if(isset($_POST['btn-gen-form']))
{
	?>
	<div >
    <form method="post">
    <input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
	<div id="content">
	<table class='table table-bordered'>
    
    <tr>
    <th>##</th>
    <th>Title</th>
    <th>ISBN</th>
	<th>Description</th>
    </tr>
	<?php
	for($i=1; $i<=$_POST["no_of_rec"]; $i++) 
	{
		?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><input type="text" name="title<?php echo $i; ?>" placeholder="title" class='form-control' style="width:100%;height:30px;border-radius:5px;" required></td>
        <td><input type="text" name="isbn<?php echo $i; ?>" placeholder="6688767999" class='form-control' style="width:100%;height:30px;border-radius:5px;" required></td>
		<td><input type="text" name="description<?php echo $i; ?>" placeholder="description" class='form-control' style="width:100%;height:30px;border-radius:5px;" required></td>
        </tr>
        <?php
	}
	?>
	</table>
	</div>
    <div>
    
    <button type="submit" name="save_mul" class="btn btn-primary"> &nbsp; Insert all Records</button> 

    <a href="books.php" class="btn btn-large btn-success" id="backn"> &nbsp; Back to index</a>
    
    </div>
    
    </form>
	</div>
	<?php
}
?>
</div>

</body>
</html>