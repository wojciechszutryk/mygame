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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>registration</title>

    <link rel="stylesheet" type="text/css" href="style/background.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="justify-content-center vertical-center">
        <h1 id="logo">Thanks for registration!</h1>
    </header>
    <section class="d-flex justify-content-center text-center mt-5">
        <p>You can now log in <a href="index.php"> here</a></p>
    </section>

    <div id="comet"></div>

    <script src="scripts/comet.js"></script>
    <script src="scripts/comet.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>