<?php
/* template head */
if (class_exists('Dwoo_Plugin_cycle', false)===false)
	$this->getLoader()->loadPlugin('cycle');
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <?php if ((isset($this->scope["logState"]) ? $this->scope["logState"] : null) == 'empty') {
?>
                    <?php echo $this->scope["logString"];?>

                <?php 
}
else {
?>
                    <?php 
$_fh0_data = (isset($this->scope["logString"]) ? $this->scope["logString"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['as']=>$this->scope['row'])
	{
/* -- foreach start output */
?>
                        <div class="<?php echo $this->classCall('cycle', array('default', "one, two", true, true, ',', null, false));?>"><?php echo $this->scope["row"];?></div>
                    <?php 
/* -- foreach end output */
	}
}?>

                    <div class="button"><form action="" method="post"><input type="submit" value="<?php echo $this->scope["submitValue"];?>" name="do" /></form></div>
                <?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>