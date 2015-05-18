<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from response where response_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into contract (client_id, amount, duration, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from response where response_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功签订合同") != true) {
				window.location="../contract.php";
			}
			</script>';
?>