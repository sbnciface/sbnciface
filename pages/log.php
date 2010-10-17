<?php

if (isset($_POST['do'])) {

    $sbnc->Call('eraselog');
    $_SESSION['msg'] = $lang['log_erased'];
}

$log = $sbnc->Call('getlog', array("0", "999"));

//Checks for the log, to make it all look nice, and give no errors
if (is_a($log, itype_exception)) {
    $logState = "empty";
    $logString = "<div class=\"mid\"><b>" . $lang['log_empty'] . ".</b></div>";
} else {
        if (count($log) == 0) {
            $logState = "empty";
            $logString = "<div class=\"mid\"><b>" . $lang['log_empty'] . ".</b></div>";
        } else {
            $logString = $log;
        }
}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/log.tpl');
$data = new Dwoo_Data();

//Set data
$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

$data->assign('logState', $logState);
$data->assign('logString', $logString);

$data->assign('submitValue', $lang['empty_log']);

//Include static values
include 'inc/static.php';

//Get the page
$content .= $dwoo->get($tpl, $data);

?>