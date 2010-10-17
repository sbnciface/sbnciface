<?php

if (isset($_POST['jump'])) {

    $sbnc->Call('jump');

    $isset = '1';
    $type = 'success';
    $message = $lang['reconnecting'];

} elseif (isset($_POST['do'])) {
    if (!empty($_POST['server'])) {
        $sbnc->Call("setvalue", array("server", $_POST['server']));
    }
    if (!empty($_POST['port'])) {
        $sbnc->Call("setvalue", array("port", $_POST['port']));
    }
    if (!empty($_POST['password'])) {
        $sbnc->Call("setvalue", array("serverpassword", $_POST['password']));
    }
    if (!empty($_POST['server'])) {
        $sbnc->Call("setvalue", array("server", $_POST['server']));
    }
    if (!empty($_POST['vhost'])) {
        $sbnc->Call("setvalue", array("vhost", $_POST['vhost']));
    }

    $isset = '1';
    $type = 'success';
    $message = $lang['settings_saved'];

}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/server.tpl');
$data = new Dwoo_Data();

$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('serverText', $lang['server']);
$data->assign('serverName', 'server');
$data->assign('serverValue', $sbnc->Call("getvalue", array("server")));

$data->assign('portText', $lang['port']);
$data->assign('portName', 'port');
$data->assign('portValue', $sbnc->Call("getvalue", array("port")));

$data->assign('passwordText', $lang['password']);
$data->assign('passwordName', 'password');
$data->assign('passwordValue', $sbnc->Call("getvalue", array("serverpass")));

$data->assign('vhostInUse', $sbnc->Call("getvalue", array("vhost")));
$data->assign('vhostText', $lang['vhost']);
$data->assign('vhostName', 'vhost');
$data->assign('vhostValue', $sbnc->Call("getvhosts"));

$data->assign('submitValue', $lang['save_changes']);
$data->assign('jumpValue', $lang['jump']);

//Get the page
$content .= $dwoo->get($tpl, $data);

?>
