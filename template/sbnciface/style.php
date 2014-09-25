<?php
  session_start();
  header("Content-Type: text/css; charset=utf-8");
?>
/*
<?php if (!empty($_SESSION["nst"])) { echo " * " . $_SESSION["nst"] . "\n"; } ?>
 * Copyright (C) 2010-2014 Conny Sjöblom
 * Copyright (C) 2010-2014 Arne Jensen
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/* Main Site Vars */
/* Funky green @ #99FF00 */
body {
    margin: 0px;
    background-color: #333333;
    background-repeat: repeat-x;
    font-family: Tahoma,Arial,Helvetica,sans-serif;
    font-size: 11px;
}

img {
    border: 0px;
}

ul {
    list-style: none;
    font-size: 11px;
    margin:0;
    padding:0;
}

a:link {
    text-decoration: none;
    color: #000000
}
a:visited {
    text-decoration: none;
    color: #000000
}
a:active {
    text-decoration: underline;
}
a:hover {
    text-decoration: underline;
}

#pagebody {
    margin-top: 15px;
    margin-bottom: 15px;
    width: 750px;
    margin-right: auto;
    margin-left: auto;
}

#loginbody {
    margin-top: 15px;
    margin-bottom: 15px;
    width: 520px;
    margin-right: auto;
    margin-left: auto;
}

#container{
    background-color:#f5f5f5;
    padding:30px;

    -moz-border-radius:12px;
    -khtml-border-radius: 12px;
    -webkit-border-radius: 12px;
    border-radius:12px;
}

#loginheadpic {
    background:#f5f5f5 url("./img/headsmall.png") no-repeat;
    width: 347px;
    height: 10px;
    margin: auto;
    padding-bottom: 20px;
}

#headpic {
    background:#f5f5f5 url("./img/head.png") no-repeat;
    width: 466px;
    height: 16px;
    margin: auto;
    padding-bottom: 20px;
}

#content {
    padding-top: 20px;
}

#bottom {
    padding-top: 20px;
    clear: both;
    text-align: center;
    width: 100%;
}

#langselect {
    padding-bottom: 5px;
}

#langselect input{
    border: 0px;
    margin-right: 5px;
}

#copyright{
    font-family: Helvetica, "Helvetica Neue", Arial, sans-serif;
    width: 100%;
    padding-top: 15px;
    text-align: center;
}

.one {
    padding: 5px;
}

.two {
    padding: 5px;
    background-color: #CCC;
}

.button {
    text-align:center;
    margin: auto;
    margin-top: 20px;
}

.mid {
    text-align:center;
    margin: auto;
}

.bold {
    font-weight: bold;
}

.nsg {
    position: absolute;
    bottom: 0px;
    right: 0px;
    color: #333900;
}

/* Table Vars */

/*tr:hover {background-color:#2580a2;}*/

table#tbl{
}

table#tbl a:link {
    text-decoration: underline;
}

table#tbl a:visited {
    text-decoration: underline;
}

table#tbl td {
    padding:5px;
}

table#tbl tr td {
    border:1px solid #666;
    font-family:tahoma;
    font-size:11px;
}


/* Gloabal Form Vars*/

.input-image {
    border: 0px;
    margin: 0px 3px;
}

input {
    border: 1px solid;
}

input[type="radio"] {
    border: 0;
}

select {
    border: 1px solid;
}

/* Menu */

.menu{
    border:none;
    border:0px;
    margin:0px;
    padding:0px;
    font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
    font-size:14px;
    font-weight:bold;

    filter:alpha(opacity=90);
    -moz-opacity:0.9;
    -khtml-opacity: 0.9;
    opacity: 0.9;
}

.menu ul{
    background:#333333;
    height:35px;
    list-style:none;
    margin:0;
    padding:0;
}

.menu li{
    float:left;
    padding:0px;
}

.menu li a{
    background:#333333;
    color:#cccccc;
    display:block;
    font-weight:normal;
    line-height:35px;
    margin:0px;
    padding:0px 25px;
    text-align:center;
    text-decoration:none;
}
.menu li a:hover, .menu ul li:hover a{
    background: #2580a2;
    color:#FFFFFF;
    text-decoration:none;
}
.menu li ul{
    background:#333333;
    display:none;
    height:auto;
    padding:0px;
    margin:0px;
    border:0px;
    position:absolute;
    width:225px;
    z-index:200;
    /*top:1em;
	/*left:0;*/
}
.menu li:hover ul{
    display:block;
}
.menu li li {
    display:block;
    float:none;
    margin:0px;
    padding:0px;
    width:225px;
}
.menu li:hover li a{
    background:none;
}
.menu li ul a{
    display:block;
    height:35px;
    font-size:12px;
    font-style:normal;
    margin:0px;
    padding:0px 10px 0px 15px;
    text-align:left;
}
.menu li ul a:hover, .menu li ul li:hover a{
    background:#2580a2;
    border:0px;
    color:#ffffff;
    text-decoration:none;
}
.menu p{
    clear:left;
}

.disabled {
    opacity : 0.3;
    /* IE opacity */
    filter: alpha(opacity=30);
}

/*

        ERRORS

*/

.info, .success, .warning, .error, .staticerror, .validation {
    border: 1px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    margin: auto;
    width: 335px;
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('./img/info.png');
}
.success {
    margin: auto;
    width: 335px;
    color: #4F8A10;
    background-color: #DFF2BF;
    background-image:url('./img/success.png');
}
.warning {
    margin: auto;
    width: 335px;
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('./img/warning.png');
}
.error {
    margin: auto;
    width: 335px;
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url('./img/error.png');
}

.staticerror {
    margin: auto;
    width: 335px;
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url('./img/error.png');
}
