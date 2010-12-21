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

if ($admin == '1') {

    if (isset($_POST['delident'])) {
        $delIdent = $_POST['delident'];

        $sbnc->Call('deluser', array($delIdent));

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = sprintf($lang['userDeleted'], $delIdent);
    }

    //Get userlist and push into array
    $users = explode(" ", $sbnc->Call('tcl', array('bncuserlist')));

    $i = '0';
    $numAdmins = '0';
    $numUsers = '0';

    while ($i < count($users)) {

        $isAdmin = $sbnc->CallAs($users[$i], 'getvalue', array('admin'));

        if ($isAdmin == '1') {

            $numAdmins++;
            $adminArray[$numAdmins]['ident'] = $users[$i];
            $adminArray[$numAdmins]['nick'] = $sbnc->CallAs($users[$i], 'getnick');

            if (userOnlineCheck($users[$i]) == 'online') {
                $adminArray[$numAdmins]['lastseen'] = $lang['now'];
            } elseif ($sbnc->Call('tcl', array("getbncuser $users[$i] seen")) == '0') {
                $adminArray[$numAdmins]['lastseen'] = $lang['never'];
            } else {
                $adminArray[$numAdmins]['lastseen'] = date("d.m.Y H:i:s", $sbnc->Call('tcl', array("getbncuser $users[$i] seen")));
            }
        } else {

            $numUsers++;
            $userArray[$numUsers]['ident'] = $users[$i];
            $userArray[$numUsers]['nick'] = $sbnc->CallAs($users[$i], 'getnick');

            if (userOnlineCheck($users[$i]) == 'online') {
                $userArray[$numUsers]['lastseen'] = $lang['now'];
            } elseif ($sbnc->Call('tcl', array("getbncuser $users[$i] seen")) == '0') {
                $userArray[$numUsers]['lastseen'] = $lang['never'];
            } else {
                $userArray[$numUsers]['lastseen'] = date("d.m.Y H:i:s", $sbnc->Call('tcl', array("getbncuser $users[$i] seen")));
            }
        }
        $i++;
    }

    //Set data
    if (!empty($errorIsset)) {
        $data->assign('errorSet', $errorIsset);
        $data->assign('errorType', $errorType);
        $data->assign('errorMessage', $errorMessage);
    }

    $data->assign('identText', $lang['ident']);
    $data->assign('nickText', $lang['nickname']);
    $data->assign('lastseenText', $lang['lastSeen']);
    $data->assign('actionText', $lang['action']);
    $data->assign('userText', $lang['users']);
    $data->assign('adminText', $lang['administrators']);
    $data->assign('reallyDeleteText', $lang['reallyDelete']);

    $data->assign('adminArray', $adminArray);
    $data->assign('userArray', $userArray);
    $data->assign('numAdmins', $numAdmins . ' ' . $lang['administrators']);
    $data->assign('numUsers', $numUsers . ' ' . $lang['users']);

    //Output the page
    $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
    $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
    $dwoo->output(new Dwoo_Template_File('template/' . $template . '/users.html'), $data);
} else {

    //No access, include error page.
    $errorIsset = '1';
    $errorType = 'staticerror';
    $errorMessage = $lang['noAccessToPage'];

    include 'error.php';
}
?>