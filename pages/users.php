<?php

if (isset($_POST['delident'])) {

    $sbnc->Call('deluser', array($_POST['delident']));

    $isset = '1';
    $type = 'success';
    $message = sprintf($lang['user_deleted'], $_POST['delident']);

}

//Select template
$tpl = new Dwoo_Template_File('template/' . $templateDir . '/users.tpl');
$data = new Dwoo_Data();

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
        $adminArray[$numAdmins]['lastseen'] = date("d.m.Y H:i:s", $sbnc->Call('tcl', array("getbncuser $users[$i] seen")));
        
    } else {

        $numUsers++;
        $userArray[$numUsers]['ident'] = $users[$i];
        $userArray[$numUsers]['nick'] = $sbnc->CallAs($users[$i], 'getnick');
        $userArray[$numUsers]['lastseen'] = date("d.m.Y H:i:s", $sbnc->Call('tcl', array("getbncuser $users[$i] seen")));
    }
    $i++;
}

$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('identText', $lang['ident']);
$data->assign('nickText', $lang['nickname']);
$data->assign('lastseenText', $lang['last_seen']);
$data->assign('actionText', $lang['action']);

$data->assign('userText', $lang['users']);
$data->assign('adminText', $lang['administrators']);

$data->assign('adminArray', $adminArray);
$data->assign('userArray', $userArray);

$data->assign('numAdmins', $numAdmins);
$data->assign('numUsers', $numUsers);

//Get the page
$content .= $dwoo->get($tpl, $data);

//var_dump($_POST);

?>