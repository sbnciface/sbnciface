<?php

/*
 * $Id: functions.php 238 2010-05-04 20:54:56Z biohzn $
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

//Set BNC Server
function setServerToUse() {
    global $lang;
    global $bncServers;

    if (count($bncServers) > '1') {
        echo "<tr><td>" . $lang['server'] . ":</td><td>";
        echo "<select name=\"setserver\" style=\"width: 145px;\">";
        for ($i = 0; $i < count($bncServers); $i++) {
            echo "<option value=\"$i\">" . $bncServers[$i]['0'] . "</option>";
        }
        echo "</select>";
        echo "</td></tr>";
    }
}

//User Access Select
function getQuitAway($status) {
    global $lang;
    if ($status == 1) {
        return "<select name=\"quitaway\" style=\"width:225px;\"><option value=\"1\" selected>{$lang['on']}</option><option value=\"0\">{$lang['off']}</option></select>";
    } else {
        return "<select name=\"quitaway\" style=\"width:225px;\"><option value=\"1\">{$lang['on']}</option><option value=\"0\" selected>{$lang['off']}</option></select>";
    }
}

function getUserAccess($access, $user, $admin) {
    global $lang;
    if ($user == $admin) {
        if ($access == 1) {
            return "<select name=\"access\" style=\"width:225px;\" disabled><option value=\"1\" selected>{$lang['administrator']}</option><option value=\"0\">{$lang['user']}</option></select>";
        }
    } else {
        if ($access == 1) {
            return "<select name=\"access\" style=\"width:225px;\"><option value=\"1\" selected>{$lang['administrator']}</option><option value=\"0\">{$lang['user']}</option></select>";
        } else {
            return "<select name=\"access\" style=\"width:225px;\"><option value=\"1\">{$lang['administrator']}</option><option value=\"0\" selected>{$lang['user']}</option></select>";
        }
    }
}

//Generate Random password

function generatePassword($length) {

    // start with a blank password
    $password = "";

    // define possible characters
    $possible = "0123456789abcdfghjklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ";

    // set up a counter
    $i = 0;

    // add random characters to $password until $length is reached
    while ($i < $length) {

        // pick a random character from the possible ones
        $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);

        // we don't want this character if it's already in the password
        if (!strstr($password, $char)) {
            $password .= $char;
            $i++;
        }
    }

    // done!
    return $password;
}

//Convert seconds to Days, Hours, Minutes and Seconds

function duration($secs) {
    $vals = array('w' => (int) ($secs / 86400 / 7), ' ' . 'days' => $secs / 86400 % 7, ' ' . 'hours' => $secs / 3600 % 24, ' ' . 'minutes' => $secs / 60 % 60, ' ' . 'seconds' => $secs % 60);
    $ret = array();
    $added = false;
    foreach ($vals as $k => $v) {
        if ($v > 0 || $added) {
            $added = true;
            $ret[] = $v . $k;
        }
    }

    return join(' ', $ret);
}

/* * ***********************\
  | FUNCTION BYTE_FORMAT    |
  | AUTHOR OZZY G AKA RAZOR |
  | WEBSITE WWW.MICADE.COM  |
  | COPYRIGHT PUBLIC DOMAIN |
  \************************ */

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

?>