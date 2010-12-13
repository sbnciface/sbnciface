<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%"><?php echo $this->scope["awaynickText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["awaynickName"];?>" size="33" value="<?php echo $this->scope["awaynickValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["awaymessageText"];?>:</td><td width="60%"><input type="password" name="<?php echo $this->scope["awaymessageName"];?>" size="33" value="<?php echo $this->scope["awaymessageValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["quitasawayText"];?>:</td><td width="60%"><select name="<?php echo $this->scope["quitasawayName"];?>" style="width:225px;" ><?php if ((isset($this->scope["quitasawayValue"]) ? $this->scope["quitasawayValue"] : null) == 1) {
?><option value="1" selected><?php echo $this->scope["quitasawayValueYes"];?></option><option value="0"><?php echo $this->scope["quitasawayValueNo"];?></option><?php 
}
else {
?><option value="1"><?php echo $this->scope["quitasawayValueYes"];?></option><option value="0" selected><?php echo $this->scope["quitasawayValueNo"];?></option><?php 
}?></select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="<?php echo $this->scope["submitValue"];?>" name="do" /></td></tr>
                    </table>
                </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>