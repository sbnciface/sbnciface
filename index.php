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
// Report errors plz
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Required classes
require_once 'lib/controller.php';
require_once 'lib/functions.php';
require_once 'lib/error.php';

// New error class "just in case"
$error = new error();

// "Parse" the URL
$param = (!empty($_GET['path'])) ? explode('/', strtolower($_GET['path'])) : array() ;
$class = array_shift($param);
$funct = array_shift($param);

// Get class and function to execute
if (!$class) {
    $class = 'main';
    $funct = 'index';
} elseif (!$funct) {
    $funct = 'index';
}

// Do the magic
if (file_exists('controllers/' . $class . '.php')) {
    require_once 'controllers/' . $class . '.php';
    if (class_exists($class)) {
        $page = new $class();
        if (method_exists($page, $funct)) {
            call_user_func_array(array($page, $funct), $param);
        } else {
            // TODO
            call_user_func(array($error, 'funct_not_found'));
        }
    } else {
        // TODO
        call_user_func(array($error, 'class_not_found'));
    }
} else {
    // TODO
    call_user_func(array($error, 'file_not_found'));
}
?>
