<?php
//sBNC Checks
if (isset($_SESSION['username'])){
    $data->assign('sbncAdmin', $sbnc->Call('getvalue', array('admin')));
}

//Static Interface Settings
$data->assign('interfaceName', 'sBNC Interface 1.0');
$data->assign('ifaceVersion', 'Version 1.0 \'Revolution\'');
$data->assign('webRoot', $webRoot);

//User Menu
$data->assign('status', $lang['status']);
$data->assign('user', $lang['user']);
$data->assign('settings', $lang['settings']);
$data->assign('server', $lang['server']);
$data->assign('q_settings', $lang['q_settings']);
$data->assign('away', $lang['away']);
$data->assign('channels', $lang['channels']);
$data->assign('log', $lang['log']);

//Admin Menu
$data->assign('admin', $lang['admin']);
$data->assign('users', $lang['users']);
$data->assign('add_user', $lang['add_user']);
$data->assign('trusted_ips', $lang['trusted_ips']);
$data->assign('vhosts', $lang['vhosts']);
$data->assign('global_msg', $lang['global_msg']);

$data->assign('logout', $lang['logout']);
?>
