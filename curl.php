<?php 
	function do_login($data){
		$url = "http://middle.codingcat.vj/login.php";
	 	$ch = curl_init();

		//curl settings
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
   		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookies.txt'); // set cookie file to given file
		curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookies.txt'); // set same file as cookie jar		
		//curl_setopt ($ch, CURLOPT_HEADER, false);
		//header has to be commented out when sending multidimensional array
	    //curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data") );

		$result = curl_exec($ch);

		return $result;

		//result is a json array

		// if($result){

		// }else if($result->)

		 curl_close($ch);	
	}
	function do_logout($data){
		$url = "http://middle.codingcat.vj/logout.php";

	 	
	 	$ch = curl_init();

		//curl settings
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt ($ch, CURLOPT_HEADER, false);
		//header has to be commented out when sending multidimensional array
	   //curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data") );


		$result = curl_exec($ch);

		return $result;
  		curl_close($ch);			

	}
	function pull_questions($data){
		$url = "http://middle.codingcat.vj/pull_questions.php";

	 	
	 	$ch = curl_init();

		//curl settings
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt ($ch, CURLOPT_HEADER, false);
		//header has to be commented out when sending multidimensional array
	   //curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data") );


		$result = curl_exec($ch);

		return $result;

		//result is a json array

		// if($result){

		// }else if($result->)

		 curl_close($ch);			
	}

	function check_session(){
		// Get the users details
		$url = "http://middle.codingcat.vj/check_session.php";
	 	$ch = curl_init();

		//curl settings
		curl_setopt ($ch, CURLOPT_URL, $url);
		//curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		//curl_setopt ($ch, CURLOPT_POST, true);
		//curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
   		//curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
		//curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookies.txt'); // set cookie file to given file
		//curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookies.txt'); // set same file as cookie jar		
		//curl_setopt ($ch, CURLOPT_HEADER, false);
		//header has to be commented out when sending multidimensional array
	    //curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data") );


		$result = curl_exec($ch);

		return $result;

		//result is a json array

		// if($result){

		// }else if($result->)

		 curl_close($ch);	
	}
	function create_question($data){
		$url = "http://middle.codingcat.vj/actions.php";
	 	$ch = curl_init();

		//curl settings
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	
		//curl_setopt ($ch, CURLOPT_HEADER, false);
		//header has to be commented out when sending multidimensional array
	    //curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data") );

		$result = curl_exec($ch);

		return $result;

		//result is a json array

		// if($result){

		// }else if($result->)

		 curl_close($ch);			
	}
?>