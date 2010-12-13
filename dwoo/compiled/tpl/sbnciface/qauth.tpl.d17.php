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
                        <tr><td width="40%"><?php echo $this->scope["qauthText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["qauthName"];?>" size="33" value="<?php echo $this->scope["qauthValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["qpassText"];?>:</td><td width="60%"><input type="password" name="<?php echo $this->scope["qpassName"];?>" size="33" value="<?php if ((isset($this->scope["qpassValue"]) ? $this->scope["qpassValue"] : null) == 1) {
?>Kl45sD34R<?php 
}?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["qmodexText"];?>:</td><td width="60%"><select name="<?php echo $this->scope["qmodexName"];?>" style="width:224px;" ><?php if ((isset($this->scope["qmodexValue"]) ? $this->scope["qmodexValue"] : null) == 1) {
?><option value="1" selected><?php echo $this->scope["qmodexValueYes"];?></option><option value="0"><?php echo $this->scope["qmodexValueNo"];?></option><?php 
}
else {
?><option value="1"><?php echo $this->scope["qmodexValueYes"];?></option><option value="0" selected><?php echo $this->scope["qmodexValueNo"];?></option><?php 
}?></select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="<?php echo $this->scope["submitValue"];?>" name="do" /></td></tr>
                    </table>
                </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>