<!DOCTYPE html> 
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>贷款申请</title>
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
	  <li class="active">贷款申请</li>
	</ol>
	<?php
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db ( 'creditsystem', $db );
	$sql = 'select * from client';
	$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	?>
		
		
	<form name="request" method="post" action="./action/newRequest.php">
	<table class="table">
		<tr>
			<td>客户</td>
			<td><select name="clientId" class="form-control" >
					<?php
						while ($data = mysql_fetch_assoc($req)) {
							$type = $data['client_type'];
							if ($type == 1) {
								$typeStr = "个人客户";
							} else {
								$typeStr = "企业账户";
							}
							echo '<option value="'.$data['client_id'].'">'.$data['client_name'].' - '.$typeStr.'</option>';
						}
					?>
				</select>
			</td>
		
		</tr>
		<tr>
			<td>金额</td>
			<td><input type="text" class="form-control" name="amount">
		
		</tr>
		<tr>
			<td>时长</td>
			<td><input type="text" class="form-control" name="duration">
		
		</tr>
		<tr>
			<td><input type="submit" value="确定" class="btn btn-success"></td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>





