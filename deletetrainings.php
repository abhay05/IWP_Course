<?php
	
	error_reporting(0);
	
	include_once 'dbconnection.php';
	$conn=openconn();
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
	if(!isset($chk))
	{
		echo 'At least one checkbox Must be Selected !!!';
		?>
        <script>
		
		window.location.href = 'trainingSessions.php';
		</script>
        <?php
	}
	else
	{
		for($i=0; $i<$chkcount; $i++)
		{
			
			$del = $chk[$i];
			$sql=$conn->query("DELETE FROM trainingsessions WHERE id ='abhay' AND sno=".$del);
		}	
		
		if($sql)
		{
			echo $chkcount." Records Was Deleted !!!";
			?>
			<script>
			
			window.location.href='trainingsessions.php';
			</script>
			<?php
		}
		else
		{
			echo 'Error while Deleting , TRY AGAIN';
			?>
			<script>
			
			window.location.href='trainingsessions.php';
			</script>
			<?php
		}
		
	}

	
?>