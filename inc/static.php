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

//sBNC Checks
if (isset($_SESSION['username']) && !isset($_SESSION['isAdmin'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));
    $vadmin = $sbnc->Call('isvadmin', array($_SESSION['username']));

    if ($admin == '0' && $vadmin == '1') {
        $vgroup = $sbnc->Call('getmygroup');
    } else {
        $vadmin = '0';
        $vgroup = 'none';
    }
}

//Languages
$langArray = getLangs();
$flagArray = getFlags();
ksort($langArray);
$i=0;
foreach ($langArray as $langKey=>$langFile) {
    if (array_key_exists($langKey, $flagArray)) {
        $availLangs[$i] = "<a href=\"javascript:\" onclick=\"pickLanguage('$langKey');\"><img src=\"".$interfaceRoot."lang/img/$flagArray[$langKey]\" alt=\"$langKey\" /></a>";
        $i++;
    }
}

$data->assign('langArray', $availLangs);

//Static Interface Vars
$data->assign('ifaceName', 'sBNC Interface v1.2');
$data->assign('ifaceVersion', 'Version 1.2');
$data->assign('ifaceCodename', 'Cindi');
$data->assign('ifaceRoot', $interfaceRoot);

//Admin & Vadmin Vars
if (isset($admin)) {
    $data->assign('sbncAdmin', $admin);
}
if (isset($vadmin)) {
    $data->assign('sbncVAdmin', $vadmin);
}
if (isset($vgroup)) {
    $data->assign('sbncVGroup', $vgroup);
}

    /* Navigation                           
    'nav_status'                  => 'Status',

    'nav_user'                    => 'User',
    'nav_user_settings'           => 'Settings',
    'nav_user_server'             => 'Server',
    'nav_user_authsettings'       => 'Auth settings',
    'nav_user_away'               => 'Away',
    'nav_user_channels'           => 'Channels',
    'mav_user_log'                => 'Log',

    'nav_admin'                   => 'Administrator',
    'nav_admin_users'             => 'Users',
    'nav_admin_adduser'           => 'Add user',
    'nav_admin_trustedips'        => 'Trusted IPs',
    'nav_admin_vhosts'            => 'Vhosts',
    'nav_admin_globalmsg'         => 'Global message',
    'nav_admin_mainlog'           => 'Mainlog',

    'nav_logout'                  => 'Logout',
*/

//User Menu
$data->assign('status', $lang['nav_status']);
$data->assign('user', $lang['nav_user']);
$data->assign('settings', $lang['nav_user_settings']);
$data->assign('server', $lang['nav_user_server']);
$data->assign('authSettings', $lang['nav_user_authsettings']);
$data->assign('away', $lang['nav_user_away']);
$data->assign('channels', $lang['nav_user_channels']);
$data->assign('log', $lang['nav_user_log']);

//Vadmin Menu
$data->assign('vAdmin', $lang['vAdmin']);
$data->assign('users', $lang['users']);
$data->assign('addUser', $lang['addUser']);

//Admin Menu
$data->assign('admin', $lang['nav_admin']);
$data->assign('users', $lang['nav_admin_users']);
$data->assign('addUser', $lang['nav_admin_adduser']);
$data->assign('trustedIps', $lang['nav_admin_trustedips']);
$data->assign('vhosts', $lang['nav_admin_vhosts']);
$data->assign('globalMsg', $lang['nav_admin_globalmsg']);
$data->assign('mainLog', $lang['nav_admin_mainlog']);

$data->assign('logout', $lang['nav_logout']);

//Time
$data->assign('days', $lang['misc_days']);
$data->assign('hours', $lang['misc_hours']);
$data->assign('minutes', $lang['misc_minutes']);
$data->assign('seconds', $lang['misc_seconds']);

?>
