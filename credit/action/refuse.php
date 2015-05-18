<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from request where request_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into response (client_id, amount, duration, accepted, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", 2, now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from request where request_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功拒绝申请") != true) {
				window.location="../response.php";
			}
			</script>';
?>