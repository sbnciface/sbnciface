<?php
/*
 * $Id$
 *
 * Copyright (C) 2010 Conny Sjöblom <biohzn@mustis.org>
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
 * The BNCs Server settings.
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
                <td width="40%"><?php echo $lang['server']; ?>:</td><td width="60%"><input type="text" name="server" size="33" value="<?php echo $sbnc->Call("getvalue", array("server")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['port']; ?>:</td><td width="60%"><input type="text" name="port" size="33" value="<?php echo $sbnc->Call("getvalue", array("port")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="33" value="<?php echo $sbnc->Call("getvalue", array("serverpass")); ?>" /></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['vhost']; ?>:</td><td width="60%"><select name="vhost" style="width:225px;"><?php foreach($sbnc->Call("getvhosts") as $vhost) {
                                echo '<option value="'.$vhost[0].'"';
                                if($sbnc->CallAs($user, "getvalue", array("vhost"))==$vhost[0]) {
                                    echo ' selected';
                                } echo


                                '>'.$vhost[3].'</option>';
    } ?></select></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="serversettings" /> <input type="submit" value="<?php echo $lang['jump']; ?>" name="jump" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php } ?>