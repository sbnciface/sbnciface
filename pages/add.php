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
 * Add a BNC User.
*/
?>
<?php
if (isset($_POST['adduser'])) {

    $usrs = $sbnc->Call('tcl', array('bncuserlist'));
    $users = explode(" ", $usrs);

    if (in_array($_POST['ident'], $users)) {
        $_SESSION['msg'] = $lang['ident_taken'];
    } else {
        if (empty($_POST['password'])) {
            $password = generatePassword('8');
        } else {
            $password = $_POST['password'];
        }

        $sbnc->Call('adduser', array($_POST['ident'], $password));

        $_SESSION['msg'] = $lang['bnc_added'] . " " . $_POST['ident'] . " " . $lang['password_added'] . " " . $password;
    }
}
?>
<?php if ($admin == 1) { ?>
<div id="content">
        <?php if (!empty($_SESSION['msg'])) {
            echo "<div class=\"success\">";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }
        ?>
    <div class="info"><?php echo $lang['if_password_empty']; ?></div>
    <form action="" method="POST">
        <table id="tbl" align="center" width="400">
            <tr>
                <td width="40%"><?php echo $lang['ident']; ?>:</td><td width="60%"><input type="text" name="ident" size="33" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="33" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['add_user']; ?>" name="adduser" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php } ?>