<?php
/* ♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛\
██╗   ██╗███████╗███████╗███████╗    ███████╗███████╗██████╗ ██╗   ██╗███████╗██████╗ 
╚██╗ ██╔╝██╔════╝╚══███╔╝╚══███╔╝    ██╔════╝██╔════╝██╔══██╗██║   ██║██╔════╝██╔══██╗
 ╚████╔╝ █████╗    ███╔╝   ███╔╝     ███████╗█████╗  ██████╔╝██║   ██║█████╗  ██████╔╝
  ╚██╔╝  ██╔══╝   ███╔╝   ███╔╝      ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██╔══╝  ██╔══██╗
   ██║   ███████╗███████╗███████╗    ███████║███████╗██║  ██║ ╚████╔╝ ███████╗██║  ██║
   ╚═╝   ╚══════╝╚══════╝╚══════╝    ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚═╝  ╚═╝
   ────────────────────────CMS de Uso Privado 2018  by Forbi───────────────────────────
\ ♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛♛*/


	error_reporting(0);

	session_set_cookie_params(86400); 
	ini_set('session.gc_maxlifetime', 86400);
	session_start();

    function SacarIP(){
		if($_SERVER){
			if($_SERVER["HTTP_X_FORWARDED_FOR"]){
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			}elseif ($_SERVER["HTTP_CLIENT_IP"]){
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			}else{
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		}else{
			if(getenv("HTTP_X_FORWARDED_FOR")){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			}elseif(getenv("HTTP_CLIENT_IP")){
				$realip = getenv("HTTP_CLIENT_IP");
			}else{
				$realip = getenv("REMOTE_ADDR");
			}
		}
		return $realip;
	}
	$realip = SacarIP();
	define ( 'USER_IP', $realip );
	define ( 'SEPARATOR', DIRECTORY_SEPARATOR );
	define ( 'DIR', __DIR__ );
	define ( 'WEB', true );
	define ( 'YeezyCMS', true );

	define( 'CHARSET','UTF-8' );
	header( 'Content-type: text/html; charset='.CHARSET );

	include( 'deprived/class.core.php' );

	$TplClass->SetParam( 'error', '' );

	$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	$data = $result->fetch_array();
	$TplClass->SetParam( 'SHORTNAME', $data['hotelname'] );
	$TplClass->SetParam( 'FACE', $data['facebook'] );
	$TplClass->SetParam( 'LOGO', $data['logo'] );

	$TplClass->SetParam( 'PATH', PATH );
	$TplClass->SetParam( 'PATHC', PATHC );
	$TplClass->SetParam( 'FILES', FILES );
	$TplClass->SetParam( 'PATHCLIENT', PATHCLIENT );
	$TplClass->SetParam( 'HK', HK );
	$TplClass->SetParam( 'CLUBNAME', CLUBNAME );
	$TplClass->SetParam( 'FECHAF', '2018');
	$TplClass->SetParam( 'FOOTER', 'Todos los derechos reservados a sus respectivos autores.' );
	$TplClass->SetParam( 'FOOTER2', 'Mabbi CMS by FORBI' );
	$TplClass->SetParam( 'AVATARIMAGE', AVATARIMAGE );
	$TplClass->SetParam( 'USERID', $_SESSION['id'] );
	$TplClass->SetParam( 'USERSON', $Functions->GetOns() );
    $TplClass->SetParam( 'USERREG', $Functions->GetCount('users') );
	$TplClass->SetParam( 'MYID', $Functions->GetID() );

	//USER INFO
	$users = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();	
	$TplClass->SetParam( 'USERNAME', $Functions->FilterText($user['username']) );
	//END USER INFO

    //HK
	if($user['rank'] > 13){
    $TplClass->SetParam( 'HKLINK', '<a onclick="window.location.href=\''.HK.'\'" href="'.HK.'" target="_blank">
<div id="h38">
<div id="h28">HK1</div>
</div>
</a>');
     }else{
    $TplClass->SetParam( 'HKLINK', '');
		 }
		 
		 if($user['rank'] > 13){
    $TplClass->SetParam( 'HK2LINK', '<a onclick="window.location.href=\''.HK2.'\'" href="'.HK2.'" target="_blank">
<div id="h40">
<div id="h28">HK2</div>
</div>
</a>');
     }else{
    $TplClass->SetParam( 'HK2LINK', '');
		 }

	$resulta = $db->query("SELECT * FROM players WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	while($lastc = $resulta->fetch_array()){ $TplClass->SetParam( 'LASTC', $Functions->GetLast($lastc['last_online']) ); }

	$db->query("DELETE from cms_stories where (UNIX_TIMESTAMP()-cms_stories.time)>86400");
	$db->query("DELETE from cms_stories_likes where (UNIX_TIMESTAMP()-cms_stories_likes.time)>86400");

	if($user['cms_pin'] == 1){
		$db->query("UPDATE players SET pin_intentos = '3' WHERE id = '".$user['id']."' AND (UNIX_TIMESTAMP()-players.pin_time)>900");
	}
	
	if($user['cms_pin'] == 2){
	$db->query("UPDATE players SET pin_time = '".time()."', cms_pin = '1'  WHERE id = '".$user['id']."' AND (UNIX_TIMESTAMP()-players.pin_time)>7200");
	}
	
	if($user['rank'] < 3){
	$db->query("UPDATE players SET vip_time = '0', vip_mes = '0', vip = '0', rank = '1'  WHERE id = '".$user['id']."' AND (UNIX_TIMESTAMP()-player_subscriptions.expire)>2592000 AND vip = '1' AND rank_vip = '1' LIMIT 1");
   }
   
   if($user['rank'] > 2){
	$db->query("UPDATE players SET vip_time = '0', vip_mes = '0', vip = '0'  WHERE id = '".$user['id']."' AND (UNIX_TIMESTAMP()-player_subscriptions.expire)>2592000 AND vip = '1' AND rank_vip = '1' LIMIT 1");
   }
   
?>
