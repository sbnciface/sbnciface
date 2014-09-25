<?php
/*
 * Copyright (C) 2010-2014 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2014 Arne Jensen   <darkdevil@darkdevil.dk>
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
  define('APP_NAME'        , "sbnciface");
  define('VERSION_MAJOR'   , 1);
  define('VERSION_MINOR'   , 3);
  define('VERSION_REVISION', 0);
  define('VERSION_CODENAME', "Biofix");
  define('AGENT_STRING'    , sprintf("%s/%s.%s%s (%s)", APP_NAME, VERSION_MAJOR, VERSION_MINOR, ((VERSION_REVISION)>0?".".VERSION_REVISION:""), VERSION_CODENAME));

  $ifaceCmds = array();
  $userLocks = array();
  $vhostList = array();

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

    $cmdCheck = $sbnc->Call("commands");
    $cmdResult = GetResult($cmdCheck);
    foreach ($cmdResult as $ifaceCmd) {
      $ifaceCmds[$ifaceCmd] = 1;
    }
    if (isset($ifaceCmds["getuserlocks"])) {
      $lockCheck = $sbnc->Call("getuserlocks");
      $lockResult = GetResult($lockCheck);
      foreach ($lockResult as $userLock) {
        $userLocks[$userLock] = 1;
      }
    } else { $userLocks = NULL; }
    if (isset($ifaceCmds["getvhosts"])) {
      $vhostList = $sbnc->Call("getvhosts");
    }
  }

  if (!isset($_SESSION["uc"])) {
    include 'update.php';
  }
  $data->assign('nst', $_SESSION["nst"]);
  $data->assign('updateCheck', $_SESSION["uc"]);
  $data->assign('updateStatus', $_SESSION["uc_status"]);

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
  $data->assign('ifaceName', sprintf("sBNC Interface v%s.%s%s", VERSION_MAJOR, VERSION_MINOR, ((VERSION_REVISION)>0?".".VERSION_REVISION:"")));
  $data->assign('ifaceCopyright', sprintf("<a href=\"http://www.sbnciface.org\">sbnciface</a> v%s.%s%s '%s' &copy 2010-2014 Conny Sjöblom, Arne Jensen and the sbnciface project.", VERSION_MAJOR, VERSION_MINOR, ((VERSION_REVISION)>0?".".VERSION_REVISION:""), VERSION_CODENAME));
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

  // Global list of available iface commands, lock setting, vhosts, etc.
  $data->assign('ifaceCmds', $ifaceCmds);
  $data->assign('userLocks', $userLocks);
  $data->assign('vhostValue', $vhostList);

  // Language
  $data->assign('lang', $lang);

?>
