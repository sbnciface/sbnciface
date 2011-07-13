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

if (isset($_POST['do'])) {
    $sbnc->Call('eraselog');

    $errorIsset = 1;
    $errorType = 'success';
    $errorMessage = $lang['user_log_erased'];
}

$log = $sbnc->Call('getlog', array("0", "999"));

//Checks for the log, to make it all look nice, and give no errors
if (is_a($log, 'itype_exception')) {
    $logState = "empty";
    $logString = "<div class=\"mid\"><b>" . $lang['user_log_empty'] . ".</b></div>";
} else {
    if (count($log) == 0) {
        $logState = "empty";
        $logString = "<div class=\"mid\"><b>" . $lang['user_log_empty'] . ".</b></div>";
    } else {
        $logString = $log;
    }
}

//Set data
if (!empty($errorIsset)) {
    $data->assign('errorSet', $errorIsset);
    $data->assign('errorType', $errorType);
    $data->assign('errorMessage', $errorMessage);
}

$data->assign('logState', $logState);
$data->assign('logString', $logString);

$data->assign('submitValue', $lang['user_log_erase']);

//Output the page
$data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
$data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
$dwoo->output(new Dwoo_Template_File('template/' . $template . '/log.html'), $data);
?>
