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

if (isset($_COOKIE['activeServer'])) {
    $activeServer = $_COOKIE['activeServer'];
}

if (isset($_POST['do'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $server = $_POST['server'];

        $sbncServer = $bncServers[$server]['ip'];
        $sbncPort = $bncServers[$server]['port'];

        $sbnc = new SBNC($sbncServer, $sbncPort, $username, $password);
        $result = $sbnc->Call("commands");

        if (is_a($result, 'itype_exception')) {
            
            $isset = '1';
            $type = 'error';
            $message = $lang['wrongUserPass'];
        } elseif (strlen($result['0']) < 6) {

            $isset = '1';
            $type = 'error';
            $message = $lang['wrongUserPass'];
        } else {

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['server'] = $server;
            setcookie('activeServer', "$server", $expire);
            header('Location:' . $interfaceRoot);
        }
    } else {

        $error['set'] = '1';
        $error['type'] = 'error';
        $error['message'] = $lang['wrong_user_pass'];
    }
}

for ($i = '0'; $i < count($bncServers); $i++) {
    $bncServers[$i]['num'] = $i;
}

//Set data
if (!empty($isset)) {
    $data->assign('errorSet', $isset);
    $data->assign('errorType', $type);
    $data->assign('errorMessage', $message);
}

$data->assign('usernameText', $lang['username']);
$data->assign('passwordText', $lang['password']);
$data->assign('serverText', $lang['server']);
$data->assign('submitText', $lang['login']);
$data->assign('bncServers', $bncServers);
if (isset($activeServer)) {
    $data->assign('bncServerActive', $activeServer);
} else {
    $data->assign('bncServerActive', FALSE);
}

//Get the page
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/login.html'), $data);
?>