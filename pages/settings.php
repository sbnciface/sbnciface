<?php
/*
 * $Id$
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
 * Change the main settings of the BNC.
*/
?>
<?php
if (isset($_POST['settings'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));

    if ($admin == 1) {
        if (!empty($_POST['realname'])) {
            $sbnc->CallAs("$ident", "setvalue", array("realname", $_POST['realname']));
        }
        if (!empty($_POST['nickname'])) {
            $sbnc->CallAs("$ident", "raw", array("nick $_POST[nickname]"));
        }
        if (!empty($_POST['password'])) {
            $sbnc->CallAs("$ident", "setvalue", array("password", $_POST['password']));
            if (isset($_COOKIE['password'])) {
                setcookie("password", $_POST['password'], $expire);
            } else {
                $_SESSION['password'] = $_POST['password'];
            }
        }
    } else {
        if (!empty($_POST['realname'])) {
            $sbnc->Call("setvalue", array("realname", $_POST['realname']));
        }
        if (!empty($_POST['nickname'])) {
            $sbnc->Call("raw", array("nick $_POST[nickname]"));
        }
        if (!empty($_POST['password'])) {
            $sbnc->Call("setvalue", array("password", $_POST['password']));
            if (isset($_COOKIE['password'])) {
                setcookie("password", $_POST['password'], $expire);
            } else {
                $_SESSION['password'] = $_POST['password'];
            }
        }
    }
    $_SESSION['msg'] = $lang['settings_saved'];
}
?>
<?php if (!empty($_SESSION['username'])) { ?>
<div id="content">
        <?php if (!empty($_SESSION['msg'])) {
            echo "<div class=\"success\">";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }
        ?>
    <form action="" method="POST">
        <table id="tbl" align="center" width="400">
            <tr>
                <td width="40%"><?php echo $lang['realname']; ?>:</td><td width="60%"><input type="text" name="realname" size="33" value="<?php echo $sbnc->Call("getvalue", array("realname")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['nickname']; ?>:</td><td width="60%"><input type="text" name="nickname" size="33" value="<?php echo $sbnc->Call("getnick"); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="33" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="settings" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php }
?>