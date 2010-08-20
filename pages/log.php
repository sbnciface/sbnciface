<?php

/*
 * $Id: log.php 238 2010-05-04 20:54:56Z biohzn $
 *
 * Copyright (C) 2010 Conny Sj�blom <biohzn@mustis.org>
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

/*
 * View the offline log
 */
?>
<?php

if (!empty($_SESSION['username'])) {

    echo "<div id=\"content\">";

    if (!empty($_SESSION['msg'])) {
        echo "<div class=\"success\">";
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        echo "</div>";
    }

    $log = $sbnc->Call('getlog', array("0", "999"));
    if (is_a($log, itype_exception)) {
        echo "<div class=\"mid\"><b>" . $lang['log_empty'] . ".</b></div>";
    } else {
        if (count($log) == 0) {
            echo "<div class=\"mid\"><b>" . $lang['log_empty'] . ".</b></div>";
        } else {
            $i = 0;
            while ($i < count($log)) {
                echo "<div class=\"one\">" . $log[$i] . "</div>";
                if (($i + 1) < count($log)) {
                    echo "<div class=\"two\">" . $log[$i + 1] . "</div>";
                }
                $i = $i + 2;
            }
            echo "<div class=\"button\"><form action=\"process.php\" method=\"POST\"><input type=\"submit\" value=\"" . $lang['empty_log'] . "\" name=\"dellog\" /></form></div>";
        }
    }
}
echo "</div>";
?>