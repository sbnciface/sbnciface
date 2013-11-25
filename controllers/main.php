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

class main extends controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
        redirect('user/login');
    }
    function template() {
        $alert = array(
            'type' => 'info',
            'message' => 'This is only for testing'
        );
        $this->tpl->assign('alert', $alert);
        $this->tpl->display('login');
    }
}
?>
