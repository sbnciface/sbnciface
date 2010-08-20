<?php
/*
 * $Id: header.php 238 2010-05-04 20:54:56Z biohzn $
 *
 * Copyright (C) 2010 Conny Sjï¿½blom <biohzn@mustis.org>
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
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="css/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title><?php echo $name; ?></title>
        <script>
            $.fn.pause = function(duration) {
                $(this).animate({ dummy: 1 }, duration);
                return this;
            };
            $(document).ready(function () {
                $(".success").pause(3000).fadeOut(2000);
            });
            $(document).ready(function () {
                $(".warning").pause(3000).fadeOut(2000);
            });
            function pickLanguage(language) {
                document.langselector.lang.value = language;
                document.langselector.submit();
                return false;
            }
        </script>
    </head>
    <body>
        <?php
        if ($page == main && empty($_SESSION['username'])) {
            echo "<div id=\"loginbody\">\n";
        }else {
            echo "<div id=\"pagebody\">\n";
        }
        ?>
        <div id="container">
            <div id="langselect">
                <form action="process.php" method="POST" name="langselector">
                    <input type="hidden" name="langselect" value="1" />
                    <input type="hidden" name="lang" value="" />
                    <a href="javascript:" onclick="pickLanguage('en');"><img src="img/lang/en.png" /></a>
                    <a href="javascript:" onclick="pickLanguage('de');"><img src="img/lang/de.png" /></a>
                    <a href="javascript:" onclick="pickLanguage('dk');"><img src="img/lang/dk.png" /></a>
                    <a href="javascript:" onclick="pickLanguage('no');"><img src="img/lang/no.png" /></a>
                    <a href="javascript:" onclick="pickLanguage('sv');"><img src="img/lang/sv.png" /></a>
                    <a href="javascript:" onclick="pickLanguage('fi');"><img src="img/lang/fi.png" /></a>
                </form>
            </div>
            <?php
            if ($page == main && empty($_SESSION['username'])) {
                echo "        <div id=\"loginheader\">\n";
            }else {
                echo "        <div id=\"header\">\n";
            }
            ?>
            <?php if (empty($_SESSION['username'])) {
                echo "<div id=\"loginheadpic\"></div>";
            }else {
                echo "<div id=\"headpic\"></div>";
            }?>
        </div>
