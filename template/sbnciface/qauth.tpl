                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%">{$qauthText}:</td><td width="60%"><input type="text" name="{$qauthName}" size="33" value="{$qauthValue}" /></td></tr>
                        <tr><td width="40%">{$qpassText}:</td><td width="60%"><input type="password" name="{$qpassName}" size="33" value="{if $qpassValue == 1}Kl45sD34R{/if}" /></td></tr>
                        <tr><td width="40%">{$qmodexText}:</td><td width="60%"><select name="{$qmodexName}" style="width:224px;" >{if $qmodexValue == 1}<option value="1" selected>{$qmodexValueYes}</option><option value="0">{$qmodexValueNo}</option>{else}<option value="1">{$qmodexValueYes}</option><option value="0" selected>{$qmodexValueNo}</option>{/if}</select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="{$submitValue}" name="do" /></td></tr>
                    </table>
                </form>