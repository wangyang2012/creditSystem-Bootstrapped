<?php
	$id = $_REQUEST['id'];
	$value = $_REQUEST['value'];
	$repayed = $_REQUEST['repayed'];
	$newValue = $value+$repayed;
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'update repayment set repayed='.$newValue.' where repayment_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
				window.location="../repayment.php";
			</script>';
?>