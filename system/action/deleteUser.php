<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sqlCount = 'select * from user where id = '.$id.";";
	$count = mysql_num_rows(mysql_query($sqlCount));
	if ($count == 1) {
		$sql = 'delete from user where id = '.$id.";";
		$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		
		echo '<script>
				if (alert("已成功删除用户") != true) {
					window.location="../user.php";
				}
				</script>';
	} else {
		echo '<script>
			if (alert("无法删除用户") != true) {
				window.location="../user.php";
			}
			</script>';
	}
?>