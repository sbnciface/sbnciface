<?php
/*
 * $Id: main.php 238 2010-05-04 20:54:56Z biohzn $
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
 * The Status page, displays information about the BNC.
*/
?>
<?php if (!empty($_SESSION['username'])) { ?>
<div id="content">
        <?php if ($sbnc->Call("getvalue", array("uptime")) == 0) {
            echo "<div class=\"error\">";
            echo "Your bouncer is not connected.";
            echo "</div>";
        }
        ?>
    <table id="tbl" align="center" width="400">
            <?php if ($sbnc->Call("getvalue", array("uptime")) != 0) { ?>
        <tr>
            <td width="40%"><?php echo $lang['uptime']; ?>:</td><td width="60%" id="uptime"></td>
        </tr>
        <script type="text/javascript">
            var UptimeTicks = <?php echo $sbnc->Call("getvalue", array("uptime")); ?>;
            function UptimeRefresh ()
            {
                var days = Math.floor(UptimeTicks /60/60/24);
                var hours = Math.floor((UptimeTicks - days*60*60*24)/60/60);
                var minutes = Math.floor((UptimeTicks - days*60*60*24 - hours*60*60)/60);
                var seconds = (UptimeTicks - days*60*60*24 - hours*60*60 - minutes*60);
                document.getElementById('uptime').innerHTML = days + ' days ' + hours + ' hours ' + minutes + ' minutes ' + seconds + ' seconds';
                UptimeTicks++;
            }
            UptimeRefresh();
            setInterval("UptimeRefresh()", 1000);
        </script>
                <?php }else { ?>
        <tr>
            <td width="40%"><?php echo $lang['uptime']; ?>:</td><td width="60%"><?php echo $lang['disconnected']; ?></td>
        </tr>
                <?php } ?>
        <tr>
            <td><?php echo $lang['nickname']; ?>:</td><td><?php echo $sbnc->Call("getnick"); ?></td>
        </tr>
        <tr>
            <td><?php echo $lang['awaynick']; ?>:</td><td><?php echo $sbnc->Call("getvalue", array("awaynick")); ?></td>
        </tr>
        <tr>
            <td><?php echo $lang['awaymessage']; ?>:</td><td><?php echo $sbnc->Call("getvalue", array("awaymessage")); ?></td>
        </tr>
        <tr>
            <td><?php echo $lang['realname']; ?>:</td><td><?php echo $sbnc->Call("getvalue", array("realname")); ?></td>
        </tr>
        <tr>
            <td><?php echo $lang['server']; ?>:</td><td><?php echo $sbnc->Call("getvalue", array("server")).":".$sbnc->Call("getvalue", array("port")); ?></td>
        </tr>
        <tr>
            <td><?php echo $lang['traffic']; ?>:</td><td><?php $traff = $sbnc->Call("gettraffic");
                    echo 'In: '.byte_format($traff[2], 2).'<br />Out: '.byte_format($traff[3], 2); ?></td>
        </tr>
    </table>
</div>
    <?php } ?>