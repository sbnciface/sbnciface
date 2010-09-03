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
 * Edit a users settings.
*/
?>
<?php
if (isset($_POST['join'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("join $channel"));
    $_SESSION['msg'] = $lang["joined"] . " $channel.";
} elseif (isset($_POST['adminpart'])) {
    $channel = $_POST['channel'];
    $ident = $_POST['ident'];

    $sbnc->CallAs("$ident", "raw", array("part $channel"));
    $_SESSION['msgpart'] = $lang["parted"] . " $channel.";
} elseif (isset($_POST['part'])) {
    $channel = $_POST['channel'];

    $sbnc->Call("raw", array("part $channel"));
    $_SESSION['msgpart'] = $lang["parted"] . " $channel.";
} elseif (isset($_POST['edituser'])) {

    $ident = $_POST['ident'];
    $admin = $sbnc->CallAs($ident, 'getvalue', array('admin'));
    $quitaway = $sbnc->CallAs($ident, "getvalue", array("quitasaway"));

    if ($_POST['access'] != $admin) {
        if ($_POST['access'] == 1) {
            $sbnc->Call("admin", array("$ident"));
        } else {
            $sbnc->Call("unadmin", array("$ident"));
        }
    }

    if (!empty($_POST['server'])) {
        $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
    }
    if (!empty($_POST['port'])) {
        $sbnc->CallAs($ident, "setvalue", array("port", $_POST['port']));
    }
    if (isset($_POST['serverpass'])) {
        $sbnc->CallAs($ident, "setvalue", array("serverpass", $_POST['serverpass']));
    }
    if (isset($_POST['awaynick'])) {
        $sbnc->CallAs($ident, "setvalue", array("awaynick", $_POST['awaynick']));
    }
    if (isset($_POST['awaymessage'])) {
        $sbnc->CallAs($ident, "setvalue", array("awaymessage", $_POST['awaymessage']));
    }
    if ($quitaway != $_POST['quitaway']) {
        $sbnc->CallAs($ident, "setvalue", array("quitasaway", $_POST['quitaway']));
    }
    if (!empty($_POST['vhost'])) {
        $sbnc->CallAs($ident, "setvalue", array("vhost", $_POST['vhost']));
    }
    if (!empty($_POST['realname'])) {
        $sbnc->CallAs("$ident", "setvalue", array("realname", $_POST['realname']));
    }
    if (!empty($_POST['nickname'])) {
        $sbnc->CallAs("$ident", "raw", array("nick $_POST[nickname]"));
    }
    if (!empty($_POST['password'])) {
        $sbnc->CallAs("$ident", "setvalue", array("password", $_POST['password']));
    }
    if (!empty($_POST['lock'])) {
        $locks = $_POST['lock'];
        foreach ($locks as $lock => $set) {
          if ($set == 1) {
            $lRes = GetResult($sbnc->Call("setuserlock", array($ident, $lock)));
            if(!empty($lRes)) {
              echo "($lock) ".$lRes."<br>";
            }
          } else if ($set == 0) {
            /* To prevent incorrect error messages from sbnc, we'll call setuserlock before unsetuserlock. -- DD */
            $sbnc->Call("setuserlock", array($ident, $lock));
            $uRes = GetResult($sbnc->Call("unsetuserlock", array($ident, $lock)));
            if(!empty($uRes)) {
              echo "($lock) ".$uRes."<br>";
            }
          }
        }
    }
    $_SESSION['msg'] = $lang['settings_saved'];
    /* We posted some stuff, but not always we get back to the origin. Let's make sure. -- DD  */
    echo "<meta http-equiv='refresh' content='0;URL=".$_SERVER["REQUEST_URI"]."'>";
} elseif (isset($_POST['dojump'])) {

    $ident = $_POST['ident'];

    $sbnc->CallAs($ident, 'jump');
    $_SESSION['msg'] = $lang['reconnecting_user'];
}
?>
<?php if ($admin == 1) {
    echo "<div id=\"content\">";
    if (isset($_POST['edit'])) {
        $ident = $_POST['edituser'];
        $userlocks = explode(",", $sbnc->CallAs($ident, "gettag", array("locksetting")));
    }elseif (isset($_GET['u'])) {
        $ident = $_GET['u'];
        $userlocks = explode(",", $sbnc->CallAs($ident, "gettag", array("locksetting")));
    }
    ?>

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
            <td colspan="2" align="center"><?php echo $lang['changing_options']; ?> <b><?php echo $ident; ?></b>.</td>
            <td><img src="img/icons/lock_open.png"></td>
            <td><img src="img/icons/lock.png"></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['access']; ?>:</td><td width="60%" colspan="3"><?php echo getUserAccess($sbnc->CallAs($ident, 'getvalue', array('admin')), $ident, $_SESSION['username']); ?></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['realname']; ?>:</td><td width="60%"><input type="text" name="realname" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("realname")); ?>" /></td>
            <td><input type="radio" name="lock[realname]" value="0" <?php echo getUserLockStatus("open", "realname"); ?> <?php echo getGlobalLockSetting("realname"); ?>></td>
            <td><input type="radio" name="lock[realname]" value="1" <?php echo getUserLockStatus("closed", "realname"); ?> <?php echo getGlobalLockSetting("realname"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['nickname']; ?>:</td><td width="60%" colspan="3"><input type="text" name="nickname" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getnick"); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" style="width:203px;" /></td>
            <td><input type="radio" name="lock[password]" value="0" <?php echo getUserLockStatus("open", "password"); ?> <?php echo getGlobalLockSetting("password"); ?>></td>
            <td><input type="radio" name="lock[password]" value="1" <?php echo getUserLockStatus("closed", "password"); ?> <?php echo getGlobalLockSetting("password"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server']; ?>:</td><td width="60%"><input type="text" name="server" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("server")); ?>" /></td>
            <td><input type="radio" name="lock[server]" value="0" <?php echo getUserLockStatus("open", "server"); ?> <?php echo getGlobalLockSetting("server"); ?>></td>
            <td><input type="radio" name="lock[server]" value="1" <?php echo getUserLockStatus("closed", "server"); ?> <?php echo getGlobalLockSetting("server"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['port']; ?>:</td><td width="60%"><input type="text" name="port" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("port")); ?>" /></td>
            <td><input type="radio" name="lock[port]" value="0" <?php echo getUserLockStatus("open", "port"); ?> <?php echo getGlobalLockSetting("port"); ?>></td>
            <td><input type="radio" name="lock[port]" value="1" <?php echo getUserLockStatus("closed", "port"); ?> <?php echo getGlobalLockSetting("port"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server_password']; ?>:</td><td width="60%"><input type="text" name="serverpass" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("serverpass")); ?>" /></td>
            <td><input type="radio" name="lock[serverpass]" value="0" <?php echo getUserLockStatus("open", "serverpass"); ?> <?php echo getGlobalLockSetting("serverpass"); ?>></td>
            <td><input type="radio" name="lock[serverpass]" value="1" <?php echo getUserLockStatus("closed", "serverpass"); ?> <?php echo getGlobalLockSetting("serverpass"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaynick']; ?>:</td><td width="60%"><input type="text" name="awaynick" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaynick")); ?>" /></td>
            <td><input type="radio" name="lock[awaynick]" value="0" <?php echo getUserLockStatus("open", "awaynick"); ?> <?php echo getGlobalLockSetting("awaynick"); ?>></td>
            <td><input type="radio" name="lock[awaynick]" value="1" <?php echo getUserLockStatus("closed", "awaynick"); ?> <?php echo getGlobalLockSetting("awaynick"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaymessage']; ?>:</td><td width="60%"><input type="text" name="awaymessage" style="width:203px;" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaymessage")); ?>" /></td>
            <td><input type="radio" name="lock[awaymessage]" value="0" <?php echo getUserLockStatus("open", "awaymessage"); ?> <?php echo getGlobalLockSetting("awaymessage"); ?>></td>
            <td><input type="radio" name="lock[awaymessage]" value="1" <?php echo getUserLockStatus("closed", "awaymessage"); ?> <?php echo getGlobalLockSetting("awaymessage"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['quit_as_away']; ?>:</td><td width="60%"><?php echo getQuitAway($sbnc->CallAs($ident, "getvalue", array("quitasaway"))); ?></td>
            <td><input type="radio" name="lock[usequitasaway]" value="0" <?php echo getUserLockStatus("open", "usequitasaway"); ?> <?php echo getGlobalLockSetting("usequitasaway"); ?>></td>
            <td><input type="radio" name="lock[usequitasaway]" value="1" <?php echo getUserLockStatus("closed", "usequitasaway"); ?> <?php echo getGlobalLockSetting("usequitasaway"); ?>></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['vhost']; ?>:</td><td width="60%"><select name="vhost" style="width:205px;"><?php foreach($sbnc->CallAs($ident, "getvhosts") as $vhost) {
                            echo '<option value="'.$vhost[0].'"';
                            if($sbnc->CallAs($ident, "getvalue", array("vhost"))==$vhost[0]) {
                                echo ' selected';
                            } echo

                            '>'.$vhost[3].'</option>';
    } ?>
              </select>
            </td>
            <td><input type="radio" name="lock[vhost]" value="0" <?php echo getUserLockStatus("open", "vhost"); ?> <?php echo getGlobalLockSetting("vhost"); ?>></td>
            <td><input type="radio" name="lock[vhost]" value="1" <?php echo getUserLockStatus("closed", "vhost"); ?> <?php echo getGlobalLockSetting("vhost"); ?>></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="hidden" value="<?php echo $ident; ?>" name="ident" /><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="edituser" /> <input type="submit" value="<?php echo $lang['send_jump']; ?>" name="dojump" /></td>
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
            $channels = $sbnc->CallAs("$ident", "getchannels");
            if (is_a($channels, itype_exception)) {
                echo "<tr><td colspan=\"3\">The bouncer is not connected</td></tr>";
            } else {
                foreach ($sbnc->CallAs("$ident", "getchannels") as $channel) {
                   echo "<tr>";
                   echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"channel\" value=\"$channel\" /><td>$channel</td><td>".$sbnc->CallAs("$ident", "getchanmodes", array($channel))."</td><td><input type=\"hidden\" name=\"ident\" value=\"$ident\" /><input type=\"submit\" value=\"".$lang['part']."\" name=\"adminpart\" /></td></form>\n";
                   echo "</tr>";
              }
            }
    ?>
    </table>
</form>	
</div>
    <?php } ?>
