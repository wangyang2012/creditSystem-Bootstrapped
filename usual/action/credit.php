<?php
	$id = $_REQUEST['id'];
	$value = $_REQUEST['value'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'update distribution set amount='.$value.' where distribution_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
				window.location="../credit.php";
			</script>';
?>