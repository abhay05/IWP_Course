<?php
include_once 'dbconnection.php';
	$conn=openconn();
	$chk=$_POST['chk'];
	$count=count($chk);
if(!isset($chk)){
	echo "Select a checkbox";
	?>
	<script>
	windows.location.href='ncl_healthCenter.php';
	
	</script>
	<?php
}

else{
	for($i=0;$i<$count;$i++){
		
		$sql=$conn->query("Delete from Anemia where sno=".$chk[$i]);
	}
	if($sql){
		echo "Records deleted successfully";
		
		?>
		<script>
			window.location.href='ncl_healthCenter.php';
		</script>
		<?php
	}
}

?>