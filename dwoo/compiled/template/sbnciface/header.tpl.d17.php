<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/sbnciface/style.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <title><?php echo $this->scope["interfaceName"];?></title>
        <script type="text/javascript">
            $.fn.pause = function(duration) {
                $(this).animate({ dummy: 1 }, duration);
                return this;
            };
            $(document).ready(function () {
                $(".success").pause(3000).fadeOut(2000);
            });
            $(document).ready(function () {
                $(".error").pause(3000).fadeOut(2000);
            });
            function pickLanguage(language) {
                document.langselector.lang.value = language;
                document.langselector.submit();
                return false;
            }
        </script>
    </head>
    <body>
        <div id="pagebody">
            <div id="container">
                <div id="langselect">
                    <form action="" method="post" name="langselector">
                        <input type="hidden" name="lang" value="" />
                        <a href="javascript:" onclick="pickLanguage('en');"><img src="img/lang/en.png" alt="en" /></a>
                        <a href="javascript:" onclick="pickLanguage('sv');"><img src="img/lang/sv.png" alt="sv" /></a>
                        <a href="javascript:" onclick="pickLanguage('fi');"><img src="img/lang/fi.png" alt="fi" /></a>
                    </form>
                </div>
                <div id="header">
                    <div id="headpic"></div>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="<?php echo $this->scope["webRoot"];?>" ><?php echo $this->scope["status"];?></a></li>
                        <li><a href="#"><?php echo $this->scope["user"];?></a>
                            <ul>
                                <li><a href="?p=settings"><?php echo $this->scope["settings"];?></a></li>
                                <li><a href="?p=server"><?php echo $this->scope["server"];?></a></li>
                                <li><a href="?p=qauth"><?php echo $this->scope["q_settings"];?></a></li>
                                <li><a href="?p=away"><?php echo $this->scope["away"];?></a></li>
                                <li><a href="?p=channels"><?php echo $this->scope["channels"];?></a></li>
                                <li><a href="?p=log"><?php echo $this->scope["log"];?></a></li>
                            </ul>
                        </li>
                        <?php if ((isset($this->scope["sbncAdmin"]) ? $this->scope["sbncAdmin"] : null) == 1) {
?>
                        <li><a href="#"><?php echo $this->scope["admin"];?></a>
                            <ul>
                                <li><a href="?p=users"><?php echo $this->scope["users"];?></a></li>
                                <li><a href="?p=add"><?php echo $this->scope["add_user"];?></a></li>
                                <li><a href="?p=ipsettings"><?php echo $this->scope["trusted_ips"];?></a></li>
                                <li><a href="?p=vhosts"><?php echo $this->scope["vhosts"];?></a></li>
                                <li><a href="?p=global"><?php echo $this->scope["global_msg"];?></a></li>
                            </ul>
                        </li>
                        <?php 
}?>

                        <li><a href="?logout"><?php echo $this->scope["logout"];?></a></li>
                    </ul>
                </div>
            <div id="content"><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>