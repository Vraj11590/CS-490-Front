<?php 
	include 'curl.php';
	include 'header.php';

	//show all quizzes
	$quizzes = get_all_quizzes(array("action"=>"send_all_quizzes"));

	$res = json_decode($quizzes);

?>
<?php if( !isset($_GET['id']) ) { ?> 
	<center>
	<p> Please select a quiz to take </p>
	<?php 
				foreach ($res as $key => $value) {
	?>

	<a href = "<?php echo $_SERVER['PHP_SELF']."?id=".$res[$key]->quiz_id; ?>"> <?php echo $res[$key]->Quiz_name; ?> </a> <br/>

	<?php
				}
	?>
	</center>
<?php } ?>

<center>
<?php 
	if (isset($_GET['id'])){
		echo "will load Quiz with id: ". $_GET['id'];
		$quiz = get_quiz_by_id(array("action"=>"send_quiz_by_id","quiz_id"=>$_GET['id']));
		print_r(json_decode($quiz));
	}
?>
</center>


<?php 
	include 'footer.php';
?>