<?php
    session_start();

    if (!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>game</title>
    <link rel="stylesheet" type="text/css" href="style/background.css">
</head>
<body>

<?php
    echo "<p> hi ".$_SESSION['user']."!</p> <a href='logout.php'>Log out</a>";
    echo "<p> Wood: ".$_SESSION['steel']." | ";
    echo " Stone: ".$_SESSION['energy']." | ";
    echo " Grain: ".$_SESSION['food']." | ";

    $data = new DateTime();
    $end = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['premium']);
    $dif = $data->diff(($end));
    if ($data<$end) {
        echo "Premium left: " . $dif->format('%d days, %h hours, %i min,  %s s');
        echo ", until: " . $_SESSION['premium'];
    }
    else echo "No premium";

    echo "<p> email: ".$_SESSION['email']."</p>";
?>

<script src="scripts/comet.js"></script>
</body>
</html>