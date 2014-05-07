<?php 
	
	session_start();

	include 'sessdata.php';
	include 'curl.php';

	$result = do_login($_POST);
	$data = json_decode($result);

	if($data->allow == "Yes"){
		if($data->type == "teacher" || $data->type == "Teacher"){
			header("Location: http://front.codingcat.vj/home.php");
			$_SESSION['type'] = $data->type; // store session data
			$_SESSION['token'] = $data->ucid;
			$_SESSION['name'] = $data->name;
		}
		if($data->type == "student" || $data->type == "Student"){
			header("Location: http://front.codingcat.vj/home.php");
			$_SESSION['type'] = $data->type; // store session data
			$_SESSION['token'] = $data->ucid;
			$_SESSION['name'] = $data->name;			
		}
	}
	if($data->allow == "No"){
		session_destroy();
		header("Location: http://front.codingcat.vj/index.php?message=".$data->message);
	}
?>