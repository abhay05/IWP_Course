<!DOCTYTPE html>
<html>
<head>
<title>
Medical Record
</title>
<link href="nhcn.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function deleter(){
	console.log("pppp");
	document.frm.action="ncl_delete.php";
	document.frm.submit();
}
</script>
</head>

<body>
<div id ="header">
<p>
<image src="img/nclLogon2.png" id="logo" />
</p>
<h1>
TRANSFORMING SINGRAULI
</h1>
</div>
<div id="body">
<div id ="forms">
<form id ="frm" name="frm" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<button id="show" name="show">Show Table</button>
</form>

<form id ="frm1" name="frm1" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<button id="severe" name="severe">Severe Cases</button>
</form>

<form id ="frm2" name="frm2" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<button id="emergency" name="emergency">Emergency Cases</button>
</form>

<form id="frm3" name="frm3" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="vill" id="village"/><br/><br/><div id="err"></div>
<button id ="search" name="search" onclick="return check()"/>Search</button>
</form>

</div>




<?php
$a=0;$b=0;
if(isset($_POST['show']))
{
	$a=0;
	$b=1;
	$c=0;
	//echo "show";
}

if(isset($_POST['severe']))
{
	$a=1;
	$b=0;
	$c=0;
	//echo "severe";
}

if(isset($_POST['emergency']))
{ 
	$a=1;
	$b=1;
	$c=0;
	//echo "emeregency";
}
$c=0;
if(isset($_POST['search'])){
	$c=1;
	$a=0;
	$b=0;
}
?>
<div id="content">
<form name='frmp' id='frmp' method='post' action=<?php echo "ncl_delete.php";?>>
<table id="tb">
<tr>

<td>
Name
</td>

<td>
Hb
</td>

<td>
LMP
</td>

<td>
EDD
</td>

<td>
Priority
</td>

<td>
Village
</td>
<td>
</td>
</tr>
<?php

include 'dbconnection.php';
	
	$con=openconn();
	
	$res=$con->query("Select * from Anemia");
if($a==1 && $b==0  &&  $c==0){$res=$con->query("Select * from Anemia where hb<7");}
if($a==0 && $b==1  &&  $c==0){$res=$con->query("Select * from Anemia");}
if($a==1 && $b==1  &&  $c==0){$res=$con->query("Select * from Anemia");}
if($a==0 && $b==0  &&  $c==1){$res=$con->query("Select * from Anemia where village='".$_POST['vill']."'");}
	
	if($res->num_rows>0){
		while($row=$res->fetch_array()){
			if($a==1 && $b==1){$date1 = new DateTime();
$date2 = new DateTime($row['bdd']);
$diff = $date1->diff($date2);
// will output 2 days
$days=$diff->days;
if($diff->invert){$days=-$days;}
//echo $days . ' days ';
			if($days>=0 && $days<=30){echo "<tr><td>";
			echo $row['name'];
			echo "</td>";
			
			echo "<td>";
			echo $row['hb'];
			echo "</td>";
			
			echo "<td>";
			echo $row['lnp'];
			echo "</td>";
			
			echo "<td>";
			echo $row['bdd'];
			echo "</td>";
			
			echo "<td>";
			echo $row['priority'];
			echo "</td>";
			
			echo "<td>";
			echo $row['village'];
			echo "</td>";
			
			echo "<td><input type='checkbox' name='chk[]' value='".$row['sno']."'>";
			echo "</td></tr>";}}
			else{
			echo "<tr><td>";
			echo $row['name'];
			echo "</td>";
			
			echo "<td>";
			echo $row['hb'];
			echo "</td>";
			
			echo "<td>";
			echo $row['lnp'];
			echo "</td>";
			
			echo "<td>";
			echo $row['bdd'];
			echo "</td>";
			
			echo "<td>";
			echo $row['priority'];
			echo "</td>";
			
			echo "<td>";
			echo $row['village'];
			echo "</td>";
			
			echo "<td><input type='checkbox' name='chk[]' value='".$row['sno']."'>";
			echo "</td></tr>";}
		}
	}
	echo "</table><input type='submit' name ='delete' value='Delete'></form>";
?>

</div>
<div id="input">
<h4>Enter Number of Records </h4><br/><br/>
<input type="text" name="count" id="count"/>
<button name="ok" id ="ok">OK</button>
</div>
<div id="input1">

</div>
</div>
<div id="footer">

</div>
</body>
</html>
<script type="text/javascript">
document.getElementById("ok").addEventListener('click',fun);
document.getElementById("village").addEventListener('click',check);
document.getElementById("ok").addEventListener('click',fun);
document.getElementById("delete").addEventListener('click',deleter);



function check(){
	
	var x=document.querySelector("#village").value;
	if(x==""){document.getElementById("err").innerText="Enter village name";return false;}
	return true;
}
function fun(){
	console.log(1);
var t=document.querySelector("#count").value;
var p="";
p+="<form id='frmn' name ='frmn' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'><table id ='in'><tr><td>Name</td><td>Hb</td><td>LNP</td><td>BDD</td><td>Priority</td><td>Village</td></tr>";
for(var i=1;i<=t;i++){
	p+="<tr><td><input type='text' name='name"+i+"'></td><td><input type='text' name='hb"+i+"'></td><td><input type='date' name='lnp"+i+"'></td><td><input type='date' name='bdd"+i+"'></td><td><input type='text' name='priority"+i+"'></td><td><input type='text' name='village"+i+"'></td></tr>";
}
p+="</table><input type='submit' name='sub' value='"+t+"'></form>";
document.getElementById("input1").innerHTML=p;}
</script>

<?php
if(isset($_POST['sub'])){
//include 'dbconnection.php';
$conn=openconn();
$coun=$_POST['sub'];

for($i =1;$i<=$coun;$i++){
	$name=$_POST['name'.$i];
$hb=$_POST['hb'.$i];
$lnp=$_POST['lnp'.$i];
$bdd=$_POST['bdd'.$i];
$priority=$_POST['priority'.$i];
$village=$_POST['village'.$i];
	$query="insert into Anemia(name,hb,lnp,bdd,priority,village) values('".$name."','".$hb."','".$lnp."','".$bdd."','".$priority."','".$village."')";
	
	$query = $conn->query($query);
//	echo "He";
//	echo $query;
	
}
	if($query)
	{	echo "Record inserted successfully";}
		else{echo "error";}
}
?>