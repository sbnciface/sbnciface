<?php
/*
 * $Id: away.php 238 2010-05-04 20:54:56Z biohzn $
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
 * Change the away settings of the BNC
*/
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
    <form action="process.php" method="POST">
        <table id="tbl" align="center" width="400">
            <tr>
                <td width="40%"><?php echo $lang['awaynick']; ?>:</td><td width="60%"><input type="text" name="awaynick" size="33" value="<?php echo $sbnc->Call("getvalue", array("awaynick")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['awaymessage']; ?>:</td><td width="60%"><input type="text" name="awaymessage" size="33" value="<?php echo $sbnc->Call("getvalue", array("awaymessage")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['quit_as_away']; ?>:</td><td width="60%"><?php echo getQuitAway($sbnc->Call("getvalue", array("quitasaway"))); ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="away" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php } ?>