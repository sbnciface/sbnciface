<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>                <?php if ((isset($this->scope["errorSet"]) ? $this->scope["errorSet"] : null) == 1) {
?>
                <div class="<?php echo $this->scope["errorType"];?>">
                    <?php echo $this->scope["errorMessage"];?>

                </div>
                <?php 
}?>

                <table id="tbl" align="center" width="400">
                    <tr><td colspan="4" align="center"><b><?php echo $this->scope["adminText"];?></b></td></tr>
                    <tr><td width="20%"><b><?php echo $this->scope["identText"];?></b></td><td width="20%"><b><?php echo $this->scope["nickText"];?></b></td><td width="35%"><b><?php echo $this->scope["lastseenText"];?></b></td><td width="13%"><b><?php echo $this->scope["actionText"];?></b></td></tr>

                    <?php 
$_fh0_data = (isset($this->scope["adminArray"]) ? $this->scope["adminArray"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['admin'])
	{
/* -- foreach start output */
?><tr><td><?php echo $this->scope["admin"]["ident"];?></td><td class="bold"><?php echo $this->scope["admin"]["nick"];?></td><td><?php echo $this->scope["admin"]["lastseen"];?></td><td style="text-align:center;"><form action="" method="post"><input type="hidden" value="<?php echo $this->scope["admin"]["ident"];?>" name="delident" /><input class="input-image" type="image" src="template/sbnciface/img/icons/delete.png" value="<?php echo $this->scope["deleteText"];?>" name="deluser" /><a href="?p=edit&amp;u=<?php echo $this->scope["admin"]["ident"];?>"> <img src="template/sbnciface/img/icons/pencil.png"></a></form></td></tr>
                    <?php 
/* -- foreach end output */
	}
}?>

                    <tr><td colspan="4" align="center"><b><?php echo $this->scope["numAdmins"];?> Admins</b></td></tr>
                </table>
                <br />
                <table id="tbl" align="center" width="400">
                    <tr><td colspan="4" align="center"><b><?php echo $this->scope["userText"];?></b></td></tr>
                    <tr><td width="20%"><b><?php echo $this->scope["identText"];?></b></td><td width="20%"><b><?php echo $this->scope["nickText"];?></b></td><td width="35%"><b><?php echo $this->scope["lastseenText"];?></b></td><td width="13%"><b><?php echo $this->scope["actionText"];?></b></td></tr>

                    <?php 
$_fh1_data = (isset($this->scope["userArray"]) ? $this->scope["userArray"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['user'])
	{
/* -- foreach start output */
?><tr><td><?php echo $this->scope["user"]["ident"];?></td><td class="bold"><?php echo $this->scope["user"]["nick"];?></td><td><?php echo $this->scope["user"]["lastseen"];?></td><td style="text-align:center;"><form action="" method="post"><input type="hidden" value="<?php echo $this->scope["user"]["ident"];?>" name="delident" /><input class="input-image" type="image" src="template/sbnciface/img/icons/delete.png" value="<?php echo $this->scope["deleteText"];?>" name="deluser" /><a href="?p=edit&amp;u=<?php echo $this->scope["admin"]["ident"];?>"> <img src="template/sbnciface/img/icons/pencil.png"></a></form></td></tr>
                    <?php 
/* -- foreach end output */
	}
}?>

                    <tr><td colspan="4" align="center"><b><?php echo $this->scope["numUsers"];?> Users</b></td></tr>
                </table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>