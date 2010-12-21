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

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$traff = $sbnc->Call("gettraffic");

$data->assign('nicknameText', $lang['nickname']);
$data->assign('uptimeText', $lang['uptime']);
$data->assign('disconnectedText', $lang['disconnected']);
$data->assign('awaynickText', $lang['awaynick']);
$data->assign('awaymessageText', $lang['awaymessage']);
$data->assign('realnameText', $lang['realname']);
$data->assign('serverText', $lang['server']);
$data->assign('trafficText', $lang['traffic']);

$data->assign('nicknameValue', $sbnc->Call('getnick'));
$data->assign('uptimeValue', $sbnc->Call('getvalue', array('uptime')));
$data->assign('awaynickValue', $sbnc->Call('getvalue', array('awaynick')));
$data->assign('awaymessageValue', $sbnc->Call('getvalue', array('awaymessage')));
$data->assign('realnameValue', $sbnc->Call('getvalue', array('realname')));
$data->assign('serverValue', $sbnc->Call('getvalue', array('server')) . ':' . $sbnc->Call('getvalue', array('port')));
$data->assign('trafficValue', 'In: ' . byte_format($traff[2], 2) . '<br />Out: ' . byte_format($traff[3], 2));

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/status.html'), $data);

?>