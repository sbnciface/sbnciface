<?php
/*
 * Copyright (C) 2010-2014 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2014 Arne Jensen   <darkdevil@darkdevil.dk>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php

//Start the session
session_start();

//Main includes
if (!@include("settings.php")) {
  die("Error: Couldn't find configuration file. Please create 'settings.php'");
}
include 'inc/functions.php';
include 'inc/sbnc.php';

//Get interfaceRoot
$interfaceRoot = sbnciface_get_root();

//Language selector
if (isset($_POST['lang'])) {
    setcookie("includeLang", $_POST['lang'], $expire);
    $includeLang = $_POST['lang'];
}

//Check for language
if (isset($includeLang)) {
    include 'lang/' . $includeLang . '.php';
} elseif (!isset($_COOKIE['includeLang'])) {
    if (!file_exists('lang/' . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '.php')) {
        $includeLang = $defaultLang;
    } else {
        $includeLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    }
    include 'lang/' . $includeLang . '.php';
    setcookie("includeLang", "$includeLang", $expire);
} else {
    include 'lang/' . $_COOKIE['includeLang'] . '.php';
}

//Check for session expired, if it appears so - redirect to interfaceRoot!
if (isset($_GET['p']) && !isset($_SESSION['username'])) {
    header('Location:' . $interfaceRoot);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:' . $interfaceRoot);
}

//Load Dwoo
include 'dwoo/dwooAutoload.php';

//New page & dataset
sbnciface_create_temp_if_necessary();
if (($interfaceTemp = sbnciface_get_temp_dir())) {
  $dwoo = new Dwoo($interfaceTemp);
}
if (!isset($dwoo)) {
  die("Error: Couldn't find a writable directory to use. Please create 'dwoo/compiled'");
}
$data = new Dwoo_Data();

//Check for user session
if (!isset($_SESSION['username'])) {

    //Include static values
    include 'inc/static.php';

    //Include login page
    include 'pages/login.php';
} else {

    //Make the sBNC connection
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $server = $_SESSION['server'];

    $sbncServer = $bncServers[$server]['ip'];
    $sbncPort = $bncServers[$server]['port'];

    $sbnc = new SBNC($sbncServer, $sbncPort, $username, $password);

    //Check for page
    if (!isset($_GET['p'])) {
        $page = 'status';
    } else {
        $page = $_GET['p'];
    }

    if (!file_exists('pages/' . $page . '.php')) {

        //Page not found, include error page.
        $errorIsset = '1';
        $errorType = 'staticerror';
        $errorMessage = sprintf($lang['misc_404'], $_GET['p']);
        $page = "error";
    }

    //Include static values
    include 'inc/static.php';

    //Finally include the page.
    include 'pages/' . $page . '.php';

    $sbnc->Destroy();
}
?>
