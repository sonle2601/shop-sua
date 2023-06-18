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
    <link rel="stylesheet" href="template/css/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <form method="POST" action="register_action.php">
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
            <input name="txtName" type="text" placeholder="Name" required />
        </div>
        <div class="form-field">
            <input name="txtAdd" type="text" placeholder="Address" required />
        </div>


        <div class="form-field">
            <input name="txtPhone" type="text" placeholder="Phone number" required />
        </div>

        <div class="form-field">
            <button class="btn" type="submit">Register</button>
            <a class="btn no-style" href="login.php">Đăng nhập ngay</a>
        </div>
    </form>
    <!-- partial -->

</body>

</html>