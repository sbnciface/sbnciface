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
 * Manage vHosts.
 */
?>
<?php
if ($admin == 1) {
    echo "<div id=\"content\">";
    $vhosts = $sbnc->Call('getvhosts');

    $numvhosts = count($vhosts);
?>
<?php
    if (!empty($_SESSION['errormsg'])) {
        echo "<div class=\"error\">";
        echo $_SESSION['errormsg'];
        unset($_SESSION['errormsg']);
        echo "</div>";
    }
?>
<?php
    if (!empty($_SESSION['addmsg'])) {
        echo "<div class=\"success\">";
        echo $_SESSION['addmsg'];
        unset($_SESSION['addmsg']);
        echo "</div>";
    }
?>
    <table id="tbl" align="center" width="400">
        <form action="process.php" method="POST">
            <tr>
                <td width="40%"><?php echo $lang['ip']; ?></td><td width="40%"><input type="text" name="ip" size="33"/></td>
            </tr>
            <tr>
                <td><?php echo $lang['user_limit']; ?></td><td><input type="text" name="users" size="33"/></td>
            </tr>
            <tr>
                <td><?php echo $lang['host']; ?></td><td><input type="text" name="host" size="33"/></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input class="input-image" type="image" src="img/icons/add.png" value="<?php echo $lang['add_vhost']; ?>" name="addvhost" /></td>
        </form>
    </table><br /><br />

<?php
    if (!empty($_SESSION['msg'])) {
        echo "<div class=\"success\">";
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        echo "</div>";
    }
?>
    <table id="tbl" align="center" width="400">
        <tr>
            <td width=""><b><?php echo $lang['ip']; ?></b></td><td width=""><b><?php echo $lang['users']; ?></b></td><td width=""><b><?php echo $lang['host']; ?></b></td><td width="10%"><b><?php echo $lang['action']; ?></b></td>
    </tr>
    <?php
    $i = 0;
    while ($i < $numvhosts) {
        echo "					<tr>";
        echo "						<form action=\"process.php\" method=\"POST\"><td>" . $vhosts[$i]['0'] . "</td><td>" . $vhosts[$i]['1'] . "/" . $vhosts[$i]['2'] . "</td><td>" . $vhosts[$i]['3'] . "</td><td align=\"center\"><input type=\"hidden\" name=\"ip\" value=\"" . $vhosts[$i]['0'] . "\" /><input class=\"input-image\" type=\"image\" src=\"img/icons/delete.png\" value=\"" . $lang['del_vhost'] . "\" name=\"delvhost\" /></td></form>";
        echo "					</td>";

        $i++;
    }
    ?>
    </table>

    </div>
<?php } ?>