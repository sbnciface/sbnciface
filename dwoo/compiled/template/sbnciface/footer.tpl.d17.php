<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>

            </div>
            <div id="version"><?php echo $this->scope["ifaceVersion"];?> '<?php echo $this->scope["ifaceCodename"];?>'</div>
            </div>
        </div>
    </body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>