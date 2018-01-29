<!DOCTYPE html>
<html>
<head>
	<title>Voting System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	<div class="header">
		<p class="logo">End to End<br><strong>Voting System</strong></p>
		<!-- LOGIN -->
		<div class="login">
		<form action="dbms.php" method="post">
			<label>Username</label>
			<input type="text" name="username">

			<label>Password</label>
			<input type="password" name="password">	
			<button class="logbut">Login</button>
			<a href="register.php"><button class="logbut">Register</button></a>	
		<form>
		</div>
		<div class="main-content">
			<h1>Create Your First</h1>
			<h1 class="vp">Voting Poll!</h1>
		</div>
		</div>
	</div>
</body>
</html>