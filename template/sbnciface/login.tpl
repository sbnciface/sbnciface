<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/sbnciface/style.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <title>{$interfaceName}</title>
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
    <body onload="document.loginfield.username.focus()">
        <div id="loginbody">
            <div id="container">
                <div id="langselect">
                    <form action="" method="post" name="langselector">
                        <input type="hidden" name="lang" value="" />
                        <a href="javascript:" onclick="pickLanguage('en');"><img src="img/lang/en.png" alt="en" /></a>
                        <a href="javascript:" onclick="pickLanguage('de');"><img src="img/lang/de.png" alt="de" /></a>
                        <a href="javascript:" onclick="pickLanguage('da');"><img src="img/lang/da.png" alt="da" /></a>
                        <a href="javascript:" onclick="pickLanguage('no');"><img src="img/lang/no.png" alt="no" /></a>
                        <a href="javascript:" onclick="pickLanguage('sv');"><img src="img/lang/sv.png" alt="sv" /></a>
                        <a href="javascript:" onclick="pickLanguage('fi');"><img src="img/lang/fi.png" alt="fi" /></a>
                        <a href="javascript:" onclick="pickLanguage('pl');"><img src="img/lang/pl.png" alt="pl" /></a>
                        <a href="javascript:" onclick="pickLanguage('lt');"><img src="img/lang/lt.png" alt="lt" /></a>
                    </form>
                </div>
                <div id="loginheader">
                    <div id="loginheadpic"></div>
                </div>
            <form action="" method="post" name="loginfield">
                <table cellpadding="4" align="center">
                    <tr><td>{$usernameText}:</td><td><input type="text" name="username" /></td></tr>
                    <tr><td>{$passwordText}:</td><td><input type="password" name="password" /></td></tr>
                    <tr><td colspan="2" style="text-align: left;"><input type="checkbox" name="remember" value="1"  /> {$rememberMeText}</td></tr>
                    <tr><td colspan="2" style="text-align: right;"><input type="submit" name="do" value="{$submitText}" /></td></tr>
                </table>
            </form>
            <div id="version">{$ifaceVersion}</div>
            </div>
        </div>
    </body>
</html>