                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <div class="info">{$passwordEmptyText}</div>
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr>
                            <td width="40%">{$identLangText}:</td><td width="60%"><input type="text" name="{$identName}" size="33" /></td>
                        </tr>
                        <tr>
                            <td width="40%">{$passwordLangText}:</td><td width="60%"><input type="text" name="{$passwordName}" size="33" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" value="{$adduserLangText}" name="{$adduserName}" /></td>
                        </tr>
                    </table>
                </form>
                