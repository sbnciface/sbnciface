<?php
/*
 * $Id: global.php 216 2010-02-20 14:10:39Z biohzn $
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
 * Send a global message to all BNCs.
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
                <td width="40%" valign="top"><?php echo $lang['message']; ?>:</td><td width="60%"><textarea name="message" cols="25" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['send']; ?>" name="global" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php } ?>