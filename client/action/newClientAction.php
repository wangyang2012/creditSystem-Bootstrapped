<?php
header("Content-type: text/html; charset=utf-8");
	$type = $_POST['type'];
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	if ($type == 'person') {
		$name = $_POST['personName'];
		$assets = $_POST['assets'];
		$liabilities = $_POST['liabilities'];
		$professions = $_POST['professions'];
		$education = $_POST['education'];
		$spouse = $_POST['spouse'];
		$live = $_POST['live'];
		$insurance = $_POST['insurance'];
		$sql = "INSERT INTO `creditsystem`.`client` (`client_name`, `client_type`, `assets`, `liabilities`, `professions`, `education`, `spouse`, `live`, `insurance`, `finance`, `business`, `level`) VALUES ('".$name."', 1, '".$assets."', '".$liabilities."', '".$professions."', '".$education."', '".$spouse."', '".$live."', '".$insurance."', '', '', '1');";
	} else if ($type == 'enterprise') {
		$name = $_POST['enterpriseName'];
		$finance = $_POST['finance'];
		$business = $_POST['business'];
		$sql = "INSERT INTO `creditsystem`.`client` (`client_name`, `client_type`, `assets`, `liabilities`, `professions`, `education`, `spouse`, `live`, `insurance`, `finance`, `business`, `level`) VALUES ('".$name."', 2, '', '', '', '', '', '', '', '".$finance."', '".$business."', '1');";
	}
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("已成功注册新客户") != true) {
				window.location="../client.html";
			}
			</script>';
?>