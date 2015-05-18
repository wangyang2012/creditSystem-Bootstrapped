<?php
    header("Content-type: text/html; charset=utf-8");
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from contract where contract_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into distribution (client_id, amount, duration, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from contract where contract_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	// get new distribution_id
	$sqlNewDistributionId = 'select distribution_id from distribution where client_id="'.$request['client_id'].'" and amount="'.$request['amount'].'" and duration="'.$request['duration'].'";';
	$resultNewDistributionId = mysql_query($sqlNewDistributionId) or die('Erreur SQL: <br/>'.mysql_error());
	$requestNewDistributionId= mysql_fetch_assoc($resultNewDistributionId);
	$distributionId = $requestNewDistributionId['distribution_id'];
	
	// insert to interests
	$sqlInsertInterest = 'insert into interests(distribution_id, interest) values ("'.$distributionId.'", "0");';
	mysql_query($sqlInsertInterest) or die('Erreur SQL: <br/>'.mysql_error());
	
	// insert to repayment
	$sqlInsertRepayment = 'insert into repayment(distribution_id, repayed) values ("'.$distributionId.'", "0");';
	mysql_query($sqlInsertRepayment) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功发放贷款") != true) {
				window.location="../distribution.php";
			}
			</script>';
?>