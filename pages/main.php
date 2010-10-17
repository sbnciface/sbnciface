<?php

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/main.tpl');
$data = new Dwoo_Data();

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

//Include static values
include 'inc/static.php';

//Get the page
$content .= $dwoo->get($tpl, $data);

?>
