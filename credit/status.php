<!DOCTYPE html> 
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>审批状态查询</title>
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
                <li><a href="../disconnect.php">退出</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
	<ol class="breadcrumb">
	  <li><a href="../home.html">主页</a></li>
	  <li><a href="credit.html">贷款业务管理</a></li>
	  <li class="active">审批状态查询</li>
	</ol>

	<table class="table">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>贷款金额</th>
			<th>贷款时长</th>
			<th>审核结果</th>
			<th>日期</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect('localhost', 'root', 'root');
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select client_name, client_type, amount, duration, accepted, date from response join client on client.client_id = response.client_id';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					
					if ($data['accepted'] == '1') {
						$acceptStr = "同意";
					} else if ($data['accepted'] == '2') {
						$acceptStr = "拒绝";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['amount'] . '</td><td>' . $data ['duration'] . '</td><td>'.$acceptStr.'</td><td>'.$data['date'].'</td></tr>';
				}
				?>
			</tbody>
	</table>
</div>
</body>
</html>



