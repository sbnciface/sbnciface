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
                <br />
                <div class="mid">Theme Changer</div>
                <form action="" method="post" class="mid">
                    <input type="hidden" name="action" value="changestyle" />
                        <select name="style" onchange="this.form.submit();">
                            <option value="grey" <?php if ($style == "grey") { echo "selected"; } ?> >Simple Grey</option>
                            <option value="black" <?php if ($style == "black") { echo "selected"; } ?> >Simple Black</option>
                        </select>
                    </form>
                <div id="version">V0.5 Beta</div>
            </div>
        </div>
    </body>
</html>
<?php

//Destroy the sBNC Session
if ($sbnc) {
    $sbnc->Destroy();
}
?>