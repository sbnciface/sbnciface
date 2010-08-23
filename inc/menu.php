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
<div class="menu">
    <ul>
        <li><a href="<?php echo $webroot; ?>" ><?php echo $lang['status']; ?></a></li>
        <li><a href="#"><?php echo $lang['user']; ?></a>
            <ul>
                <li><a href="?p=settings"><?php echo $lang['settings']; ?></a></li>
                <li><a href="?p=server"><?php echo $lang['server']; ?></a></li>
                <li><a href="?p=away"><?php echo $lang['away']; ?></a></li>
                <li><a href="?p=channels"><?php echo $lang['channels']; ?></a></li>
                <li><a href="?p=log"><?php echo $lang['log']; ?></a></li>
            </ul>
        </li>
        <?php if ($admin == 1) { ?>
        <li><a href="#"><?php echo $lang['admin']; ?></a>
            <ul>
                <li><a href="?p=users"><?php echo $lang['users']; ?></a></li>
                <li><a href="?p=add"><?php echo $lang['add_user']; ?></a></li>
                <li><a href="?p=ipsettings"><?php echo $lang['trusted_ips']; ?></a></li>
                <li><a href="?p=vhosts"><?php echo $lang['vhosts']; ?></a></li>
                <li><a href="?p=global"><?php echo $lang['global_msg']; ?></a></li>
            </ul>
        </li>
            <?php } ?>
        <li><a href="process.php?logout"><?php echo $lang['logout']; ?></a></li>
    </ul>
</div>