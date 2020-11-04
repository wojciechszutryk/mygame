<?php
    session_start();

    if (!isset($_SESSION['registered']))
    {
        header('Location: index.php');
        exit();
    }
    else{
        unset($_SESSION['registered']);
    }

    if (isset($_SESSION['rem_nick']))
    {
        unset($_SESSION['rem_nick']);
    }
    if (isset($_SESSION['rem_email']))
    {
        unset($_SESSION['rem_email']);
    }
    if (isset($_SESSION['rem_pass1']))
    {
        unset($_SESSION['rem_pass1']);
    }
    if (isset($_SESSION['rem_pass2']))
    {
        unset($_SESSION['rem_pass2']);
    }
    if (isset($_SESSION['rem_check']))
    {
        unset($_SESSION['rem_check']);
    }

    if (isset($_SESSION['error_nick']))
    {
        unset($_SESSION['rem_nick']);
    }
    if (isset($_SESSION['error_email']))
    {
        unset($_SESSION['rem_email']);
    }
    if (isset($_SESSION['error_password']))
    {
        unset($_SESSION['rem_password']);
    }
    if (isset($_SESSION['error_checkbox']))
    {
        unset($_SESSION['error_checkbox']);
    }
    if (isset($_SESSION['error_bot']))
    {
        unset($_SESSION['error_bot']);
    }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>php2</title>
</head>
<body>
    <h1>Thanks for registration</h1>
    You can now log in
    <a href="index.php">here</a>
    <script src="scripts/comet.js"></script>
</body>
</html>