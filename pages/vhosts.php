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

    if (isset($_POST['addvhost'])) {
        $newVhostIp = $_POST['ip'];
        $newVhostLimit = $_POST['limit'];
        $newVhostHost = $_POST['host'];

        if (!is_numeric($newVhostLimit)) {

            $errorIsset = 1;
            $errorType = 'error';
            $errorMessage = $lang['limitNotNumerical'];
        }
        elseif (is_ip($newVhostIp) == TRUE) {

            $newVhostLimit = $_POST['limit'];
            $newVhostHost = $_POST['host'];

            $sbnc->Call('addvhost', array($newVhostIp, $newVhostLimit, $newVhostHost));

            $errorIsset = 1;
            $errorType = 'success';
            $errorMessage = $lang['vhostAdded'];
        } else {

            $errorIsset = 1;
            $errorType = 'error';
            $errorMessage = $lang['trustIpNotValid'];
        }
    }

    if (isset($_POST['delvhost'])) {

        $delVhostIp = $_POST['delvhost'];

        $sbnc->Call('delvhost', array($delVhostIp));

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['vhostRemoved'];
    }

    $vhosts = $sbnc->Call('getvhosts');

    //Set data
    if (!empty($errorIsset)) {
        $data->assign('errorSet', $errorIsset);
        $data->assign('errorType', $errorType);
        $data->assign('errorMessage', $errorMessage);
    }

    $data->assign('ipText', $lang['ip']);
    $data->assign('userLimitText', $lang['userLimit']);
    $data->assign('hostText', $lang['host']);
    $data->assign('usersText', $lang['users']);
    $data->assign('actionsText', $lang['action']);

    $data->assign('vhostValue', $vhosts);

    //Output the page
    $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
    $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
    $dwoo->output(new Dwoo_Template_File('template/' . $template . '/vhosts.html'), $data);
} else {

    //No access, include error page.
    $errorIsset = '1';
    $errorType = 'staticerror';
    $errorMessage = $lang['noAccessToPage'];

    include 'error.php';
}
?>
