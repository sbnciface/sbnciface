<?php

/*
 * $Id: settings.php 238 2010-05-04 20:54:56Z biohzn $
 *
 * Copyright (C) 2010 Conny Sjï¿½blom <biohzn@mustis.org>
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
//$ip = 'localhost';              //sBNC IP
//$port = '9000';                 //sBNC Port
$webroot = '/sbnciface/';       //Where the Interface is located


$bncServers = array(
    $server1 = array(
        $name = "Mustis BNCs",
        $ip = "localhost",
        $port = "9000"
    ),
);

//Interface Settings
$default_lang = "en";           //Available languages English - en, Swedish - sv, German - de.
$default_style = "grey";        //Available styles are simple_blue, simple_black.

$name = "shroudBNC Webinterface";

$expire = time() + 60 * 60 * 24;
?>