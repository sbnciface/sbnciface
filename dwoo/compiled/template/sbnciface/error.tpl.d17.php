<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>