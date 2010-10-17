<?php

if (isset($_POST['join'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("join $channel"));

    //Fucking stupid fix because sBNC cant join fast enough
    header('Location:' . $webRoot . '?p=channels');
} elseif (isset($_POST['part'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("part $channel"));

    //Same thing with leave/part
    header('Location:' . $webRoot . '?p=channels');
}

$i = 0;
$channels = $sbnc->Call("getchannels");
if (is_a($channels, itype_exception)) {
    $sbncChans[$i]['channel'] = $lang['not_connected'];
} else {
    foreach ($channels as $channel) {
        $sbncChans[$i]['channel'] = $channel;
        $sbncChans[$i]['chanmodes'] = $sbnc->Call("getchanmodes", array($channel));
        $i++;
    }
}

$sbncNumChans = count($channels);

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/channels.tpl');
$data = new Dwoo_Data();

//Set data
$data->assign('joinchannelText', $lang['join_channel']);

$data->assign('jchannelText', $lang['channel']);
$data->assign('jchannelName', 'channel');

$data->assign('submitJoinValue', $lang['join']);
$data->assign('submitPartValue', $lang['part']);

$data->assign('channelName', $lang['channel']);
$data->assign('modesName', $lang['modes']);
$data->assign('actionName', $lang['action']);

$data->assign('sbncChannels', $sbncChans);
$data->assign('sbncNumChannels', $sbncNumChans);

$data->assign('submitValue', $lang['save_changes']);

//Include static values
include 'inc/static.php';

//Get the page
$content .= $dwoo->get($tpl, $data);

?>