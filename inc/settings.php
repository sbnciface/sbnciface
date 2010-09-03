<?php

/*
 * $Id$
 *
 * Copyright (C) 2010 Conny Sj.blom <biohzn@mustis.org>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
//sBNC Server Settings
$bncServers = array(
    $server = array(
        $name = "DarkServ",
        $ip = "bnc.darkserv.net",
        $port = "9000"
    ),
    $server = array(
        $name = "Mustis BNCs",
        $ip = "localhost",
        $port = "9000"
    ),
);

//Interface Settings
$default_lang = "en";                   //Check inc/lang folder for available languages
$default_style = "grey";                //Check css folder for available styles

$webroot = '/sbnciface/';               //Where the Interface is located
$name = "shroudBNC Webinterface";       //Name in <title></title>

//Cookie settings
$expire = time() + 60 * 60 * 24 * 30;   //Cookie lifetime
?>
