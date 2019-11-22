<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
“http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html>
<head>
<title>
Experience
</title>
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

button{    background-color: #00c0ef;
    padding:6px 12px;
margin:5px;border:1px solid #00acd6;border-radius:3px;}
#heading:before,#heading:after{content:" ";display:table;}
heading{padding:2px;}

/*.p1{postion:relative;left:50%;top:2%;}*/
	a{
		text-color:white;
		display:block;
		color:blue;
	}
	textarea{
		width:100%;
		height:100%;  
		overflow:auto;
	}
	#box{
		width:40%;
		height:50%;
	}
	
	#buttons{position:relative;text-align:center;color:white;text-decoration:none;
background-color: #00c0ef;
    padding:6px 12px;
margin:5px;border:1px solid #00acd6;border-radius:3px;}

</style>
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

Experience
</div>

<div id="form">
<div>
,<!--<a href="addr.php" class="btn btn-large btn-info" id="buttons"> &nbsp; Update</a>-->
</div>
<div id="content">
 <?php
               function Read() {
                   $file = "experience.txt";
                   echo file_get_contents( $file);
               }

               function Write() {
                   $file = "experience.txt";
                   $fp = fopen($file, "w");
                   $data = $_POST["tekst"];
                   fwrite($fp, $data);
                   fclose($fp);
				  
               }
        ?>

           <?php
        if (isset($_POST["submit"])){
			Write();
        };
        ?>    

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <textarea  name="tekst"><?php Read(); ?></textarea><br>
        <input id="buttons" type="submit" name="submit" value="Update text">
        <input type="hidden" name="submit_check" value="1">
        </form>
		

                <?php
        if (isset($_POST["submit"])){
			
            echo 'Text updated';
        };
        ?> 
</div>
</div>
</div>
</body>
</html>
