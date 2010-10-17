                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%">{$awaynickText}:</td><td width="60%"><input type="text" name="{$awaynickName}" size="33" value="{$awaynickValue}" /></td></tr>
                        <tr><td width="40%">{$awaymessageText}:</td><td width="60%"><input type="password" name="{$awaymessageName}" size="33" value="{$awaymessageValue}" /></td></tr>
                        <tr><td width="40%">{$quitasawayText}:</td><td width="60%"><select name="{$quitasawayName}" style="width:225px;" >{if $quitasawayValue == 1}<option value="1" selected>{$quitasawayValueYes}</option><option value="0">{$quitasawayValueNo}</option>{else}<option value="1">{$quitasawayValueYes}</option><option value="0" selected>{$quitasawayValueNo}</option>{/if}</select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="{$submitValue}" name="do" /></td></tr>
                    </table>
                </form>