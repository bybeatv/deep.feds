<?php
ini_set('display_errors',1);
session_start();
include( 'global.php' );

if(isset($_GET['username'])) {
$u = $_GET['username'];

	$req = $db->query("SELECT username FROM players WHERE username = '{$u}' ");
	if($req->num_rows >= 1){				
		die('[rule:error]');
	}else {
		die('[rule:success]');
	}
}

if(isset($_POST['Socyalize'])) {
	if(isset($_POST['Socyalize']['Provider']['token'])) {
		$validationEntity = get_headers("https://www.socyalize.com/socializes/confirm/" . $_POST['Socyalize']['Provider']['provider_id'] . "/" . $_POST['Socyalize']['Provider']['token'] . "");
		if(substr($validationEntity[0], 9, 3) == 200) {
			$provider_name = $_POST['Socyalize']['Provider']['provider_name'];
				$provider_id = $_POST['Socyalize']['Provider']['provider_id'];

			$selectisset = $db->query("SELECT username, provider_name, provider_id FROM players WHERE provider_name = '{$provider_name}' AND provider_id = '{$provider_id}' LIMIT 1");
			
			$q = $selectisset->fetch_array();
			if($selectisset->num_rows >= 1) {
				$_SESSION['username'] = $q['username'];
				header("location: ../profil");
				} else {
			
				$provider_name = $_POST['Socyalize']['Provider']['provider_name'];
				$provider_id = $_POST['Socyalize']['Provider']['provider_id'];
				$first_name = $_POST['Socyalize']['username'];
				$look = "hd-195-1359.lg-3023-82.ch-595902031-92-82.sh-290-92.ea-1402-63.he-3155-92.hr-679-31.ca-1807-63";

				$req = $db->query("INSERT INTO players (username, mail, auth_ticket, rank, look, last_online, reg_date, provider_name, provider_id) VALUES ('".$first_name ."', '', '', '1','". $look ."', '".time()."', '".date("Y-m-d ")."', '".$provider_name."', '".$provider_id."')");
							
				$callback = isset($_POST['Socyalize']['callback']) ? file_get_contents("https://www.socyalize.com/socializes/callback/" . $_POST['Socyalize']['callback'] . "/" . $_POST['Socyalize']['Provider']['provider_id']) : null;

				$_SESSION['username'] = $first_name;

				$check = $db->query("SELECT * FROM players WHERE username = '".$_SESSION['username']."' LIMIT 1");
				$row = $check->fetch_array();
				
										//HACEMOS EL LOGUEO
						$_SESSION['connection_type'] = "id";
						header("LOCATION: /home");
						
			}			
		}
	}
}
?>