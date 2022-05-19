<?php
function generer_token($nom = '')
{
	session_start();
	$token = uniqid(rand(), true);
	$_SESSION[$nom.'_token'] = $token;
	$_SESSION[$nom.'_token_time'] = time();
	return $token;
}
function verifier_token($temps, $referer, $nom = '')
{
session_start();
if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token']))
	if($_SESSION[$nom.'_token'] == $_POST['token'])
		if($_SESSION[$nom.'_token_time'] >= (time() - $temps))
			if($_SERVER['HTTP_REFERER'] == $referer)
				return true;
return false;
}
?>