<?php
    session_start();

    if(isset($_POST['email'])){
        $validation_ok = true;

        //nick
        $nick = $_POST['nick'];
        if ((strlen($nick)<3) || strlen($nick) > 20){
            $validation_ok = false;
            $_SESSION['error_nick']="invalid nick. Must be 3-20 characters";
        }
        if (ctype_alnum($nick)==false){
            $validation_ok = false;
            $_SESSION['error_nick']="invalid nick. Invalid characters";
        }

        //email
        $email = $_POST['email'];
        $email_safe = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email_safe, FILTER_SANITIZE_EMAIL)==false || ($email_safe != $email)){
            $validation_ok = false;
            $_SESSION['error_email']="invalid email.";
        }

        //password
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if (strlen($password1)<8 || strlen($password1)>20){
            $validation_ok = false;
            $_SESSION['error_password']="invalid password. Must be 8-20 characters long";
        }

        if ($password1 != $password2){
            $validation_ok = false;
            $_SESSION['error_password']="password1 and password2 must be equal";
        }

        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

        //regulations
        if(!isset($_POST['regulations'])){
            $validation_ok = false;
            $_SESSION['error_checkbox']="Rules must be checked";
        }

        //reCaptcha
        $secret = '6LeDlN0ZAAAAAJ6fBVTRnhN-rT1geInDNZOFdFj5';
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responce = json_decode($check);

        if($responce->success==false){
            $validation_ok = false;
            $_SESSION['error_bot']="Check captcha";
        }

        //remember data
        $_SESSION['rem_nick'] = $nick;
        $_SESSION['rem_email'] = $email;
        $_SESSION['rem_pass1'] = $password1;
        $_SESSION['rem_pass2'] = $password2;
        if (isset($_POST['regulations'])) $_SESSION['rem_check'] = true;

        require_once  "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                //email
                $result = $connection->query('Select id from user_data where email = "'.$email.'"');

                if(!$result){
                    throw new Exception($connection->error);
                }

                $mails = $result->num_rows;
                if ($mails > 0){
                    $validation_ok = false;
                    $_SESSION['error_email']="Email exists";
                }

                //nick
                $result = $connection->query('Select id from user_data where user = "'.$nick.'"');

                if(!$result){
                    throw new Exception($connection->error);
                }

                $nicks = $result->num_rows;
                if ($nicks > 0){
                    $validation_ok = false;
                    $_SESSION['error_nick']="user name already exists";
                }

                if($validation_ok == true){

                    if ($connection->query("INSERT INTO user_data VALUES  (NULL, '$nick', '$hashed_password', '$email', 100, 100, 100, now() + INTERVAL 14 DAY )")){
                        $_SESSION['registered'] = true;
                        header('Location: welcome.php');
                    }
                    else{
                        throw new Exception($connection->error);
                    }
                    exit();
                }

                $connection->close();
            }

        }
        catch (Exception $e){
            echo '<span style="color:red"> server error</span>';
            echo '<span style="color:orange"> developer error: '.$e.'</span>';
        }

    }

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>game register</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    <link rel="stylesheet" type="text/css" href="style/background.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

    <header class="justify-content-center vertical-center">
        <h1 id="logo">MYGAME</h1>
    </header>

    <section class="d-flex justify-content-center text-center mt-1">
        <form method="post">
            <p class="input_info" >Nick:</p>
            <div class="text_input"><input type="text" value="<?php
                if (isset($_SESSION['rem_nick'])){
                    echo $_SESSION['rem_nick']; unset($_SESSION['rem_nick']); }?>" name="nick">
                <?php
                if(isset($_SESSION['error_nick'])){
                    echo '<div class="error">'.$_SESSION['error_nick'].'</div>';
                    unset($_SESSION['error_nick']);
                }
                ?>
            </div>
            <p class="input_info" >Email:</p>
            <div class="text_input"><input type="text" value="<?php
                if (isset($_SESSION['rem_email'])){
                    echo $_SESSION['rem_email']; unset($_SESSION['rem_email']);} ?>" name="email">
                <?php
                if(isset($_SESSION['error_email'])){
                    echo '<div class="error">'.$_SESSION['error_email'].'</div>';
                    unset($_SESSION['error_email']);
                }
                ?>
            </div>
            <p class="input_info" >Password:</p>
            <div class="text_input">
                <input type="password" value="<?php
                if (isset($_SESSION['rem_pass1'])){
                    echo $_SESSION['rem_pass1']; unset($_SESSION['rem_pass1']); }?>" name="password1">
                <?php
                if(isset($_SESSION['error_password'])){
                    echo '<div class="error">'.$_SESSION['error_password'].'</div>';
                    unset($_SESSION['error_password']);
                }
                ?>
            </div>
                <p class="input_info" >Repeat Password:</p>
                <div class="text_input"><input type="password" value="<?php
                if (isset($_SESSION['rem_pass2'])){
                    echo $_SESSION['rem_pass2']; unset($_SESSION['rem_pass2']);} ?>" name="password2">
            </div>
            <br>
            <br>
            <label><input type="checkbox" name="regulations" <?php
                if (isset($_SESSION['rem_check'])){
                    echo 'checked'; unset($_SESSION['rem_check']);} ?>>I've read and accepted privacy terms.</label>
            <?php
            if(isset($_SESSION['error_checkbox'])){
                echo '<div class="error">'.$_SESSION['error_checkbox'].'</div>';
                unset($_SESSION['error_checkbox']);
            }
            ?>
            <div class="g-recaptcha" data-sitekey="6LeDlN0ZAAAAALopigZgN6PxWopFXybbI75L-O7l"></div>
            <?php
            if(isset($_SESSION['error_bot'])){
                echo '<div class="error">'.$_SESSION['error_bot'].'</div>';
                unset($_SESSION['error_bot']);
            }
            ?>

                <input class="register mt-5" type="submit" value="register"/>


        </form>
    </section>

    <div id="comet"></div>
    <script src="scripts/comet.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/comet.js"></script>
</body>
</html>