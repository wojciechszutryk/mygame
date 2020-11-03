<?php
    session_start();

    if ((!isset($_POST['login'])) || (!isset($_POST['password']))){
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try{
        $connection = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
        }
        else{
            $login = $_POST["login"];
            $password = $_POST["password"];

            $login = htmlentities($login, ENT_QUOTES, 'UTF-8');

            if ($result = @$connection->query(sprintf("Select * from user_data where user = '%s'", mysqli_real_escape_string($connection,$login)))){
                $users = $result->num_rows;
                if($users > 0){
                    $row = $result->fetch_assoc();
                    if(password_verify($password, $row['pass'])){

                        $_SESSION['logged'] = true;

                        $_SESSION['id'] = $row['id'];
                        $_SESSION['user'] = $row['user'];
                        $_SESSION['steel'] = $row['steel'];
                        $_SESSION['energy'] = $row['energy'];
                        $_SESSION['food'] = $row['food'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['premium'] = $row['premium'];

                        unset($_SESSION['error']);

                        $result->free();

                        header('Location: game.php');

                    }
                    else {
                        $_SESSION['error'] = '<span style="color:red">Incorrect login or password!1</span>';
                        header("Location: index.php");
                    }
                }
                elseif ($users == 0){
                    $_SESSION['error'] = '<span style="color:red">Incorrect login or password!2</span>';
                    header("Location: index.php");
                }
                else{
                    header("Location: index.php");
                }
            }
            else{
                throw new Exception($connection->error);
            }

            $connection->close();

        }

    }
    catch (Exception $e){
        echo '<span style="color:red"> server error</span>';
        echo '<span style="color:orange"> developer error: '.$e.'</span>';
    }
