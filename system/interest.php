<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>利率维护</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <style type="text/css">
    .navbar {
        border-radius: 0
    }
        body{
      background: url(../img/userbg.jpg) no-repeat 50% 50% fixed;
      background-size: cover;
    }
    </style>
	<script>
	function deleteClient(id) {
			window.location = "deleteClient.php?id="+id;
	}
	</script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home.html">主页</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
                <li><a href="../system/system.html">系统维护</a></li>
                <li><a href="../client/client.html">客户管理</a></li>
                <li><a href="../client/client.html">客户管理</a></li>
                <li><a href="../after/after.html">贷后管理</a></li>
                <li><a href="../record/record.html">不良记录管理</a></li>
                <li><a href="../usual/usual.html">日常管理</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="deconnect.php">退出</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
	<ol class="breadcrumb">
	  <li><a href="../home.html">主页</a></li>
	  <li><a href="system.html">系统维护</a></li>
	  <li class="active">利率维护</li>
	</ol>
		
		<?php
		$db = mysql_connect ( 'localhost', 'root', 'root' );
		mysql_select_db ( 'creditsystem', $db );
		$sql = 'select * from interest where id = 1';
		$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
		$oldInterest = mysql_fetch_assoc ( $req );
		
		echo '<h3>当前利率： ' . $oldInterest['value'] . '</h3>';
		
		if (isset($_POST ['newInterest'])) {
			$newInterest = $_POST['newInterest'];
			if ($oldInterest == '') {
				$sqlNew = "insert into interest(id, value) values (1, '" . $newInterest . "');";
			} else {
				$sqlNew = "update interest set value = '" . $newInterest . "' where id=1;";
			}
			mysql_query ( $sqlNew ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
			echo '<script>
			if (alert("利率成功更新") != true) {
				window.location="interest.php";
			}
			</script>';
		}
		?>
		<br />
	<br />

	<form method="post" action="interest.php">
		<h3>新利率： 
		<input type="text" name="newInterest" /> <input class="btn btn-success" type="submit" value="确定" />
		</h3>
	</form>
</div>



</body>
</html>