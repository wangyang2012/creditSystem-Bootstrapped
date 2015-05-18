<?php
    header("Content-type: text/html; charset=utf-8");
	$clientId = $_POST['clientId'];
	$note = $_POST['note'];
	$level = $_POST['level'];
	
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = "INSERT INTO `creditsystem`.`record` (`client_id`, `note`, `level`) VALUES ('".$clientId."', '".$note."', '".$level."')";
	$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	
	//更新客户信用等级
	$sqlClient = 'select * from client where client_id="'.$clientId.'";';
	$reqClient = mysql_query($sqlClient) or die('Erreur SQL: <br/>'.mysql_error());
	$data = mysql_fetch_assoc($reqClient);
	
	if ($data['level'] < $level) {
		$sqlClientUpdate = 'update client set level = "'.$level.'" where client_id="'.$clientId.'";';
		$reqClient = mysql_query($sqlClientUpdate) or die('Erreur SQL: <br/>'.mysql_error());
	}
	
	echo '<script>
			if (alert("不良记录收集成功") != true) {
				window.location="../record.html";
			}
			</script>';
?>