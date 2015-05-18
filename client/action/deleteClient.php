<?php
$id = $_REQUEST['id'];

$db = mysql_connect('localhost', 'root', 'root');
mysql_select_db('creditsystem', $db);

// TODO: count before delete
$sql = 'select * from client where client_id = '.$id.";";
$count = mysql_num_rows(mysql_query($sqlCount));
echo $count;
if ($count > 0) {
	echo '<script>
			if (alert("不能删除该客户：请首先删除属于此客户的对应信息！") != true) {
				window.location="../client.php";
			}
			</script>';
} else {
	$sql = 'delete from client where client_id = '.$id.";";
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());

	echo '<script>
				if (alert("已成功删除客户") != true) {
					window.location="../client.php";
				}
				</script>';
}
?>