<?php 
	session_start();	
	//header does sessions
	include 'curl.php';
	include 'header.php';

	$qu = $_SESSION['quiz_cart'];
	if( !in_array("get_questions_by_id_array", $qu) ){
		array_push($qu,"get_questions_by_id_array");
	}

	$http_query = http_build_query($qu) . "\n";

	$result = get_questions_by_id_array($http_query);
	print_r(json_decode($result));

	$_SESSION['quiz_cart'] = $qu;

	if(isset($_GET['m'])){
		$m = $_GET['m'];
		if($m == "clear"){
			unset($_SESSION['quiz_cart']);
			header("Location: http://front.codingcat.vj/cart.php?m=cleared");
		}
	}
?>
<center>

		<a href="<?php echo $_SERVER['PHP_SELF'].'?m=clear'?>"> Clear Cart </a>
		<br/>
		<a href="<?php echo $_SERVER['PHP_SELF'].'?m=checkout'?>"> Checkout Quiz </a>
</center>
<?php 
	include 'footer.php';
?>