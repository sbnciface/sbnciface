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
  function sbnciface_get_root() {
    return substr($_SERVER['SCRIPT_NAME'], '0', strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
  }

  function sbnciface_get_temp_dir() {
    $root = sbnciface_get_root();
    if (is_dir("dwoo/compiled") && is_writable("dwoo/compiled")) {
      return realpath("dwoo/compiled");
    } else if (($temp = getenv("TMP")) && is_dir($temp) && is_writable($temp)) {
      return realpath($temp) . "/" . $_SERVER["SERVER_NAME"] . ((strlen($root)==1)?"":$root);
    } else if (($temp = getenv("TMPDIR")) && is_dir($temp) && is_writable($temp)) {
      return realpath($temp) . "/" . $_SERVER["SERVER_NAME"] . ((strlen($root)==1)?"":$root);
    } else if (($temp = getenv("TEMP")) && is_dir($temp) && is_writable($temp)) {
      return realpath($temp) . "/" . $_SERVER["SERVER_NAME"] . ((strlen($root)==1)?"":$root);
    } else if ((function_exists('sys_get_temp_dir')) && is_dir(sys_get_temp_dir()) && is_writable(sys_get_temp_dir())) {
      return realpath(sys_get_temp_dir()) . "/" . $_SERVER["SERVER_NAME"] . ((strlen($root)==1)?"":$root);
    } else {
      $tempfile = tempnam(md5(uniqid(rand(), TRUE)), '');
      if ($tempfile) {
        $tempdir = dirname($tempfile);
        unlink($tempfile);
        if (!($error = error_get_last())) {
          return realpath($tempdir) . "/" . $_SERVER["SERVER_NAME"] . ((strlen($root)==1)?"":$root);
        }
      }
    }
    return FALSE;
  }
  function sbnciface_create_temp_if_necessary() {
    /* Obivously, Dwoo is a fan of execute permissions. */
    if (is_writable(sbnciface_get_temp_dir()) || ($mkdir = @mkdir(sbnciface_get_temp_dir(), 0750, true))) {
      @chmodr(sbnciface_get_temp_dir(), 0750);
      return TRUE;
    }
    return FALSE;
  }

  function chmodr($path, $filemode) {
    if (!is_dir($path))
      return chmod($path, $filemode);

    $dh = opendir($path);
    while (($file = readdir($dh)) !== false) {
      if($file != '.' && $file != '..') {
        $fullpath = $path.'/'.$file;
        if(is_link($fullpath))
          return FALSE;
        elseif(!is_dir($fullpath) && !chmod($fullpath, $filemode))
          return FALSE;
        elseif(!chmodr($fullpath, $filemode))
          return FALSE;
      }
    }

    closedir($dh);

    if(chmod($path, $filemode))
      return TRUE;
    else
      return FALSE;
  }

  function byte_format($byte, $pre = 1, $abbr = true, $array = false, $bit = false) {
    /* Check All Arguments */
    if (!is_numeric($byte))
      return "Bytes given are not numerical!";
    if (!is_numeric($pre))
      return "Round precision is not numerical!";
    if (!is_bool($abbr))
      return "Abbreviation format argument is not a boolean!";
    if (!is_bool($array))
      return "Array argument is not a boolean!";
    if (!is_bool($bit))
      return "Bit conversion argument is not a boolean!";

    /* Format Arguments */
    if ($bit)
      $byte /= 8;

    /* Define Known Unit Types */
    $units = array(
      array("B", "Byte"),
      array("KB", "KiloByte"),
      array("MB", "MegaByte"),
      array("GB", "GigaByte"),
      array("TB", "TeraByte"),
      array("PB", "PetaByte"),
      array("EB", "ExaByte"),
      array("ZB", "ZettaByte"),
      array("YB", "YottaByte")
    );

    /* Start Conversion */
    $i = 0;

    while ($byte > 1024):
      $byte /= 1024;
      $i += 1;
    endwhile;

    /* Clean Up Bytes */
    $byte = round($byte, $pre);

    /* Format Units */
    if ($byte != 1)
      $s = "'s";

    /* Return Formatted Bytes */
    if (!$array)
      return ($abbr) ? $byte . " " . $units[$i][0] : $byte . " " . $units[$i][1] . $s;

    /* Return Formatted Array */
    $array = array();
    $array['bytes'] = $byte;
    $array['units'] = ($abbr) ? $units[$i][0] : $units[$i][1] . $s;
    return $array;
  }

  //Generate Random password
  function generatePassword($length) {
    $password = "";
    $possible = "0123456789abcdfghjklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ";
    $i = 0;

    while ($i < $length) {
      $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
      if (!strstr($password, $char)) {
        $password .= $char;
        $i++;
      }
    }
    return $password;
  }

  function userOnlineCheck($ident) {
    global $sbnc;
    $check = explode("<", $sbnc->Call("tcl", array("getbncuser $ident sessions")));
    if ($check['0'] == $ident) {
      return 'online';
    } else {
      return 'offline';
    }
  }

  function is_ip($address) {
    $packed = inet_pton($address);
    if (FALSE == $packed || FALSE === inet_ntop($packed)) {
      return FALSE;
    }
    return TRUE;
  }

  function getLangs() {
    if ($handle = opendir('lang/')) {
      while (false !== ($file = readdir($handle))) {
        if (is_file("lang/".$file)) {
          if (strlen($file) > 3) {
            $filedata = explode('.', $file);
            $langArray[$filedata[0]] = $file;
          }
        }
      }
      closedir($handle);
      return $langArray;
    }
  }

  function getFlags() {
    if ($handle = opendir('lang/img/')) {
      while (false !== ($file = readdir($handle))) {
        if (is_file("lang/img/".$file)) {
          if (strlen($file) > 3) {
            $filedata = explode('.', $file);
            $flagArray[$filedata[0]] = $file;
          }
        }
      }
      closedir($handle);
      return $flagArray;
    }
  }

?>
