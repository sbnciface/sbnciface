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

if (isset($_POST['do'])) {
    $newServer = $_POST['server'];
    $newPort = $_POST['port'];
    $newPassword = $_POST['password'];
    $newVhost = $_POST['vhost'];

    $sbnc->Call('setvalue', array('server', $newServer));
    $sbnc->Call('setvalue', array('port', $newPort));
    if (!empty($newPassword)) {
        $sbnc->Call('setvalue', array('serverpassword', $newPassword));
    }
    $sbnc->Call('setvalue', array('vhost', $newVhost));

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = $lang['settingsSaved'];
}

if (isset($_POST['jump'])) {
    $sbnc->Call('jump');

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = $lang['reconnecting'];
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('serverText', $lang['server']);
$data->assign('portText', $lang['port']);
$data->assign('passwordText', $lang['password']);
$data->assign('vhostText', $lang['vhost']);

$data->assign('serverValue', $sbnc->Call("getvalue", array("server")));
$data->assign('portValue', $sbnc->Call("getvalue", array("port")));
$data->assign('passwordValue', $sbnc->Call("getvalue", array("serverpass")));
$data->assign('vhostValue', $sbnc->Call("getvhosts"));
$data->assign('submitValue', $lang['saveChanges']);

$data->assign('vhostInUse', $sbnc->Call("getvalue", array("vhost")));
$data->assign('jumpValue', $lang['jump']);

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/server.html'), $data);
?>