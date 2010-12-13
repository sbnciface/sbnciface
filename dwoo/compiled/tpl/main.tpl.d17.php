<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <form action="" method="post">
                    <table id="tbl" align="center" width="400">
                        <?php if ((isset($this->scope["uptimeValue"]) ? $this->scope["uptimeValue"] : null) == 0) {
?>
                        <tr><td width="40%"><?php echo $this->scope["uptimeText"];?></td><td width="60%" id="uptime"><?php echo $this->scope["uptimeDisconnected"];?></td></tr>
                        <?php 
}
else {
?>
                        <tr><td width="40%"><?php echo $this->scope["uptimeText"];?></td><td width="60%" id="uptime"></td></tr>
                        <?php 
}?>

                        <tr><td width="40%"><?php echo $this->scope["nicknameText"];?></td><td width="60%"><?php echo $this->scope["nicknameValue"];?></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["awaynickText"];?></td><td width="60%"><?php echo $this->scope["awaynickValue"];?></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["awaymessageText"];?></td><td width="60%"><?php echo $this->scope["awaymessageValue"];?></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["realnameText"];?></td><td width="60%"><?php echo $this->scope["realnameValue"];?></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["serverText"];?></td><td width="60%"><?php echo $this->scope["serverValue"];?></td></tr>
                        <tr><td width="40%"><?php echo $this->scope["trafficText"];?></td><td width="60%"><?php echo $this->scope["trafficValue"];?></td></tr>
                    </table>
                </form>
                <script type="text/javascript">
                    <?php if ((isset($this->scope["uptimeValue"]) ? $this->scope["uptimeValue"] : null) > 0) {
?>
                    var UptimeTicks = <?php echo $this->scope["uptimeValue"];?>;
                    <?php 
}
else {
?>
                    var UptimeTicks = <?php echo $this->scope["uptimeValue"];?>;
                    <?php 
}?>

                    function UptimeRefresh ()
                    {
                        var days = Math.floor(UptimeTicks /60/60/24);
                        var hours = Math.floor((UptimeTicks - days*60*60*24)/60/60);
                        var minutes = Math.floor((UptimeTicks - days*60*60*24 - hours*60*60)/60);
                        var seconds = (UptimeTicks - days*60*60*24 - hours*60*60 - minutes*60);
                        document.getElementById('uptime').innerHTML = days + ' days ' + hours + ' hours ' + minutes + ' minutes ' + seconds + ' seconds';
                        UptimeTicks++;
                    }
                    UptimeRefresh();
                    setInterval("UptimeRefresh()", 1000);
                </script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>