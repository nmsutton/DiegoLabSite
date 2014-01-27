<?php
	$_COOKIE['login'] = "";
	$_COOKIE['password'] = "";
	$_COOKIE['authenticationCorrect'] = "false";
	setcookie("login", "", time()+60, "/","", 0);
	setcookie("password", "", time()+60, "/","", 0);
	setcookie("authenticationCorrect", "false", time()+60, "/","", 0);
	
if(!isset($_SESSION)){
        session_start();
        }
unset($_SESSION['login']);
unset($_SESSION['password']);
if(!isset($_SESSION)){
session_destroy();
}
$sessionPath = session_get_cookie_params();
setcookie(session_name(), "", 0, $sessionPath["path"], $sessionPath["domain"]);
unset($login, $password, $entered_login, $entered_password);
?>