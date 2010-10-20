<?php

if (isset($_POST['adduser'])) {

    $usrs = $sbnc->Call('tcl', array('bncuserlist'));
    $users = explode(" ", $usrs);

    if (in_array($_POST['ident'], $users)) {
        $isset = '1';
        $type = 'error';
        $message = $lang['ident_taken'];
    } else {
        if (empty($_POST['password'])) {
            $password = generatePassword('8');
        } else {
            $password = $_POST['password'];
        }

        $sbnc->Call('adduser', array($_POST['ident'], $password));

        $isset = '1';
        $type = 'success';
        $message = sprintf($lang['bnc_added'], $_POST['ident'], $password);
    }
}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/add.tpl');
$data = new Dwoo_Data();

$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('passwordEmptyText', $lang['if_password_empty']);

$data->assign('identLangText', $lang['ident']);
$data->assign('passwordLangText', $lang['password']);
$data->assign('identName', 'ident');
$data->assign('passwordName', 'password');
$data->assign('adduserLangText', $lang['add_user']);
$data->assign('adduserName', 'adduser');


//Get the page
$content .= $dwoo->get($tpl, $data);

?>