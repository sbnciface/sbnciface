<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["joinErrorSet"]) ? $this->scope["joinErrorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["joinErrorType"];?>">
                    <?php echo $this->scope["joinErrorMessage"];?>

                </div>
                <?php 
}?>

                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td colspan="2" align="center"><b><?php echo $this->scope["joinchannelText"];?></b></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["jchannelText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["jchannelName"];?>" size="33" /></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="<?php echo $this->scope["submitJoinValue"];?>" name="join" /></td></tr>
                    </table>
                </form>
                <br /><br />
                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <form action="" method="post">
                    <table id="tbl" align="center" width="400">
                        <td width="55%"><b><?php echo $this->scope["channelName"];?></b></td><td><b><?php echo $this->scope["modesName"];?></b></td><td width="1%"><b><?php echo $this->scope["actionName"];?></b></td>
                        <?php 
$_fh0_data = (isset($this->scope["sbncChannels"]) ? $this->scope["sbncChannels"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['channel'])
	{
/* -- foreach start output */
?><tr><form action="" method="post"><input type="hidden" name="channel" value="<?php echo $this->scope["channel"]["channel"];?>" /><td><?php echo $this->scope["channel"]["channel"];?></td><td><?php echo $this->scope["channel"]["chanmodes"];?></td><td align="center"><input class="input-image" type="image" src="img/icons/delete.png"  value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'submitPart',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), false);?>" name="part" /></td></form></tr>
                        <?php 
/* -- foreach end output */
	}
}?>

                    </table>
                </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>