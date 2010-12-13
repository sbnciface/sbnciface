<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <div class="info"><?php echo $this->scope["passwordEmptyText"];?></div>
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr>
                            <td width="40%"><?php echo $this->scope["identLangText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["identName"];?>" size="33" /></td>
                        </tr>
                        <tr>
                            <td width="40%"><?php echo $this->scope["passwordLangText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["passwordName"];?>" size="33" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" value="<?php echo $this->scope["adduserLangText"];?>" name="<?php echo $this->scope["adduserName"];?>" /></td>
                        </tr>
                    </table>
                </form>
                <?php  /* end template body */
return $this->buffer . ob_get_clean();
?>