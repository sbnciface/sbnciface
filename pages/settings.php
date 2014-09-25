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

if (isset($_POST['do'])) {
    $newRealname = $_POST['realname'];
    $newNickname = $_POST['nickname'];
    $newPassword = $_POST['password'];

    if ($admin == '1') {
        $newSysnotices = $_POST['sysnotices'];
    }

    $sbnc->Call('setvalue', array('realname', $newRealname));
    $sbnc->Call('raw', array('nick '. $newNickname));
    $sbnc->Call('setvalue', array('sysnotices', $newSysnotices));

    if (!empty($newPassword)) {
        $sbnc->Call('setvalue', array('password', $newPassword));
        $_SESSION['password'] = $newPassword;
        header('Location:' . $interfaceRoot . '?p=settings&s=y');
    }

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = $lang['misc_save_ok'];
}

if (isset($_GET['s'])) {
    if ($_GET['s'] == 'y') {
        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['misc_save_ok'];
    }
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('realnameValue', $sbnc->Call("getvalue", array("realname")));
$data->assign('nicknameValue', $sbnc->Call("getnick"));
$data->assign('passwordValue', '');

if ($admin == '1') {
    $data->assign('sysnoticesValue', $sbnc->Call("getvalue", array("sysnotices")));
}

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/settings.html'), $data);

?>
