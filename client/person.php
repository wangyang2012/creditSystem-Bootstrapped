<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>个人客户</title>
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
                <li><a href="../credit/credit.html">贷款业务管理</a></li>
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
	  <li><a href="client.html">客户管理</a></li>
	  <li class="active">客户管理</li>
	</ol>
<table  class="table">
	<?php
		echo '<tr><th>姓名</th><th>客户工资</th><th>负债情况</th><th>工作状况</th><th>教育经历</th><th>婚姻状况</th><th>有无子女</th><th>居住情况</th></tr>';
		$db = mysql_connect('localhost', 'root', 'root');
		mysql_select_db('creditsystem', $db);
		$sql = 'select * from client where client_type = 1';
		$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		while ($data = mysql_fetch_assoc($req)) {
			echo '<tr><td>'.$data['client_name'].'</td><td>'.$data['assets'].'</td><td>'.$data['liabilities'].'</td><td>'.$data['professions'].'</td><td>'.$data['education'].'</td><td>'.$data['spouse'].'</td><td>'.$data['live'].'</td><td>'.$data['insurance'].'</td></tr>';
		}
		mysql_close();
	?>
</table>
</div>



</body>
</html>