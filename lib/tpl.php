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
require_once 'lib/Twig/Autoloader.php';
require_once 'settings.php';
class tpl
{
    var $data = array();

    function __construct()
    {
        global $sbnciface_settings;

        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('templates/');

        $this->settings = $sbnciface_settings;
        $this->twig = new Twig_Environment($loader, array(
//            'cache' => 'cache/',
            'debug' => true
        ));
    }

    function assign($var, $key)
    {
        $this->data[$var] = $key;
    }

    function display($page)
    {
        $template = $this->settings['template'];
        print $this->twig->render($template . '/' . $page . '.twig', $this->data);
    }

    function display_error()
    {
        $template = $this->settings['template'];
        print $this->twig->render($template . '/error/error.twig', $this->data);
    }
}

?>
