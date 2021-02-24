
<?php
    $delogin = "admin";
    $hetpaswoord = "admin";
    session_start();
    if (isset($_POST["inloggen"]))
    { 
        if ($_POST["email"] == $delogin && $_POST["wachtwoord"] == $hetpaswoord)
        {   
            $_SESSION["admin"]="admin";
            header("location:admin_index.php");
        }
    }
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style2.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="login.php" method="post">
				<label for="Email">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="email" id="email" required>
				<label for="Wachtwoord">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="wachtwoord" placeholder="wachtwoord" id="wachtwoord" required>
                <input type="submit" value="inloggen"  name="inloggen">
			</form>
		</div>
	</body>
</html>