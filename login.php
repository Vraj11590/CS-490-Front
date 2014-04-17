<?php 
	
	include 'curl.php';

	$result = do_login($_POST);

	$data = json_decode($result);


	if($data->allow == "Yes"){
		session_start();
        session_id($data->sid);
		if($data->type == "teacher"){
			header("Location: http://front.codingcat.vj/home.php?type=t&session=".$data->sid);
		}
		if($data->type == "student"){
			header("Location: http://front.codingcat.vj/home.php?type=s&session=".$data->sid);
		}
	}
	if($data->allow == "No"){
		header("Location: http://front.codingcat.vj/index.php?message=compile error");
	}
	  
?>