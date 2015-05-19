<?php
	$login = $_POST["login"];
	$pass = $_POST["password"];
	if (empty($login) || empty($pass)){
		header('Location: index.html');
	} else {
		$db = mysql_connect('localhost', 'root', 'root');
		mysql_select_db('creditsystem', $db);
		$sql = 'select * from user where name="'.$login.'"';
		$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		$data = mysql_fetch_assoc($req);
		if ($data['password'] == $pass) {
			session_start();
			$_SESSION['userId'] = $data['id'];
			header('Location: ./home.html');
		} else {
			header('Location: disconnect.php');
		}
		mysql_close();
	}
?>