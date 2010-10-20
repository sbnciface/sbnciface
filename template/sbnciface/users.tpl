                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <table id="tbl" align="center" width="400">
                    <tr>
                        <td colspan="4" align="center"><b>{$adminText}</b></td>
                    </tr>
                    <tr>
                        <td width="20%"><b>{$identText}</b></td><td width="20%"><b>{$nickText}</b></td><td width="35%"><b>{$lastseenText}</b></td><td width="13%"><b>{$actionText}</b></td>
                    </tr>
                    {foreach $adminArray admin}
                    <tr>
                        <td>{$admin.ident}</td><td class="bold">{$admin.nick}</td><td>{$admin.lastseen}</td><td style="text-align:center;"><form action="" method="post"><input type="hidden" value="{$admin.ident}" name="delident" /><input class="input-image" type="image" src="template/sbnciface/img/icons/delete.png" value="{$deleteText}" name="deluser" /><a href="?p=edit&amp;u={$admin.ident}"> <img src="template/sbnciface/img/icons/pencil.png"></a></form></td>
                    </tr>
                    {/foreach}
                    <tr>
                        <td colspan="4" align="center"><b>{$numAdmins} Admins</b></td>
                    </tr>
                </table>
                <br />
                <table id="tbl" align="center" width="400">
                    <tr>
                        <td colspan="4" align="center"><b>{$userText}</b></td>
                    </tr>
                    <tr>
                        <td width="20%"><b>{$identText}</b></td><td width="20%"><b>{$nickText}</b></td><td width="35%"><b>{$lastseenText}</b></td><td width="13%"><b>{$actionText}</b></td>
                    </tr>
                    {foreach $userArray user}
                    <tr>
                        <td>{$user.ident}</td><td class="bold">{$user.nick}</td><td>{$user.lastseen}</td><td style="text-align:center;"><form action="" method="post"><input type="hidden" value="{$user.ident}" name="delident" /><input class="input-image" type="image" src="template/sbnciface/img/icons/delete.png" value="{$deleteText}" name="deluser" /><a href="?p=edit&amp;u={$admin.ident}"> <img src="template/sbnciface/img/icons/pencil.png"></a></form></td>
                    </tr>
                    {/foreach}
                    <tr>
                        <td colspan="4" align="center"><b>{$numUsers} Users</b></td>
                    </tr>
                </table>