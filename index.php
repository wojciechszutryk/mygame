<?php
    session_start();

    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: game.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>php2</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div id="comet"></div>
<h1>myGame</h1>

<form action="login.php" method="post">
    login:
    <br>
    <input type="text" name="login">
    <br>
    password:
    <br>
    <input type="password" name="password">
    <br>
    <br>
    <a href="register.php">Register</a>
    <input type="submit" value="login">
</form>

<?php
if(isset($_SESSION['error']))	echo $_SESSION['error'];
?>

<script src="scripts/comet.js"></script>
</body>
</html>