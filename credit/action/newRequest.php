<?php
	header("Content-type: text/html; charset=utf-8");
	$clientId = $_POST['clientId'];
	$amount = $_POST['amount'];
	$duration = $_POST['duration'];
	
	$sql = "INSERT INTO `creditsystem`.`request` (`request_id`, `client_id`, `amount`, `duration`) VALUES (NULL, '".$clientId."', '".$amount."', '".$duration."')";
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("请求已成功添加") != true) {
				window.location="../credit.html";
			}
			</script>';
?>