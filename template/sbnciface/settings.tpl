                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <form action="" method="post">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%">{$realnameText}:</td><td width="60%"><input type="text" name="{$realnameName}" size="33" value="{$realnameValue}" /></td></tr>
                        <tr><td width="40%">{$nicknameText}:</td><td width="60%"><input type="text" name="{$nicknameName}" size="33" value="{$nicknameValue}" /></td></tr>
                        <tr><td width="40%">{$passwordText}:</td><td width="60%"><input type="password" name="{$passwordName}" size="33" value="{$passwordValue}" /></td></tr>
                        <tr><td colspan="2" align="center" ><input type="submit" value="{$submitValue}" name="do" /></td></tr>
                    </table>
                </form>