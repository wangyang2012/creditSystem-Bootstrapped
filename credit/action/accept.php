<?php
header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from request where request_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlClient = 'select * from client where client_id = "'.$request['client_id'].'";';
	$resultClient = mysql_query($sqlClient) or die('Erreur SQL: <br/>'.mysql_error());
	$requestClient = mysql_fetch_assoc($resultClient);
	if ($requestClient['level'] > 2) {
		echo '<script>
			if (alert("信用等级不足，不能同意申请") != true) {
				window.location="../response.php";
			}
			</script>';
	}
	
	$sqlInsert = 'insert into response (client_id, amount, duration, accepted, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", 1, now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from request where request_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功同意申请") != true) {
				window.location="../response.php";
			}
			</script>';
?>