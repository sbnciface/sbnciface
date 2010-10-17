<?php

if (isset($_POST['do'])){
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sbncServer = $bncServers['0']['1'];
        $sbncPort = $bncServers['0']['2'];

        $sbnc = new SBNC("$sbncServer", "$sbncPort", "$username", "$password");
        $result = $sbnc->Call("commands");
        
        if (strlen($result['0']) < 6) {
            $error['set'] = '1';
            $error['type'] = 'error';
            $error['message'] = $lang['wrong_user_pass'];
        } else if ($_POST['remember'] == '1') {
            setcookie("username", "$username", $expire);
            setcookie("password", "$password", $expire);
            header('Location:'.$webRoot);
        } else {
            $_SESSION['username'] = "$username";
            $_SESSION['password'] = "$password";
            header('Location:'.$webRoot);
        }
    } else {
        $error['set'] = '1';
        $error['type'] = 'error';
        $error['message'] = $lang['wrong_user_pass'];
    }
}

//Select template
$tpl = new Dwoo_Template_File('template/'.$templateDir.'/login.tpl');

//Set data
$data = new Dwoo_Data();

$data->assign('usernameText', $lang['username']);
$data->assign('passwordText', $lang['password']);

$data->assign('bncServers', $bncServers);
$data->assign('bncServerCount', count($bncServers));

$data->assign('rememberMeText', $lang['remember_me']);
$data->assign('submitText', $lang['login']);

//Include static values
include 'inc/static.php';

//Show the page
$dwoo->output($tpl, $data);
?>