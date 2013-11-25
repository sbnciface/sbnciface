<?php
/*
 * Copyright (C) 2013 Conny Sjöblom <biohzn@mustis.org>
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

class error extends controller
{

    function file_not_found()
    {
        $alert = array(
            'type' => 'danger',
            'message' => '<strong>404!</strong> page not found.'
        );

        $this->tpl->assign('alert', $alert);
        $this->tpl->display_error();
    }

    function funct_not_found()
    {
        $alert = array(
            'type' => 'danger',
            'message' => '<strong>404!</strong> page not found.'
        );

        $this->tpl->assign('alert', $alert);
        $this->tpl->display_error();
    }

    function class_not_found()
    {
        $alert = array(
            'type' => 'danger',
            'message' => '<strong>404!</strong> page not found.'
        );

        $this->tpl->assign('alert', $alert);
        $this->tpl->display_error();
    }
}

?>