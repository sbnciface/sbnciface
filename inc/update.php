<?php
/*
 * Copyright (C) 2010-2015 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2015 Arne Jensen   <darkdevil@darkdevil.dk>
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
  function uc_check_socket() {
    if (function_exists('fsockopen') && function_exists('fputs') && function_exists('feof') && function_exists('fgets') && function_exists('fclose') && function_exists('preg_split') && function_exists('fopen') && function_exists('fwrite')) {
      return TRUE;
    }
    return FALSE;
  }
  function uc_socket() {
    $fp = @fsockopen("update.sbnciface.org", 80, $errno, $errstr, 10);
    if ($fp == FALSE) { return FALSE; }
    fputs($fp, "GET /?type=rel HTTP/1.0\r\n");
    fputs($fp, "Host: update.sbnciface.org\r\n");
    fputs($fp, "User-Agent: " . AGENT_STRING . "\r\n");
    fputs($fp, "Connection: close\r\n\r\n");
    $fdata = null;
    while (!feof($fp)) {
      $fdata .= fgets($fp,512);
    }
    fclose($fp);
    if ($fdata == null) { return FALSE; }

    /* We don't care about headers! */
    $fres = preg_split('/(Content-Type\:.+?)[\r\n]+/i', $fdata, -1, PREG_SPLIT_DELIM_CAPTURE);

    /* [1] = headers, [2] = data: return data.*/
    return $fres[2];
  }
  $_SESSION["nst"] = sprintf("%s v%s.%s%s '%s'", APP_NAME, VERSION_MAJOR, VERSION_MINOR, ((VERSION_REVISION)>0?".".VERSION_REVISION:""), VERSION_CODENAME);

  function uc_data() {
    if (($file = (sbnciface_get_temp_dir()!==FALSE)?sbnciface_get_temp_dir()."updatecheck":FALSE)!==FALSE) {
      if (!file_exists($file) || (filemtime($file) < (time() - 10800))) {
        if (($data = uc_socket())!==FALSE) {
          $fp = @fopen($file, "w");
          @fwrite($fp, $data);
          @fclose($fp);
        }
      } else {
        $fp = @fopen($file, "r");
        $data = @fgets($fp, 512);
        @fclose($fp);
      }
      return $data;
    }
    return FALSE;
  }

  if (uc_check_socket() && (($updatedata = uc_data()) !== FALSE)) {
    $explode = explode(",", $updatedata);
    $version = sprintf("%d.%d.%d", VERSION_MAJOR, VERSION_MINOR, VERSION_REVISION);
    if(version_compare($explode[0], $version) > 0) {
      $_SESSION["uc"] = true;
      $_SESSION["uc_status"] = sprintf("A new update is available: Version %s (%s)", $explode[0], $explode[1]);
    } else {
      $_SESSION["uc"] = true;
      $_SESSION["uc_status"] = "OK";
   }
  } else {
    $version = sprintf("%d.%d.%d", VERSION_MAJOR, VERSION_MINOR, VERSION_REVISION);
    $_SESSION["uc"] = true;
    $_SESSION["uc_status"] = sprintf("An error occured while checking for updates, please check manually to make sure %s (%s) is the newest version available.", $version, VERSION_CODENAME);
  }
?>

