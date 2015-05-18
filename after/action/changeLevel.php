<?php
	$id = $_REQUEST['id'];
	$level = $_REQUEST['level'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'update client set level='.$level.' where client_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
				window.location="../level.php";
			</script>';
?>