<?php

if (isset($_POST['do'])) {

    if (!empty($_POST['realname'])) {
        $sbnc->Call("setvalue", array("realname", $_POST['realname']));
    }
    if (!empty($_POST['nickname'])) {
        $sbnc->Call("raw", array("nick $_POST[nickname]"));
    }
    if (!empty($_POST['password'])) {
        $sbnc->Call("setvalue", array("password", $_POST['password']));
        if (isset($_COOKIE['password'])) {
            setcookie("password", $newPassword, $expire);
        } else {
            $_SESSION['password'] = $newPassword;
        }
    }

    $isset = '1';
    $type = 'success';
    $message = 'Settings saved';
}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/settings.tpl');
$data = new Dwoo_Data();

$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('realnameText', $lang['realname']);
$data->assign('realnameName', 'realname');
$data->assign('realnameValue', $sbnc->Call("getvalue", array("realname")));

$data->assign('nicknameText', $lang['nickname']);
$data->assign('nicknameName', 'nickname');
$data->assign('nicknameValue', $sbnc->Call("getnick"));

$data->assign('passwordText', $lang['password']);
$data->assign('passwordName', 'password');
$data->assign('passwordValue', '');

$data->assign('submitValue', $lang['save_changes']);

//Get the page
$content .= $dwoo->get($tpl, $data);
?>
