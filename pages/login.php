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
            header('Location:' . $interfaceRoot . '?s=error');
        } elseif (strlen($result['0']) < 6) {
            header('Location:' . $interfaceRoot . '?s=error');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['server'] = $server;
            setcookie('activeServer', "$server", $expire);
            header('Location:' . $interfaceRoot);
        }
    } else {
        header('Location:' . $interfaceRoot . '?s=error');
    }
}

//Check for state
if (isset($_GET['s'])) {
    if ($_GET['s'] == 'error') {
        $errorIsset = 1;
        $errorType = 'error';
        $errorMessage = $lang['login_wrong_password'];
    }
}

$numBncServers = count($bncServers);

for ($i = '0'; $i < count($bncServers); $i++) {
    $bncServers[$i]['num'] = $i;
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('numBncServers', $numBncServers);
$data->assign('bncServers', $bncServers);
if (isset($activeServer)) {
    $data->assign('bncServerActive', $activeServer);
} else {
    $data->assign('bncServerActive', FALSE);
}

//Get the page
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/login.html'), $data);
?>
