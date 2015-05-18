<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	$duration = $_REQUEST['duration'];
	$extension = $_REQUEST['extension'];
	$newDuration = $duration + $extension;
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'update distribution set duration='.$newDuration.' where distribution_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("已成功展期") != true) {
				window.location="../extend.php";
			}
			</script>';
?>