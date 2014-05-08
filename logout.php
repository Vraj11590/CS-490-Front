<?php 
	include 'curl.php';

	session_start();

	session_destroy();
	//use curl to destroy session in middle
	$ucid = $_SESSION['token'];
	echo $ucid;

	$d = array("token"=>$ucid);
	$do = do_logout($d);
	if($do->message == "logout_success"){
		session_destroy();
		echo "done";
	}

?>