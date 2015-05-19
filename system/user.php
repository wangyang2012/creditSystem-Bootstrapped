<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>用户管理</title>
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
		function deleteUser(id) {
			window.location = "./action/deleteUser.php?id="+id;
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
	  <li><a href="system.html">系统维护</a></li>
	  <li class="active">用户管理</li>
	</ol>
	<div class="row">
		<div class="col-md-6">
			<h1>用户管理</h1>
			<table class="table">
				<?php
					echo '<tr><th>姓名</th><th>删除</th></tr>';
					$db = mysql_connect('localhost', 'root', 'root');
					mysql_select_db('creditsystem', $db);
					$sql = 'select * from user';
					$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
					while ($data = mysql_fetch_assoc($req)) {
						echo '<tr><td>'.$data['name'].'</td><td><input type="button" class="btn btn-success" onclick="deleteUser('.$data['id'].')" value="删除"/></td></tr>';
					}
					mysql_close();
				?>
			</table>			
		</div>
		<div class="col-md-6">
			<h1>添加用户</h1>
			<form action="./action/newUser.php" method="post" class="form-horizontal">
			
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
				    <div class="col-sm-10">
				      <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
				    <div class="col-sm-10">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">添加</button>
				    </div>
				  </div>
			</form>
		</div>
	</div>

	<hr>

</div>

	

	
</body>
</html>