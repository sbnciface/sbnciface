<?php

//Set data
$data->assign('uptimeText', $lang['uptime']);
$data->assign('uptimeValue', $sbnc->Call("getvalue", array("uptime")));
$data->assign('uptimeDisconnected', $lang['disconnected']);

$data->assign('nicknameText', $lang['nickname']);
$data->assign('nicknameValue', $sbnc->Call("getnick"));

$data->assign('awaynickText', $lang['awaynick']);
$data->assign('awaynickValue', $sbnc->Call("getvalue", array("awaynick")));

$data->assign('awaymessageText', $lang['awaymessage']);
$data->assign('awaymessageValue', $sbnc->Call("getvalue", array("awaymessage")));

$data->assign('realnameText', $lang['realname']);
$data->assign('realnameValue', $sbnc->Call("getvalue", array("realname")));

$data->assign('serverText', $lang['server']);
$data->assign('serverValue', $sbnc->Call("getvalue", array("server")) . ":" . $sbnc->Call("getvalue", array("port")));

$traff = $sbnc->Call("gettraffic");
$data->assign('trafficText', $lang['traffic']);
$data->assign('trafficValue', 'In: ' . byte_format($traff[2], 2) . '<br />Out: ' . byte_format($traff[3], 2));

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/status.html'), $data);

?>