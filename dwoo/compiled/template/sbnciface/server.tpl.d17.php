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
                        <tr><td width="40%"><?php echo $this->scope["serverText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["serverName"];?>" size="33" value="<?php echo $this->scope["serverValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["portText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["portName"];?>" size="33" value="<?php echo $this->scope["portValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["passwordText"];?>:</td><td width="60%"><input type="text" name="<?php echo $this->scope["passwordName"];?>" size="33" value="<?php echo $this->scope["passwordValue"];?>" /></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["vhostText"];?>:</td><td width="60%"><select name="<?php echo $this->scope["vhostName"];?>" style="width:225px;" ><?php 
$_loop0_data = (isset($this->scope["vhostValue"]) ? $this->scope["vhostValue"] : null);
if ($this->isArray($_loop0_data) === true)
{
	foreach ($_loop0_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop0_scope = $this->setScope(array("-loop-"));
/* -- loop start output */

if ($this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'vhostInUse',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), true) == (isset($this->scope["0"]) ? $this->scope["0"] : null)) {
?><option value="<?php echo $this->scope["0"];?>" selected><?php echo $this->scope["3"];?></option><?php 
}
else {
?><option value="<?php echo $this->scope["0"];?>"><?php echo $this->scope["3"];?></option><?php 
}

/* -- loop end output */
		$this->setScope($_loop0_scope, true);
	}
}
?></select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="<?php echo $this->scope["submitValue"];?>" name="do" /> <input type="submit" value="<?php echo $this->scope["jumpValue"];?>" name="jump" /></td></tr>
                    </table>
                </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>