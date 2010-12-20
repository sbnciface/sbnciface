<?php
/*
 * $Id$
 *
 * Copyright (C) 2010 Conny Sjöblom <biohzn@mustis.org>
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

//BNC Servers
$bncServers = array(
    $sbncsrv0 = array(
        'name'  =>  'DarkServ',
        'ip'    =>  'bnc.darkserv.net',
        'port'  =>  '9000'
    ),
    $sbncsrv1 = array(
        'name'  =>  'Mustis',
        'ip'    =>  'localhost',
        'port'  =>  '9000'
    ),
);

//Cookie Settings
$expire = time() + 60 * 60 * 24 * 30;

//Template directory
$interfaceRoot = '/sbnciface4';

//Default language
$defaultLang = 'en';

//Select template
$template = 'sbnciface';

?>