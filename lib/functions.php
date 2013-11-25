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
function redirect($url) {
	if (function_exists('apache_get_modules')) {
		$modules = apache_get_modules();
		$mod_rewrite = in_array('mod_rewrite', $modules);
	} else {
		$mod_rewrite =  getenv('HTTP_MOD_REWRITE')=='On' ? true : false ;
	}

    $host = $_SERVER['HTTP_HOST'];
    $http = (isset($_SERVER['HTTPS'] )) ? 'https' : 'http' ;
    $url = ($url[0] != '/') ? $url : substr($url, 1) ;
	$root = sbnciface_get_root();
	if ($mod_rewrite) {
	    $string = $http . '://' . $host . $root . $url;
	} else {
		$string = $http . '://' . $host . $root . '/?path=' . $url;	
	}
    header( 'Location: '.$string ) ;
}
function sbnciface_get_root() {
    return substr($_SERVER['SCRIPT_NAME'], '0', strrpos($_SERVER['SCRIPT_NAME'], '/'));
}
?>
