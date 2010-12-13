<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title><?php echo $this->scope["interfaceName"];?></title>
        <script>
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
    <body onLoad="document.loginfield.username.focus()">
        <div id="loginbody">
            <div id="container">
                <div id="langselect">
                    <form action="" method="POST" name="langselector">
                        <input type="hidden" name="lang" value="" />
                        <a href="javascript:" onclick="pickLanguage('en');"><img src="img/lang/en.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('de');"><img src="img/lang/de.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('da');"><img src="img/lang/da.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('no');"><img src="img/lang/no.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('sv');"><img src="img/lang/sv.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('fi');"><img src="img/lang/fi.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('pl');"><img src="img/lang/pl.png" /></a>
                        <a href="javascript:" onclick="pickLanguage('lt');"><img src="img/lang/lt.png" /></a>
                    </form>
                </div>
                <div id="loginheader">
                    <div id="loginheadpic"></div>
                </div>
            <form action="" method="post" name="loginfield">
                <table cellpadding="4" align="center">
                    <tr><td><?php echo $this->scope["usernameText"];?>:</td><td><input type="text" name="username" /></td></tr>
                    <tr><td><?php echo $this->scope["passwordText"];?>:</td><td><input type="password" name="password" /></td></tr>
                    <tr><td colspan="2" style="text-align: left;"><input type="checkbox" name="remember" value="1"  /> <?php echo $this->scope["rememberMeText"];?><td></tr>
                    <tr><td colspan="2" style="text-align: right;"><input type="submit" name="do" value="<?php echo $this->scope["submitText"];?>" /></td></tr>
                </table>
            </form>
            <div id="version"><?php echo $this->scope["ifaceVersion"];?></div>
            </div>
        </div>
    </body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>