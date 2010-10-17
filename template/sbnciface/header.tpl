<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/sbnciface/style.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title>{$interfaceName}</title>
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
    <body>
        <div id="pagebody">
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
                <div id="header">
                    <div id="headpic"></div>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="{$webRoot}" >{$status}</a></li>
                        <li><a href="#">{$user}</a>
                            <ul>
                                <li><a href="?p=settings">{$settings}</a></li>
                                <li><a href="?p=server">{$server}</a></li>
                                <li><a href="?p=qauth">{$q_settings}</a></li>
                                <li><a href="?p=away">{$away}</a></li>
                                <li><a href="?p=channels">{$channels}</a></li>
                                <li><a href="?p=log">{$log}</a></li>
                            </ul>
                        </li>
                        {if $sbncAdmin == 1}
                        <li><a href="#">{$admin}</a>
                            <ul>
                                <li><a href="?p=users">{$users}</a></li>
                                <li><a href="?p=add">{$add_user}</a></li>
                                <li><a href="?p=ipsettings">{$trusted_ips}</a></li>
                                <li><a href="?p=vhosts">{$vhosts}</a></li>
                                <li><a href="?p=global">{$global_msg}</a></li>
                            </ul>
                        </li>
                        {/if}
                        <li><a href="?logout">{$logout}</a></li>
                    </ul>
                </div>
            <div id="content">