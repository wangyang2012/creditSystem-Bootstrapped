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
	  <li><a href="client.html">客户管理</a></li>
	  <li class="active">个人客户</li>
	</ol>
<table  class="table">
	<?php
		echo '<tr><th>姓名</th><th>客户工资</th><th>负债情况</th><th>教育经历</th><th>居住情况</th><th>信用等级</th></tr>';
		$db = mysql_connect('localhost', 'root', 'root');
		mysql_select_db('creditsystem', $db);
		$sql = 'select * from client where client_type = 1';
		$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		while ($data = mysql_fetch_assoc($req)) {
			switch($data['assets']) {
				case 1: $assets = "2000元以下"; break;
				case 2: $assets = "2000-5000元"; break;
				case 3: $assets = "5000-8000元"; break;
				case 4: $assets = "8000元以上"; break;
				default: $assets = "";
			}
			
			switch($data['liabilities']) {
				case 1: $liabilities = "2万元以下"; break;
				case 2: $liabilities = "2万元以上"; break;
				case 3: $liabilities = "无"; break;
				default: $liabilities = "";
			}
			
			switch($data['education']) {
				case 1: $education = "高中及以下"; break;
				case 2: $education = "专科"; break;
				case 3: $education = "本科"; break;
				case 4: $education = "硕士及以上"; break;
				default: $education = "";
			}
			
			switch($data['live']) {
				case 1: $live = "寄居"; break;
				case 2: $live = "租房"; break;
				case 3: $live = "按揭买房"; break;
				case 4: $live = "全款买房"; break;
				default: $live = "";
			}
			
			switch($data['level']) {
				case 1: $level = "正常"; break;
				case 2: $level = "关注"; break;
				case 3: $level = "次级"; break;
				case 4: $level = "可疑"; break;
				case 5: $level = "损失"; break;
				default: $level = "";
			}
			echo '<tr><td>'.$data['client_name'].'</td><td>'.$assets.'</td><td>'.$liabilities.'</td><td>'.$education.'</td><td>'.$live.'</td><td>'.$level.'</td></tr>';
		}
		mysql_close();
	?>
</table>
</div>



</body>
</html>