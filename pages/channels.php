<?php
/*
 * $Id: channels.php 224 2010-02-22 19:54:57Z biohzn $
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
 * List/join/part Channels.
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
                <td colspan="2" align="center"><b><?php echo $lang['join_channel']; ?></b></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['channel']; ?>:</td><td width="60%"><input type="text" name="channel" size="33" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['join']; ?>" name="join" /></td>
            </tr>
        </table>
    </form>
    <br /><br />
        <?php if (!empty($_SESSION['msgpart'])) {
            echo "<div class=\"success\">";
            echo $_SESSION['msgpart'];
            unset($_SESSION['msgpart']);
            echo "</div>";
        }
        ?>
    <table id="tbl" align="center" width="400">
        <tr>
            <td width="55%"><b><?php echo $lang['channel']; ?></b></td><td><b><?php echo $lang['modes']; ?></b></td><td width="1%"><b><?php echo $lang['action']; ?></b></td>
        </tr>
            <?php
            foreach ($sbnc->Call("getchannels") as $channel) {
                echo "<tr>";
                echo "<form action=\"process.php\" method=\"POST\"><input type=\"hidden\" name=\"channel\" value=\"$channel\" /><td>$channel</td><td>".$sbnc->Call("getchanmodes", array($channel))."</td><td align=\"center\"><input class=\"input-image\" type=\"image\" src=\"img/icons/delete.png\"  value=\"".$lang['part']."\" name=\"part\" /></td></form>\n";
                echo "</tr>";
            }
            ?>
    </table>
</div>
    <?php } ?>