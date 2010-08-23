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
 * Edit a users settings.
*/
?>
<?php if ($admin == 1) {
    echo "<div id=\"content\">";
    if (isset($_POST['edit'])) {
        $ident = $_POST['edituser'];
    }elseif (isset($_GET['u'])) {
        $ident = $_GET['u'];
    }
    ?>

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
            <td colspan="2" align="center"><?php echo $lang['changing_options']; ?> <b><?php echo $ident; ?></b>.</td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['access']; ?>:</td><td width="60%"><?php echo getUserAccess($sbnc->CallAs($ident, 'getvalue', array('admin')), $ident, $_SESSION['username']); ?></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['realname']; ?>:</td><td width="60%"><input type="text" name="realname" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("realname")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['nickname']; ?>:</td><td width="60%"><input type="text" name="nickname" size="33" value="<?php echo $sbnc->CallAs($ident, "getnick"); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="33" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server']; ?>:</td><td width="60%"><input type="text" name="server" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("server")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['port']; ?>:</td><td width="60%"><input type="text" name="port" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("port")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server_password']; ?>:</td><td width="60%"><input type="text" name="serverpassword" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("serverpass")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaynick']; ?>:</td><td width="60%"><input type="text" name="awaynick" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaynick")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaymessage']; ?>:</td><td width="60%"><input type="text" name="awaymessage" size="33" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaymessage")); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['quit_as_away']; ?>:</td><td width="60%"><?php echo getQuitAway($sbnc->CallAs($ident, "getvalue", array("quitasaway"))); ?></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['vhost']; ?>:</td><td width="60%"><select name="vhost" style="width:225px;"><?php foreach($sbnc->CallAs($ident, "getvhosts") as $vhost) {
                            echo '<option value="'.$vhost[0].'"';
                            if($sbnc->CallAs($ident, "getvalue", array("vhost"))==$vhost[0]) {
                                echo ' selected';
                            } echo

                            '>'.$vhost[3].'</option>';
    } ?></select></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="hidden" value="<?php echo $ident; ?>" name="ident" /><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="edituser" /> <input type="submit" value="<?php echo $lang['send_jump']; ?>" name="dojump" /></td>
        </tr>
    </table>
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
            foreach ($sbnc->CallAs("$ident", "getchannels") as $channel) {
                echo "<tr>";
                echo "<form action=\"process.php\" method=\"POST\"><input type=\"hidden\" name=\"channel\" value=\"$channel\" /><td>$channel</td><td>".$sbnc->CallAs("$ident", "getchanmodes", array($channel))."</td><td><input type=\"hidden\" name=\"ident\" value=\"$ident\" /><input type=\"submit\" value=\"".$lang['part']."\" name=\"adminpart\" /></td></form>\n";
                echo "</tr>";
            }
    ?>
    </table>
</form>	
</div>
    <?php } ?>