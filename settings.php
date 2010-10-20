<?php

//BNC Servers
$bncServers = array(
    $server1 = array(
        $name = 'Mustis BNC',
        $ip = 'localhost',
        $post = '9000',
    ),
    $server2 = array(
        $name = "DarkServ",
        $ip = "bnc.darkserv.net",
        $port = "9000"
    ),
);

//Interface settings
$webRoot = '/sbnciface3/';
$defautLang = 'en';
$defaultTemplate = 'sbnciface';

//Cookie Settings
$expire = time() + 60 * 60 * 24 * 30;   //Cookie lifetime Default: 30 days

//BETA VARS
$templateDir = $defaultTemplate;
?>
