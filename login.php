<?php

/*
 * $Id$
 *
 * Copyright (C) 2010 Conny Sj�blom <biohzn@mustis.org>
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

session_start();

//Include sBNC Class
include('inc/sbnc.php');

//Include sBNC Settings
include('inc/settings.php');

//Include Functions
include('inc/functions.php');

$activeServer = $_SESSION['bncserver'];

$ip = $bncServers[$activeServer]['1'];
$port = $bncServers[$activeServer]['2'];

//Make the sBNC Connection
$ident = $_SESSION['username'];
$password = $_SESSION['password'];
$sbnc = new SBNC("$ip", "$port", "$ident", "$password");

//Login and Logout
if (isset($_GET['logout'])) {
    if (isset($_COOKIE['ident'])) {
        setcookie("ident", "", time() - 3600);
        setcookie("password", "", time() - 3600);
    }
    session_destroy();
    header('Location:'.$webroot);
} elseif (!empty($_POST['login'])) {

    global $expire;

    //Get vars from form
    $ident = $_POST['ident'];
    $password = $_POST['password'];
    //Try the connection

    if (count($bncServers) < 2) {
        $_SESSION['bncserver'] = "0";
    } else {
        $activeServer = $_POST['setserver'];
    }

    $ip = $bncServers[$activeServer]['1'];
    $port = $bncServers[$activeServer]['2'];

    $sbnc = new SBNC("$ip", "$port", "$ident", "$password");
    $result = $sbnc->Call("commands");

    if (strlen($result['0']) < 6) {
        //$_SESSION['msg'] = print_r($result);
        $_SESSION['msg'] = $lang['wrong_user_pass'];
    } elseif ($_POST['remember'] == 1) {
        setcookie("bncserver", "$activeServer", $expire);
        setcookie("ident", "$ident", $expire);
        setcookie("password", "$password", $expire);
    } else {
        $_SESSION['bncserver'] = "$activeServer";
        $_SESSION['username'] = "$ident";
        $_SESSION['password'] = "$password";
    }
    header('Location:'.$webroot);
}
?>
