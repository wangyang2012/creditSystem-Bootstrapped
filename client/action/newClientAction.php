<?php
header("Content-type: text/html; charset=utf-8");
	$type = $_POST['type'];
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	if ($type == 'person') {
		$name = $_POST['personName'];
		$assets = $_POST['assets'];
		$liabilities = $_POST['liabilities'];
		$education = $_POST['education'];
		$live = $_POST['live'];
		
		$score = $assets + $liabilities + $education + $live;
		if ($score < 6)
			$level = 5;
		else if ($score >= 6 and $score <= 7)
			$level = 4;
		else if ($score >= 8 and $score <= 9)
			$level = 3;
		else if ($score >= 10 and $score <= 13)
			$level = 2;
		else if ($score >= 14 and $score <= 17)
			$level = 1;

		$sql = "INSERT INTO `creditsystem`.`client` (`client_name`, `client_type`, `assets`, `liabilities`, `education`, `live`, `level`) VALUES ('".$name."', 1, '".$assets."', '".$liabilities."', '".$education."', '".$live."', '".$level."');";
	} else if ($type == 'enterprise') {
		$name = $_POST['enterpriseName'];
		$finance = $_POST['finance'];
		$level = $finance;
		
		$sql = "INSERT INTO `creditsystem`.`client` (`client_name`, `client_type`, `finance`, `level`) VALUES ('".$name."', 2, '".$finance."', '".$level."');";
	}
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("已成功注册新客户") != true) {
				window.location="../client.html";
			}
			</script>';
?>