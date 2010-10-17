<?php
//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/error.tpl');
$data = new Dwoo_Data();

$data->assign('errorSet', $isset);
$data->assign('errorType', $type);
$data->assign('errorMessage', $message);

//Get the page
$content .= $dwoo->get($tpl, $data);
?>
