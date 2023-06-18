<?php 
	session_start();
	if (!isset($_SESSION["login_error"])) 
		$_SESSION["login_error"]="";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="template/css/style.css">

</head>

<body>
    <form method="POST" action="login_action.php">
        <div id="bg"></div>

        <div style="margin-bottom: 50px;">
            <center>
                <font color="red"><?php echo $_SESSION["login_error"]; ?></font>
            </center>
        </div>

        <div class="form-field">
            <input name="txtUsername" type="text" placeholder="Email / Username" required />
        </div>

        <div class="form-field">
            <input name="txtPassword" type="password" placeholder="Password" required />
        </div>

        <div class="form-field">
            <button class="btn" type="submit">Log in</button>
            <a class="btn no-style" href="register.php">Register</a>
        </div>
    </form>


    <!-- partial -->

</body>

</html>