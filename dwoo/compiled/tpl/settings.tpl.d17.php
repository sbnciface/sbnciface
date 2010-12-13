<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <form action="" method="post">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%"><?php echo $this->scope["realnameText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["realnameName"];?>" size="33" value="<?php echo $this->scope["realnameValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["nicknameText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["nicknameName"];?>" size="33" value="<?php echo $this->scope["nicknameValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["passwordText"];?>:</td><td width="60%"><input type="password" name="<?php echo $this->scope["passwordName"];?>" size="33" value="<?php echo $this->scope["passwordValue"];?>" /></td></tr>
                        <tr><td colspan="2" align="center" ><input type="submit" value="<?php echo $this->scope["submitValue"];?>" name="do" /></td></tr>
                    </table>
                </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>