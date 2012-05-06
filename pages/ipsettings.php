<?php
/*
 * Copyright (C) 2010-2012 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2012 Arne Jensen   <darkdevil@darkdevil.dk>
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

    if (isset($_POST['addtrustip'])) {

        $newTrustIp = $_POST['ip'];

        if (is_ip($newTrustIp) == TRUE) {

            $trustip = $sbnc->Call('gettrustedips');

            if (in_array($newTrustIp, $trustip)) {

                $errorIsset = 1;
                $errorType = 'error';
                $errorMessage = $lang['admin_trustedips_already'];
            } else {

                $sbnc->Call('addtrustedip', array($newTrustIp));

                $errorIsset = 1;
                $errorType = 'success';
                $errorMessage = $lang['admin_trustedips_added'];
            }
        } else {

            $errorIsset = 1;
            $errorType = 'error';
            $errorMessage = $lang['admin_trustedips_ip_invalid'];
        }
    }

    if (isset($_POST['deltrustip'])) {

        $sbnc->Call('removetrustedip', array($_POST['ip']));

        $errorIsset = 1;
        $errorType = 'success';
        $errorMessage = $lang['admin_trustedips_removed'];
    }

    $trustip = $sbnc->Call('gettrustedips');

    //Set data
    if (!empty($errorIsset)) {
        $data->assign('errorSet', $errorIsset);
        $data->assign('errorType', $errorType);
        $data->assign('errorMessage', $errorMessage);
    }

    $data->assign('trustIps', $trustip);

    //Output the page
    $data->assign('header', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/header.html'), $data));
    $data->assign('footer', $dwoo->get(new Dwoo_Template_File('template/' . $template . '/footer.html'), $data));
    $dwoo->output(new Dwoo_Template_File('template/' . $template . '/ipsettings.html'), $data);
} else {

    //No access, include error page.
    $errorIsset = '1';
    $errorType = 'staticerror';
    $errorMessage = $lang['misc_403'];

    include 'error.php';
}
?>
