<?php
$url=$_SERVER['REQUEST_URI'];
$parts=parse_url($url);
parse_str($parts['query'],$query);
$query=$_SERVER['QUERY_STRING'];

$researchlink='http://localhost/research.php?'.$query;
$bookslink='http://localhost/books.php?'.$query;
$workshopslink='http://localhost/workshops.php?'.$query;
$trainingSessionslink='http://localhost/trainingSessions.php?'.$query;
$awardslink='http://localhost/awards.php?'.$query;
$experiencelink='http://localhost/experience.php?'.$query;
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="vmenu.css">
<link rel="stylesheet" type="text/css" href="main.css">
<style>
#welcome{
	color:skyblue;
	position:absolute;
	left:40%;
	top:40%;
	font-size:2em;
}
#logout{
	bottom:15px;
	right:15px;
}
</style>
</head>

<body>
<div id="main">
<div id="head">
<div id="v">VIT</div>
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
</div>
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
<div id="welcome">
<h1>WELCOME</h1>
</div>
</div>
</body>
</html>
