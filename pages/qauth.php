<?php

if (isset($_POST['do'])) {

    if (isset($_POST['qauth'])) {
        $sbnc->Call("qsetuser", array($_POST['qauth']));
    }
    if (isset($_POST['qpass'])) {
        if ($QPassword != "Kl45sD34R") {
            $sbnc->Call("qsetpass", array($_POST['qpass']));
        }
    }
    if (isset($_POST['qmodex'])) {
        $sbnc->Call("qsetx", array($_POST['qmodex']));
    }

    $isset = '1';
    $type = 'success';
    $message = $lang['settings_saved'];
}


//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/qauth.tpl');
$data = new Dwoo_Data();

//Set data
$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('qauthText', $lang['q_authname']);
$data->assign('qauthName', 'qauth');
$data->assign('qauthValue', $sbnc->Call("qgetuser"));

$data->assign('qpassText', $lang['q_authpass']);
$data->assign('qpassName', 'qpass');
$data->assign('qpassValue', $sbnc->Call("qhaspass"));

$data->assign('qmodexText', $lang['q_modex']);
$data->assign('qmodexName', 'qmodex');
$data->assign('qmodexValue', $sbnc->Call("qgetx"));
$data->assign('qmodexValueYes', $lang['yes']);
$data->assign('qmodexValueNo', $lang['no']);

$data->assign('submitValue', $lang['save_changes']);

//Include static values
include 'inc/static.php';

//Get the page
$content .= $dwoo->get($tpl, $data);
?>