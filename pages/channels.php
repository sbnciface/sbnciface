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

if (isset($_POST['join'])) {
    $newChannel = $_POST['joinchannel'];

    if (substr($newChannel, 0, 1) != '#') {
        $newChannel = '#' . $newChannel;
    }

    $sbnc->Call('raw', array('join ' . $newChannel));

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = sprintf($lang['user_channels_join_ok'], $newChannel);
}

if (isset($_POST['part'])) {
    $partChannel = $_POST['channel'];

    $sbnc->Call('raw', array('part ' . $partChannel));

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = sprintf($lang['user_channels_part_ok'], $partChannel);
}

if (isset($_POST['part']) || isset($_POST['join'])) {
    sleep(2);
}

$channels = $sbnc->Call("getchannels");

$i = 0;
if (is_a($channels, 'itype_exception')) {
    $sbncChans[$i]['channel'] = $lang['user_channels_not_connected'];
} else {
    foreach ($channels as $channel) {
        $sbncChans[$i]['channel'] = $channel;
        $sbncChans[$i]['chanmodes'] = $sbnc->Call("getchanmodes", array($channel));
        $i++;
    }
}

$sbncNumChans = count($channels);

$maxChannels = intval($sbnc->Call("getisupport", array("MAXCHANNELS")));
$data->assign('maxChannels', $maxChannels);
if ($sbncNumChans >= $maxChannels) {
  $data->assign('maxChannelsWarning', sprintf($lang['user_channels_already_maxchannels'], $maxChannels));
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('sbncChannels', $sbncChans);
$data->assign('sbncNumChannels', $sbncNumChans);

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/channels.html'), $data);
?>
