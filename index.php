<?php

session_start();

//Main includes
include 'settings.php';
include 'inc/functions.php';
include 'inc/sbnc.php';

//Load Dwoo
include 'dwoo/dwooAutoload.php';

if (isset($_GET['logout'])) {
    if (isset($_COOKIE['username'])) {
        setcookie("username", "", time() - 3600);
        setcookie("password", "", time() - 3600);
    }
    session_destroy();
    header('Location:' . $webRoot);
}

//Language selector
if (isset($_POST['lang'])) {
    setcookie("includeLang", $_POST['lang'], $expire);
    $includeLang = $_POST['lang'];
}

//Check for language
if (isset($includeLang)) {
    include 'inc/lang/' . $includeLang . '.php';
} elseif (!isset($_COOKIE['includeLang'])) {
    $includeLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (!file_exists('inc/lang/' . $includeLang . '.php')) {
        $includeLang = $defaultLang;
    }
    include 'inc/lang/' . $includeLang . '.php';
    setcookie("includeLang", "$includeLang", $expire);
} else {
    include 'inc/lang/' . $_COOKIE['includeLang'] . '.php';
}

//New page
$dwoo = new Dwoo();

if (!isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
    include 'pages/login.php';
} else {
    if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['password'] = $_COOKIE['password'];
        $_SESSION['bncserver'] = $_COOKIE['bncserver'];
    }

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $sbncServer = $bncServers['0']['1'];
    $sbncPort = $bncServers['0']['2'];

    $sbnc = new SBNC("$sbncServer", "$sbncPort", "$username", "$password");

    if (!isset($_GET["p"])) {
        $page = "main";
    } else {
        $page = $_GET["p"];
    }
    if (!file_exists("pages/" . $page . ".php")) {
        $isset = '1';
        $type = 'staticerror';
        $message = 'Page \'' . $_GET['p'] . '\' not found! Please check the URL';
        $page = "error";
    }

    $content = '';

    //Select template
    $tpl = new Dwoo_Template_File('template/'.$templateDir.'/header.tpl');
    $data = new Dwoo_Data();

    //Include static values
    include 'inc/static.php';

    //Get the page
    $content .= $dwoo->get($tpl, $data);

    include 'pages/'.$page.'.php';

    //Select template
    $tpl = new Dwoo_Template_File('template/'.$templateDir.'/footer.tpl');
    $data = new Dwoo_Data();

    //Include static values
    include 'inc/static.php';

    //Get the page
    $content .= $dwoo->get($tpl, $data);

    echo $content;

}

?>
