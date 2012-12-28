<!doctype html>
<html>
	<head>
		<title>Leaderboard | SDSLabs</title>
		<link rel="icon" type="image/x-icon" href="/public/img/favicon.ico" />
		<link href="/public/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="/public/css/style.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="/">Leaderboard</a>
					<div class="nav-collapse" id="main-menu">
						<ul class="nav pull-right" id="main-menu-left">
							<?if (isset($_SESSION['userid']) && $_SESSION['userid']!==false):?>
							<li id="login-info"><a>Logged in as <?=$_SESSION['userid'];?></a></li>
							<li id="manage"><a href="/accounts">Manage Accounts</a></li>
							<li><a href="/logout">Logout</a></li>
							<?else:?>
							<li id="login-button"><a href="/login/github"><img id="gh-icon" src="/public/img/gh.png">Login</a></li>
							<?endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?=$content?>
	</body>
</html>