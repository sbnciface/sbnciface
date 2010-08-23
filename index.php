<?php
/*
 * $Id: index.php 238 2010-05-04 20:54:56Z biohzn $
 *
 * Copyright (C) 2010 Conny Sjöblom <biohzn@mustis.org>
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
//Start Session
session_start();

//Include Settings
include('inc/settings.php');

//Check if there is only one server in the array

if (count($bncServers) < 2) {
    $_SESSION['bncserver'] = "0";
}

//Check for language
if (!empty($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    setcookie("lang", "$default_lang", $expire);
    $lang = $default_lang;
}

//Changestyle
if ($_POST['action'] == "changestyle") {
    setcookie("style", $_POST['style'], $expire);
    $style = $_POST['style'];
} else {
    //Check for stylesheet
    if (!empty($_COOKIE['style'])) {
        $style = $_COOKIE['style'];
    } else {
        setcookie("style", "$default_style", $expire);
        $style = $default_style;
    }
}

if (isset($_COOKIE['ident']) && !isset($_SESSION['username'])) {
    $_SESSION['bncserver'] = $_COOKIE['bncserver'];
    $_SESSION['username'] = $_COOKIE['ident'];
    $_SESSION['password'] = $_COOKIE['password'];
}

//Get Page
if (empty($_SESSION['username'])) {
    $page = "main";
} else {
    if (!isset($_GET["p"])) {
        $page = "main";
    } else {
        $page = $_GET["p"];
    }
    if (!file_exists("pages/" . $page . ".php")) {
        $page = "404";
    }
}

//Include the rest
if (isset($_COOKIE['lang'])) {
    include('inc/lang/' . $lang . '.php');
}
else {
    include('inc/lang/' . $default_lang . '.php');
}
include('inc/functions.php');
include('inc/sbnc.php');
include('inc/header.php');

//Check of logged in, if not show login page
if (empty($_SESSION['username'])) {

    if (!isset($_COOKIE['lang']) && (isset($_SESSION['msg']))) {
        echo "<div class=\"error\">";
        echo "You need to enable cookies to login!";
        echo "</div>";
    }

    if (!empty($_SESSION['msg'])) {
        echo "<div class=\"warning\">";
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        echo "</div>";
    }
?>
    <form action="process.php" method="POST">
        <table cellpadding="4" align="center">
        <?php
        if (!empty($_SESSION['msg'])) {
            echo "<tr><td colspan=\"2\">" . $_SESSION['msg'] . "</td></tr>";
            unset($_SESSION['msg']);
        } ?>
        <tr><td><?php echo $lang['username']; ?>:</td><td><input type="text" name="ident" /></td></tr>
        <tr><td><?php echo $lang['password']; ?>:</td><td><input type="password" name="password" /></td></tr>
        <?php setServerToUse(); ?>
        <tr><td colspan="2" style="text-align: left;"><input type="checkbox" name="remember" value="1"  /> <?php echo $lang['remember_me']; ?><td></tr>
        <tr><td colspan="2" style="text-align: right;"><input type="submit" name="login" value="<?php echo $lang['login']; ?>" /></td></tr>
    </table>
</form>
<?php
    } else {

        $activeServer = $_SESSION['bncserver'];

        $ip = $bncServers[$activeServer]['1'];
        $port = $bncServers[$activeServer]['2'];

        //Make the sBNC Connection
        $ident = $_SESSION['username'];
        $password = $_SESSION['password'];
        $sbnc = new SBNC("$ip", "$port", "$ident", "$password");

        $admin = $sbnc->Call('getvalue', array('admin'));

        if ($admin == 1) {
            $trustip = $sbnc->Call('gettrustedips');
        }

        include("inc/menu.php");

        if ($admin == 1) {
            if (!in_array($_SERVER['SERVER_ADDR'], $trustip) && !in_array('127.0.0.1', $trustip)) {
                echo "<div class=\"error\">";
                echo "You need to add servers IP to Trusted IPs like this:<br />sBNC and Webinterface on the same server, add <b>127.0.0.1</b><br />sBNC and Webinterface on different server, add <b>" . $_SERVER['SERVER_ADDR'] . "</b>";
                echo "</div>";
            }
        }

//Include the page
        include("pages/" . $page . ".php");
    }
//Include Footer
    include('inc/footer.php');
?>