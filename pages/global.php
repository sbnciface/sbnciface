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

if ($admin == '1') {

    if (isset($_POST['do'])) {

        $sbnc->Call("globalmsg", array("\002\0034 ADMIN-MESSAGE: " . $_POST['message'] . "\003\002"));

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['admin_globalmsg_ok'];
        
    }

    //Set data
    if (!empty($errorIsset)) {
        $data->assign('errorSet', $errorIsset);
        $data->assign('errorType', $errorType);
        $data->assign('errorMessage', $errorMessage);
    }

    $data->assign('messageText', $lang['admin_globalmsg_message']);
    $data->assign('submitValue', $lang['admin_globalmsg_submit']);

    //Output the page
    $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
    $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
    $dwoo->output(new Dwoo_Template_File('template/' . $template . '/global.html'), $data);

} else {

    //No access, include error page.
    $errorIsset = '1';
    $errorType = 'staticerror';
    $errorMessage = $lang['misc_403'];

    include 'error.php';
}
?>
