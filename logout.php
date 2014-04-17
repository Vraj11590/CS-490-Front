<?php 

	include 'curl.php';

	$s = $_GET['session'];
	
	//destroy session in front
	session_destroy($s);
	//destroy session in middle
	$ob = array('sid'=>$s);
	$o = do_logout($ob);

	if ($o->status == "out"){
		header("Location: http://front.codingcat.vj/index.php");
	}
	else{
		echo "some error";
	}





?>