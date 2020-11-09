<?php
    session_start();

    if (!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>game</title>

    <link rel="stylesheet" type="text/css" href="style/background.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/game.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a2f9bfa99d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts/r.js"></script>
</head>
<body>
    <header class="justify-content-center vertical-center" style="height: 10%">
        <h1 id="logo">MYGAME</h1>
    </header>

    <section class="d-flex justify-content-center text-center mt-5" style="width: 100%">
        <aside>
            <?php
            echo "<p> Welcome engineer ".$_SESSION['user']."! </p>";
            ?>
        </aside>

        <nav class="main_nav">
            <?php
            echo "<p> your email: ".$_SESSION['email'];
            echo  "<a href='logout.php'> Log out</a></p>";
            ?>
        </nav>
    </section>

    <div style="clear: both"></div>

    <section class="info d-flex justify-content-center text-center mt-5" style="width: 100%">
        <?php
        echo ' <p> Steel: '.$_SESSION['steel'].' <i class="fas fa-tools"></i> | ';
        echo ' Energy:'.$_SESSION['energy'].' <i class="fas fa-bolt"></i> | ';
        echo ' Food: '.$_SESSION['food'].' <i class="fas fa-apple-alt"></i> | ';

        $data = new DateTime();
        $end = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['premium']);
        $dif = $data->diff(($end));
        if ($data<$end) {
            echo "Premium left: " . $dif->format('%d days, %h hours');
        }
        else echo "No premium </p>";
        ?>
    </section>

    <section class="d-flex justify-content-center field_container mt-4">
        <div class="fields">
            <div class="field" id="field1" onclick="build(1)"></div>
            <div class="field" id="field2" onclick="build(2)"></div>
            <div class="field" id="field3" onclick="build(3)"></div>
            <div style="clear: both"></div>
            <div class="field" id="field4" onclick="build(4)"></div>
            <div class="field" id="field5" onclick="build(5)"></div>
            <div class="field" id="field6" onclick="build(6)"></div>
            <div style="clear: both"></div>
            <div class="field" id="field7" onclick="build(7)"></div>
            <div class="field" id="field8" onclick="build(8)"></div>
            <div class="field" id="field9" onclick="build(9)"></div>
            <div style="clear: both"></div>
        </div>
    </section>

    <section class="action-menu">
        <div class="d-flex justify-content-center game-menu">
            <div class="container">
                <ul id="menu">
                    <a class="menu-button pulse" href="#menu" title="Show" onclick="switch_menu()"></a>
                    <a class="menu-button" href="#0" title="Hide" onclick="switch_menu()"></a>
                    <li class="menu-item">
                        <ul id="factory">
                            <span>factory</span>
                            <a class="submenu-button" title="Produces steel" onclick="switch_factory()"><span>factory <br> <i class="fas fa-tools"></i></span></a>
                            <li id="factory1" title="+1 steel/hour">
                                <a onclick="build_factory1()">
                                    <span>lvl1</span>
                                </a>
                            </li>
                            <li id="factory2" title="+2 steel/hour">
                                <a onclick="build_factory2()">
                                    <span>lvl2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <ul id="platform">
                            <span>platform</span>
                            <a class="submenu-button" title="Allows to build" onclick="switch_platform()"><span>platform <i class="fas fa-vector-square"></i><br> </span></a>
                            <li id="platform1" title="build 1st lvl building">
                                <a onclick="build_platform1()">
                                    <span>lvl1</span>
                                </a>
                            </li>
                            <li id="platform2" title="build 2nd lvl building">
                                <a onclick="build_platform2()">
                                    <span>lvl2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <ul id="powerhouse">
                            <span>powerhouse</span>
                            <a class="submenu-button" title="Produces energy" onclick="switch_powerhouse()"><span>powerhouse <br> <i class="fas fa-bolt"></i></a>
                            <li id="powerhouse1" title="+1 energy/hour">
                                <a onclick="build_powerhuse1()">
                                    <span>lvl1</span>
                                </a>
                            </li>
                            <li id="powerhouse2" title="+2 energy/hour">
                                <a onclick="build_powerhouse2()">
                                    <span>lvl2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <ul id="farm">
                            <span>farm</span>
                            <a class="submenu-button" title="Produces food" onclick="switch_farm()"><span>farm <br> <i class="fas fa-apple-alt"></i></span></a>
                            <li id="farm1" title="+1 food/hour">
                                <a onclick="build_farm1()">
                                    <span>lvl1</span>
                                </a>
                            </li>
                            <li id="farm2" title="+2 food/hour">
                                <a onclick="build_farm2()">
                                    <span>lvl2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div id="comet"></div>
    <script src="scripts/comet.js"></script>
    <script src="scripts/game.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>