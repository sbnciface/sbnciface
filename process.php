<?php

/*
 * $Id$
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

session_start();

//How long should a cookie be active? Default 30 days
$expire = time() + 60 * 60 * 24 * 30;

//Include langfile
include('inc/lang/' . $_COOKIE['lang'] . '.php');

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

//Commands to execute
if (isset($_POST['langselect'])) {
    if ($_POST['langselect'] == 1) {
        if (isset($_POST['lang'])) {
            setcookie("lang", $_POST['lang'], $expire);
        }
        header('Location: ' . $webroot);
    }
} elseif (isset($_POST['join'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("join $channel"));
    header('Location: ' . $webroot . '?p=channels');
    $_SESSION['msg'] = $lang["joined"] . " $channel.";
} elseif (isset($_POST['adminpart'])) {
    $channel = $_POST['channel'];
    $ident = $_POST['ident'];

    $sbnc->CallAs("$ident", "raw", array("part $channel"));
    header('Location: ' . $webroot . '?p=edit&u=' . $ident . '&c');
    $_SESSION['msgpart'] = $lang["parted"] . " $channel.";
} elseif (isset($_POST['part'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("part $channel"));
    header('Location: ' . $webroot . '?p=channels');
    $_SESSION['msgpart'] = $lang["parted"] . " $channel.";
} elseif (isset($_POST['global'])) {
    $message = $_POST['message'];

    $sbnc->CallAs($ident, "globalmsg", array("\002\0034 ADMIN-MESSAGE: " . $message . "\003\002"));

    header('Location: ' . $webroot . '?p=global');
    $_SESSION['msg'] = $lang['global_message_sent'];
} elseif (isset($_POST['away'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));
    $quitaway = $sbnc->Call("getvalue", array("quitasaway"));

    if ($admin == 1) {
        if (isset($_POST['awaynick'])) {
            $sbnc->CallAs($ident, "setvalue", array("awaynick", $_POST['awaynick']));
        }
        if (isset($_POST['awaymessage'])) {
            $sbnc->CallAs($ident, "setvalue", array("awaymessage", $_POST['awaymessage']));
        }
        if ($quitaway != $_POST['quitaway']) {
            $sbnc->CallAs($ident, "setvalue", array("quitasaway", $_POST['quitaway']));
        }
    } else {
        if (isset($_POST['awaynick'])) {
            $sbnc->Call("setvalue", array("awaynick", $_POST['awaynick']));
        }
        if (isset($_POST['awaymessage'])) {
            $sbnc->Call("setvalue", array("awaymessage", $_POST['awaymessage']));
        }
        if ($quitaway != $_POST['quitaway']) {
            $sbnc->Call("setvalue", array("quitasaway", $_POST['quitaway']));
        }
    }
    header('Location: ' . $webroot . '?p=away');
    $_SESSION['msg'] = $lang['settings_saved'];
} elseif (isset($_POST['delvhost'])) {

    $ip = $_POST['ip'];

    $sbnc->Call('delvhost', array($ip));

    $_SESSION['msg'] = $lang['vhost_deleted'];
    header('Location: ' . $webroot . '?p=vhosts');
} elseif (isset($_POST['addvhost'])) {

    $ip = $_POST['ip'];
    $users = $_POST['users'];
    $host = $_POST['host'];

    $sbnc->Call('addvhost', array($ip, $users, $host));

    $_SESSION['addmsg'] = $lang['vhost_added'];
    header('Location: ' . $webroot . '?p=vhosts');
} elseif (isset($_POST['deltrustip'])) {

    $ip = $_POST['ip'];

    $sbnc->Call('removetrustedip', array($ip));

    header('Location: ' . $webroot . '?p=ipsettings');
    $_SESSION['addmsg'] = $lang['ip_removed'];
} elseif (isset($_POST['addtrustip'])) {

    $ip = $_POST['ip'];

    $sbnc->Call('addtrustedip', array($ip));

    header('Location: ' . $webroot . '?p=ipsettings');
    $_SESSION['addmsg'] = $lang['ip_added'];
} elseif (isset($_POST['edituser'])) {

    $ident = $_POST['ident'];
    $admin = $sbnc->CallAs($ident, 'getvalue', array('admin'));
    $quitaway = $sbnc->CallAs($ident, "getvalue", array("quitasaway"));

    if ($_POST['access'] != $admin) {
        if ($_POST['access'] == 1) {
            $sbnc->Call("admin", array("$ident"));
        } else {
            $sbnc->Call("unadmin", array("$ident"));
        }
    }
    if (!empty($_POST['server'])) {
        $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
    }
    if (!empty($_POST['port'])) {
        $sbnc->CallAs($ident, "setvalue", array("port", $_POST['port']));
    }
    if (isset($_POST['serverpassword'])) {
        $sbnc->CallAs($ident, "setvalue", array("serverpassword", $_POST['password']));
    }
    if (isset($_POST['awaynick'])) {
        $sbnc->CallAs($ident, "setvalue", array("awaynick", $_POST['awaynick']));
    }
    if (isset($_POST['awaymessage'])) {
        $sbnc->CallAs($ident, "setvalue", array("awaymessage", $_POST['awaymessage']));
    }
    if ($quitaway != $_POST['quitaway']) {
        $sbnc->CallAs($ident, "setvalue", array("quitasaway", $_POST['quitaway']));
    }
    if (!empty($_POST['vhost'])) {
        $sbnc->CallAs($ident, "setvalue", array("vhost", $_POST['vhost']));
    }
    if (!empty($_POST['realname'])) {
        $sbnc->CallAs("$ident", "setvalue", array("realname", $_POST['realname']));
    }
    if (!empty($_POST['nickname'])) {
        $sbnc->CallAs("$ident", "raw", array("nick $_POST[nickname]"));
    }
    if (!empty($_POST['password'])) {
        $sbnc->CallAs("$ident", "setvalue", array("password", $_POST['password']));
    }
    $_SESSION['msg'] = $lang['settings_saved'];
    header('Location: ' . $webroot . '?p=edit&u=' . $ident);
} elseif (isset($_POST['dojump'])) {

    $ident = $_POST['ident'];

    $sbnc->CallAs($ident, 'jump');
    header('Location: ' . $webroot . '?p=edit&u=' . $ident);
    $_SESSION['msg'] = $lang['reconnecting_user'];
} elseif (isset($_POST['deluser'])) {

    $sbnc->Call('deluser', array($_POST['delident']));

    $_SESSION['msg'] = $lang['user_deleted'];
    header('Location: ' . $webroot . '?p=users');
} elseif (isset($_POST['adduser'])) {

    $usrs = $sbnc->Call('tcl', array('bncuserlist'));
    $users = explode(" ", $usrs);

    if (in_array($_POST['ident'], $users)) {
        $_SESSION['msg'] = $lang['ident_taken'];
        header('Location: ' . $webroot . '?p=add');
    } else {
        if (empty($_POST['password'])) {
            $password = generatePassword('8');
        } else {
            $password = $_POST['password'];
        }

        $sbnc->Call('adduser', array($_POST['ident'], $password));

        $_SESSION['msg'] = $lang['bnc_added'] . " " . $_POST['ident'] . " " . $lang['password_added'] . " " . $password;
        header('Location: ' . $webroot . '?p=add');
    }
} elseif (isset($_POST['dellog'])) {

    $sbnc->Call('eraselog');
    $_SESSION['msg'] = $lang['log_erased'];
    header('Location: ' . $webroot . '?p=log');
} elseif (isset($_POST['jump'])) {

    $sbnc->Call('jump');
    header('Location: ' . $webroot . '?p=server');
    $_SESSION['msg'] = $lang['reconnecting'];
} elseif (isset($_POST['serversettings'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));

    if ($admin == 1) {
        if (!empty($_POST['server'])) {
            $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['port'])) {
            $sbnc->CallAs($ident, "setvalue", array("port", $_POST['port']));
        }
        if (!empty($_POST['password'])) {
            $sbnc->CallAs($ident, "setvalue", array("serverpassword", $_POST['password']));
        }
        if (!empty($_POST['server'])) {
            $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['vhost'])) {
            $sbnc->CallAs($ident, "setvalue", array("vhost", $_POST['vhost']));
        }
    } else {
        if (!empty($_POST['server'])) {
            $sbnc->Call("setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['port'])) {
            $sbnc->Call("setvalue", array("port", $_POST['port']));
        }
        if (!empty($_POST['password'])) {
            $sbnc->Call("setvalue", array("serverpassword", $_POST['password']));
        }
        if (!empty($_POST['server'])) {
            $sbnc->Call("setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['vhost'])) {
            $sbnc->Call("setvalue", array("vhost", $_POST['vhost']));
        }
    }
    header('Location: ' . $webroot . '?p=server');
    $_SESSION['msg'] = $lang['settings_saved'];
} elseif (isset($_POST['settings'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));

    if ($admin == 1) {
        if (!empty($_POST['realname'])) {
            $sbnc->CallAs("$ident", "setvalue", array("realname", $_POST['realname']));
        }
        if (!empty($_POST['nickname'])) {
            $sbnc->CallAs("$ident", "raw", array("nick $_POST[nickname]"));
        }
        if (!empty($_POST['password'])) {
            $sbnc->CallAs("$ident", "setvalue", array("password", $_POST['password']));
            if (isset($_COOKIE['password'])) {
                setcookie("password", $_POST['password'], $expire);
            } else {
                $_SESSION['password'] = $_POST['password'];
            }
        }
    } else {
        if (!empty($_POST['realname'])) {
            $sbnc->Call("setvalue", array("realname", $_POST['realname']));
        }
        if (!empty($_POST['nickname'])) {
            $sbnc->Call("raw", array("nick $_POST[nickname]"));
        }
        if (!empty($_POST['password'])) {
            $sbnc->Call("setvalue", array("password", $_POST['password']));
            if (isset($_COOKIE['password'])) {
                setcookie("password", $_POST['password'], $expire);
            } else {
                $_SESSION['password'] = $_POST['password'];
            }
        }
    }
    header('Location: ' . $webroot . '?p=settings');
    $_SESSION['msg'] = $lang['settings_saved'];
}
//LOGOUT
elseif (isset($_GET['logout'])) {
    if (isset($_COOKIE['ident'])) {
        setcookie("ident", "", time() - 3600);
        setcookie("password", "", time() - 3600);
    }
    session_destroy();
    header('Location: ' . $webroot . '');
}
//LOGIN
elseif (!empty($_POST['login'])) {

    global $bncServers;

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

    header('Location: ' . $webroot . '');
} else {
    header('Location: ' . $webroot . '');
}
?>
