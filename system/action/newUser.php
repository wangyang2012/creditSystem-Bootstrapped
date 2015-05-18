<?php
    header("Content-type: text/html; charset=utf-8");
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('creditsystem', $db);
	$sql = 'insert into user(name, password) values("'.$login.'","'.$password.'");';
	
	$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("用户已成功添加") != true) {
				window.location="../user.php";
			}
			</script>';
?>