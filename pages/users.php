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
 * List all sBNC users / Del BNC user.
*/
?>
<?php
if ($admin == '1'){
if (!empty($_SESSION['username'])) {

    //Get BNC Users
    $usrs = $sbnc->Call('tcl', array('bncuserlist'));
    //Users into array
    $users = explode(" ", $usrs);

    ?>
<div id="content">
        <?php if (!empty($_SESSION['msg'])) {
            echo "<div class=\"success\">";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }
        ?>
    <table id="tbl" align="center" width="400">
        <tr>
            <td colspan="4" align="center"><b><?php echo $lang['administrators']; ?></b></td>
        </tr>
        <tr>
            <td width="20%"><b><?php echo $lang['ident']; ?></b></td><td width="20%"><b><?php echo $lang['nickname']; ?></b></td><td width="35%"><b><?php echo $lang['last_seen']; ?></b></td><td width="1%"><b><?php echo $lang['action']; ?></b></td>
        </tr>
            <?php
            $i = 0;
            $adminnr = 0;
            while ($i < count($users)) {

                $admin = $sbnc->CallAs($users[$i], 'getvalue', array('admin'));

                if ($admin == 1) {
                    $adminnr++;
                    $ident = $users[$i];

                    $nick = $sbnc->CallAs($ident, 'getnick');
                    $lastseen = $sbnc->Call('tcl', array("getbncuser $ident seen"));
                    if ($lastseen == 0) {
                        $seen = "Never";
                    }else {
                        $seen = date("d.m.Y H:i:s", $lastseen);
                    }

                    echo "					</tr>";
                    if (strtolower($ident) != strtolower($_SESSION['username'])) {
                        echo "						<td>$ident</td><td class=\"bold\">$nick</td><td>$seen</td><td style=\"text-align:center;\"><form action=\"process.php\" method=\"POST\"><input type=\"hidden\" value=\"$ident\" name=\"delident\" /><input class=\"input-image\" type=\"image\" src=\"img/icons/delete.png\" value=\"".$lang['delete']."\" name=\"deluser\" /><a href=\"?p=edit&amp;u=$ident\"> <img src=\"img/icons/pencil.png\"></a></form></td>";
                    }else {
                        echo "						<td>$ident</td><td class=\"bold\">$nick</td><td>$seen</td><td style=\"text-align:center;\"><form action=\"process.php\" method=\"POST\"><input type=\"hidden\" value=\"$ident\" name=\"delident\" /><input class=\"input-image\" type=\"image\" src=\"img/icons/delete_disabled.png\" value=\"".$lang['delete']."\" name=\"deluser\" disabled /><a href=\"?p=edit&amp;u=$ident\"> <img src=\"img/icons/pencil.png\"></a></form></td>";
                    }
                    echo "					</tr>";
                }
                $i++;
            }


            ?>
        <tr>
            <td colspan="4" align="center"><b><?php echo $adminnr; ?> Admins</b></td>
        </tr>
    </table>
    <br />
    <table id="tbl" align="center" width="400">

        <tr>
            <td colspan="4" align="center"><b><?php echo $lang['users']; ?></b></td>
        </tr>
        <tr>
            <td width="20%"><b><?php echo $lang['ident']; ?></b></td><td width="20%"><b><?php echo $lang['nickname']; ?></b></td><td width="35%"><b><?php echo $lang['last_seen']; ?></b></td><td width="1%"><b><?php echo $lang['action']; ?></b></td>
        </tr>
            <?php
            $i = 0;
            $usernr = 0;
            while ($i < count($users)) {

                $admin = $sbnc->CallAs($users[$i], 'getvalue', array('admin'));

                if ($admin != 1) {
                    $usernr++;
                    $ident = $users[$i];

                    $nick = $sbnc->CallAs($ident, 'getnick');
                    $lastseen = $sbnc->Call('tcl', array("getbncuser $ident seen"));
                    if ($lastseen == 0) {
                        $seen = "Never";
                    }else {
                        $seen = date("d.m.Y H:i:s", $lastseen);
                    }

                    echo "					</tr>";
                    echo "						<td>$ident</td><td class=\"bold\">$nick</td><td>$seen</td><td style=\"text-align:center;\"><form action=\"process.php\" method=\"POST\"><input type=\"hidden\" value=\"$ident\" name=\"delident\" /><input class=\"input-image\" type=\"image\" src=\"img/icons/delete.png\" value=\"".$lang['delete']."\" name=\"deluser\" /><a href=\"?p=edit&amp;u=$ident\"> <img src=\"img/icons/pencil.png\"></a></form></td>";
                    echo "					</tr>";
                }
                $i++;
            }


            ?>
        <tr>
            <td colspan="4" align="center"><b><?php echo $usernr; ?> Users</b></td>
        </tr>
    </table>

</div>
<?php
    }else{
        include('pages/main.php');
    }
}
?>