                {if $sbncNumChannels == 20}
                <div class="warning">
                    You have already joined 20 channels
                </div>
                {else}
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td colspan="2" align="center"><b>{$joinchannelText}</b></td></tr>
                        <tr><td width="40%">{$jchannelText}:</td><td width="60%"><input type="text" name="{$jchannelName}" size="33" /></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="{$submitJoinValue}" name="join" /></td></tr>
                    </table>
                </form>
                {/if}
                <br /><br />
                <form action="" method="post">
                    <table id="tbl" align="center" width="400">
                        <td width="55%"><b>{$channelName}</b></td><td><b>{$modesName}</b></td><td width="1%"><b>{$actionName}</b></td>
                        {foreach $sbncChannels channel}<tr><form action="" method="post"><input type="hidden" name="channel" value="{$channel.channel}" /><td>{$channel.channel}</td><td>{$channel.chanmodes}</td><td align="center"><input class="input-image" type="image" src="template/sbnciface/img/icons/delete.png"  value="{$_parent.submitPartValue}" name="part" /></td></form></tr>
                        {/foreach}
                    </table>
                </form>