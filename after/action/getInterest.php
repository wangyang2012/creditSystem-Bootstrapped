<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	$interest = $_REQUEST['interest'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	
	$sql = "update interests set interest = ".$interest." where distribution_id = ".$id.";";
	mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功收取利息") != true) {
				window.location="../interest.php";
			}
			</script>';
?>