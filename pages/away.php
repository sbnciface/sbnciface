<?php

if (isset($_POST['do'])) {
    if (isset($_POST['awaynick'])) {
        $sbnc->Call("setvalue", array("awaynick", $_POST['awaynick']));
    }
    if (isset($_POST['awaymessage'])) {
        $sbnc->Call("setvalue", array("awaymessage", $_POST['awaymessage']));
    }
    if (isset($_POST['quitaway'])) {
        $sbnc->Call("setvalue", array("quitasaway", $_POST['quitaway']));
    }
    $isset = '1';
    $type = 'success';
    $message = $lang['settings_saved'];
}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/away.tpl');
$data = new Dwoo_Data();

//Set data
$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('awaynickText', $lang['awaynick']);
$data->assign('awaynickName', 'awaynick');
$data->assign('awaynickValue', $sbnc->Call("getvalue", array("awaynick")));

$data->assign('awaymessageText', $lang['awaymessage']);
$data->assign('awaymessageName', 'awaymessage');
$data->assign('awaymessageValue', $sbnc->Call("getvalue", array("awaymessage")));

$data->assign('quitasawayText', $lang['quit_as_away']);
$data->assign('quitasawayName', 'quitasaway');
$data->assign('quitasawayValue', $sbnc->Call("getvalue", array("quitasaway")));
$data->assign('quitasawayValueYes', $lang['yes']);
$data->assign('quitasawayValueNo', $lang['no']);

$data->assign('submitValue', $lang['save_changes']);

//Include static values
include 'inc/static.php';

//Get the page
$content .= $dwoo->get($tpl, $data);
?>