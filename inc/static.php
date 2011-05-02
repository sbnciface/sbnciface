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

//sBNC Checks
if (isset($_SESSION['username']) && !isset($_SESSION['isAdmin'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));
    $vadmin = $sbnc->Call('isvadmin', array($_SESSION['username']));

    if ($admin == '0' && $vadmin == '1') {
        $vgroup = $sbnc->Call('getmygroup');
    } else {
        $vadmin = '0';
        $vgroup = 'none';
    }
}

//Static Interface Vars
$data->assign('ifaceName', 'sBNC Interface v1.2');
$data->assign('ifaceVersion', 'Version 1.2');
$data->assign('ifaceCodename', 'Cindi');
$data->assign('ifaceRoot', $interfaceRoot);

//Admin & Vadmin Vars
if (isset($admin)) {
    $data->assign('sbncAdmin', $admin);
}
if (isset($vadmin)) {
    $data->assign('sbncVAdmin', $vadmin);
}
if (isset($vgroup)) {
    $data->assign('sbncVGroup', $vgroup);
}

//User Menu
$data->assign('status', $lang['status']);
$data->assign('user', $lang['user']);
$data->assign('settings', $lang['settings']);
$data->assign('server', $lang['server']);
$data->assign('authSettings', $lang['authSettings']);
$data->assign('away', $lang['away']);
$data->assign('channels', $lang['channels']);
$data->assign('log', $lang['log']);

//Vadmin Menu
$data->assign('vAdmin', $lang['vAdmin']);
$data->assign('users', $lang['users']);
$data->assign('addUser', $lang['addUser']);

//Admin Menu
$data->assign('admin', $lang['admin']);
$data->assign('users', $lang['users']);
$data->assign('addUser', $lang['addUser']);
$data->assign('trustedIps', $lang['trustedIps']);
$data->assign('vhosts', $lang['vhosts']);
$data->assign('globalMsg', $lang['globalMsg']);
$data->assign('mainLog', $lang['mainLog']);

$data->assign('logout', $lang['logout']);

//Time
$data->assign('days', $lang['days']);
$data->assign('hours', $lang['hours']);
$data->assign('minutes', $lang['minutes']);
$data->assign('seconds', $lang['seconds']);

?>
