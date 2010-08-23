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
 * Add or remove trusted IPs.
 * Truset IPs will not be blocked by the BNC in case of
 * login with wrong password.
*/
?>
<?php if ($admin == 1) {
    echo "<div id=\"content\">";
    ?>
    <?php if (!empty($_SESSION['addmsg'])) {
        echo "<div class=\"success\">";
        echo $_SESSION['addmsg'];
        unset($_SESSION['addmsg']);
        echo "</div>";
    }
    ?>
<table id="tbl" align="center" width="400">
    <tr>
    <form action="process.php" method="POST"><td width="60%"><input type="text" name="ip" size="33"/></td><td style="text-align:center;" width="40%"><input class="input-image" type="image" src="img/icons/add.png"  value="<?php echo $lang['addip']; ?>" name="addtrustip" /></td></form>
</tr>
</table><br /><br />
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
            <td width="60%"><b><?php echo $lang['ip']; ?></b></td><td width="40%"><b><?php echo $lang['action']; ?></b></td>
        </tr>
            <?php
            $i = 0;
            while ($i < count($trustip)) {
                echo "					<tr>";
                echo "						<form action=\"process.php\" method=\"POST\"><td>$trustip[$i]</td><td style=\"text-align:center;\"><input type=\"hidden\" value=\"$trustip[$i]\" name=\"ip\" /><input class=\"input-image\" type=\"image\" src=\"img/icons/delete.png\" value=\"".$lang['delip']."\" name=\"deltrustip\" /></td></form>";
                echo "					</td>";

                $i++;
            }
            ?>
    </table>
</form>	
</div>
    <?php } ?>