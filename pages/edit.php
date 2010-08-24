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
    if (isset($_POST['serverpassword'])) {
        $sbnc->CallAs($ident, "setvalue", array("serverpassword", $_POST['password']));
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
    $_SESSION['msg'] = $lang['settings_saved'];
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
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['access']; ?>:</td><td width="60%"><?php echo getUserAccess($sbnc->CallAs($ident, 'getvalue', array('admin')), $ident, $_SESSION['username']); ?></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['realname']; ?>:</td><td width="60%"><input type="text" name="realname" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("realname")); ?>" />
<?php if (getGlobalLockSetting("realname") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("realname") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['nickname']; ?>:</td><td width="60%"><input type="text" name="nickname" size="30" value="<?php echo $sbnc->CallAs($ident, "getnick"); ?>" /></td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="30" />
<?php if (getGlobalLockSetting("password") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("password") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server']; ?>:</td><td width="60%"><input type="text" name="server" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("server")); ?>" />
<?php if (getGlobalLockSetting("server") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("server") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['port']; ?>:</td><td width="60%"><input type="text" name="port" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("port")); ?>" />
<?php if (getGlobalLockSetting("port") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("port") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['server_password']; ?>:</td><td width="60%"><input type="text" name="serverpassword" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("serverpass")); ?>" />
<?php if (getGlobalLockSetting("serverpass") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("serverpass") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaynick']; ?>:</td><td width="60%"><input type="text" name="awaynick" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaynick")); ?>" />
<?php if (getGlobalLockSetting("awaynick") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("awaynick") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['awaymessage']; ?>:</td><td width="60%"><input type="text" name="awaymessage" size="30" value="<?php echo $sbnc->CallAs($ident, "getvalue", array("awaymessage")); ?>" />
<?php if (getGlobalLockSetting("awaymessage") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("awaymessage") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['quit_as_away']; ?>:</td><td width="60%"><?php echo getQuitAway($sbnc->CallAs($ident, "getvalue", array("quitasaway"))); ?>
<?php if (getGlobalLockSetting("usequitasaway") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("usequitasaway") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><?php echo $lang['vhost']; ?>:</td><td width="60%"><select name="vhost" style="width:205px;"><?php foreach($sbnc->CallAs($ident, "getvhosts") as $vhost) {
                            echo '<option value="'.$vhost[0].'"';
                            if($sbnc->CallAs($ident, "getvalue", array("vhost"))==$vhost[0]) {
                                echo ' selected';
                            } echo

                            '>'.$vhost[3].'</option>';
    } ?></select>
<?php if (getGlobalLockSetting("vhost") == 2) { ?>
              <img class="disabled" src="img/icons/lock.png">
<?php } else if (getGlobalLockSetting("vhost") == 1) { ?>
              <img src="img/icons/lock.png">
<?php } else { ?>
              <img src="img/icons/lock_open.png">
<?php } ?>
            </td>
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
