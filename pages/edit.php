<?php
/*
 * $Id: edit.php 3 2011-05-04 16:02:41Z BiohZn $
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
        $newVhost = $_POST['vhost'];


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
        $errorMessage = $lang['settingsSaved'];
    }

    if (isset($_POST['dojump'])) {
        $sbnc->CallAs($user, 'jump');

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['reconnecting'];
    }

    if (in_array($user, $users)) {

        //Set data
        if (!empty($errorIsset)) {
            $data->assign('errorSet', $errorIsset);
            $data->assign('errorType', $errorType);
            $data->assign('errorMessage', $errorMessage);
        }

        $data->assign('activeUserText', $user);
        $data->assign('activeEditUserText', sprintf($lang['changingOptions'], $user));
        $data->assign('accessText', $lang['access']);
        $data->assign('adminText', $lang['admin']);
        $data->assign('userText', $lang['user']);
        $data->assign('realnameText', $lang['realname']);
        $data->assign('nicknameText', $lang['nickname']);
        $data->assign('passwordText', $lang['password']);
        $data->assign('serverText', $lang['server']);
        $data->assign('portText', $lang['port']);
        $data->assign('serverPassText', $lang['serverPassword']);
        $data->assign('awaynickText', $lang['awaynick']);
        $data->assign('awaymessageText', $lang['awaymessage']);
        $data->assign('quitasawayText', $lang['quitAsAway']);
        $data->assign('yesText', $lang['yes']);
        $data->assign('noText', $lang['no']);
        $data->assign('vhostText', $lang['vhost']);

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

        $data->assign('jumpValue', $lang['jump']);
        $data->assign('submitValue', $lang['saveChanges']);

        //Output the page
        $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
        $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
        $dwoo->output(new Dwoo_Template_File('template/' . $template . '/edit.html'), $data);
    } else {

        $errorIsset = '1';
        $errorType = 'staticerror';
        $errorMessage = sprintf($lang['invalidUser'], $user);

        include 'error.php';
    }
} else {
    include 'users.php';
}
?>