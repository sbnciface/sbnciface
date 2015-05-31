<?php
/*
 * Copyright (C) 2010-2015 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2015 Arne Jensen   <darkdevil@darkdevil.dk>
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

if (!empty($_GET['u'])) {

    $users = explode(" ", $sbnc->Call('tcl', array('bncuserlist')));

    //Get ident
    $user = $_GET['u'];

    if (isset($_POST['do'])) {

        $newAccess = $_POST['access'];
        $newRealname = $_POST['realname'];
        $newNickname = $_POST['nickname'];
        $newPassword = $_POST['password'];
        $newServer = $_POST['server'];
        $newPort = $_POST['port'];
        $newServerPassword = $_POST['serverpass'];
        $newAwaynick = $_POST['awaynick'];
        $newAwaymessage = $_POST['awaymessage'];
        $newQuitasaway = $_POST['quitasaway'];
        $newVhost = (isset($_POST['vhostText']))?$_POST['vhostInput']:$_POST['vhost'];


        if ($newAccess == '1') {
            $sbnc->Call('admin', array($user));
        } else {
            $sbnc->Call('unadmin', array($user));
        }
        $sbnc->CallAs($user, 'setvalue', array('realname', $newRealname));
        $sbnc->CallAs($user, 'raw', array('nick '. $newNickname));
        if (!empty($newPassword)) {
            $sbnc->CallAs($user, 'setvalue', array('password', $newPassword));
        }
        $sbnc->CallAs($user, 'setvalue', array('server', $newServer));
        $sbnc->CallAs($user, 'setvalue', array('port', $newPort));
        if (!empty($newServerPassword)) {
            $sbnc->CallAs($user, 'setvalue', array('serverpassword', $newServerPassword));
        }
        $sbnc->CallAs($user, 'setvalue', array('awaynick', $newAwaynick));
        $sbnc->CallAs($user, 'setvalue', array('awaymessage', $newAwaymessage));
        $sbnc->CallAs($user, 'setvalue', array('quitasaway', $newQuitasaway));
        $sbnc->CallAs($user, 'setvalue', array('vhost', $newVhost));

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['misc_save_ok'];
    }

    if (isset($_POST['dojump'])) {
        $sbnc->CallAs($user, 'jump');

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = sprintf($lang['admin_users_edit_reconnecting'], $user);
    }

    if (in_array($user, $users)) {

        //Set data
        if (!empty($errorIsset)) {
            $data->assign('errorSet', $errorIsset);
            $data->assign('errorType', $errorType);
            $data->assign('errorMessage', $errorMessage);
        }

        $data->assign('activeUserText', $user);
        $data->assign('activeEditUserText', sprintf($lang['admin_users_edit_title'], $user));

        $data->assign('accessValue', $sbnc->CallAs($user, 'getvalue', array('admin')));
        $data->assign('realnameValue', $sbnc->CallAs($user, 'getvalue', array('realname')));
        $data->assign('nicknameValue', $sbnc->CallAs($user, 'getnick'));
        $data->assign('serverValue', $sbnc->CallAs($user, 'getvalue', array('server')));
        $data->assign('portValue', $sbnc->CallAs($user, 'getvalue', array('port')));
        $data->assign('serverPassValue', $sbnc->CallAs($user, 'getvalue', array("serverpass")));
        $data->assign('awaynickValue', $sbnc->CallAs($user, "getvalue", array("awaynick")));
        $data->assign('awaymessageValue', $sbnc->CallAs($user, "getvalue", array("awaymessage")));
        $data->assign('quitasawayValue', $sbnc->CallAs($user, "getvalue", array("quitasaway")));
        $data->assign('vhostInUse', $sbnc->CallAs($user, "getvalue", array("vhost")));
        $data->assign('vhostValue', $sbnc->CallAs($user, "getvhosts"));

        //Output the page
        $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
        $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
        $dwoo->output(new Dwoo_Template_File('template/' . $template . '/edit.html'), $data);
    } else {

        $errorIsset = '1';
        $errorType = 'staticerror';
        $errorMessage = sprintf($lang['admin_users_edit_invaliduser'], $user);

        include 'error.php';
    }
} else {
    include 'users.php';
}
?>
