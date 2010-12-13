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
    $newAwaynick = $_POST['awaynick'];
    $newAwaymessage = $_POST['awaymessage'];
    $newQuitasaway = $_POST['quitasaway'];

    $sbnc->Call('setvalue', array('awaynick', $newAwaynick));
    $sbnc->Call('setvalue', array('awaymessage', $newAwaymessage));
    $sbnc->Call('setvalue', array('quitasaway', $newQuitasaway));

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = $lang['settingsSaved'];
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('awaynickText', $lang['awaynick']);
$data->assign('awaymessageText', $lang['awaymessage']);
$data->assign('quitasawayText', $lang['quitAsAway']);

$data->assign('awaynickValue', $sbnc->Call("getvalue", array("awaynick")));
$data->assign('awaymessageValue', $sbnc->Call("getvalue", array("awaymessage")));
$data->assign('quitasawayValue', $sbnc->Call("getvalue", array("quitasaway")));

$data->assign('quitasawayValueYes', $lang['yes']);
$data->assign('quitasawayValueNo', $lang['no']);

$data->assign('submitValue', $lang['saveChanges']);

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/away.html'), $data);

?>
