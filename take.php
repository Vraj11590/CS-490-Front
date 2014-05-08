<?php 
	include 'curl.php';
	include 'header.php';


	if(isset($_POST['Grade'])){
		$temp = $_POST;
		print_r($temp);
	}
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
		$quiz = get_quiz_by_id(array("action"=>"send_quiz_by_id","quiz_id"=>$_GET['id']));
		$quiz_decoded = json_decode($quiz);
		$i = 1;
?>
<form method="POST" name="<?php echo $_GET['id']; ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php
		foreach ($quiz_decoded as $key => $value){

			if($quiz_decoded[$key]->Type == "OE"){
?>
		<div style="width:600px;" id="question_viewer">

		 <center> <p> <b> <span style="background-color: #FFFF00;"> **Coding Question**   </span> </b> </p> </center> 

		<p> <center>  <b> <?php echo $i.")  ".$quiz_decoded[$key]->Question."<br/>"; ?> </b> </center> </p>

		<p> The code that you write below has to work for the provided test cases below :- </p>
		<center>

		<ul style="list-style-position: inside">
		<?php if($quiz_decoded[$key]->T1 != ""){ ?>	<li> <?php echo $quiz_decoded[$key]->T1; ?> </li> <?php } ?>
		<?php if($quiz_decoded[$key]->T2 != ""){ ?>	<li> <?php echo $quiz_decoded[$key]->T2; ?> </li><?php } ?>
		<?php if($quiz_decoded[$key]->T3 != ""){ ?>	<li> <?php echo $quiz_decoded[$key]->T3; ?> </li><?php } ?>
		<?php if($quiz_decoded[$key]->T4 != ""){ ?>	<li> <?php echo $quiz_decoded[$key]->T4; ?> </li><?php } ?>
		</ul>

		</center>
		<textarea rows="7" cols="60" name="<?php echo $quiz_decoded[$key]->question_id; ?>"><? if($quiz_decoded[$key]->HelpCode != ""){echo $quiz_decoded[$key]->HelpCode; } ?></textarea>
		</div>
		<hr width="50%">
<?php
				$i++;
			}
?>
<?php
			if($quiz_decoded[$key]->Type == "MC"){
?>		
			<p> <center>  <b> <?php echo $i.")  ".$quiz_decoded[$key]->Question."<br/>"; ?> </b> </center> </p>

			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="<?php echo $quiz_decoded[$key]->C1; ?>"> <?php echo $quiz_decoded[$key]->C1; ?> <br>
			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="<?php echo $quiz_decoded[$key]->C2; ?>"> <?php echo $quiz_decoded[$key]->C2; ?> <br>
			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="<?php echo $quiz_decoded[$key]->C3; ?>"> <?php echo $quiz_decoded[$key]->C3; ?> <br>
			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="<?php echo $quiz_decoded[$key]->C4; ?>"> <?php echo $quiz_decoded[$key]->C4; ?> <br>
		<hr width="50%">



<?php
				$i++;
			}
			if($quiz_decoded[$key]->Type == "TF"){
?>
			<p> <center>  <b> <?php echo $i.")  ".$quiz_decoded[$key]->Question."<br/>"; ?> </b> </center> </p>
			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="True">True<br>
			<input type="radio" name="<?php echo $quiz_decoded[$key]->question_id; ?>" value="False">False<br>
		<hr width="50%">


<?php				
				$i++;
			}
			if($quiz_decoded[$key]->Type == "FB"){
				$blank = str_replace("*", "_________", $quiz_decoded[$key]->Question);

?>	
			<p> <center>  <b> <?php echo $i.")  ".$blank."<br/>"; ?> </b> </center> </p>
				Answer:- <input type="text" name="<?php echo $quiz_decoded[$key]->question_id ?>"></input>

<hr width="50%">

<?php
				$i++;
			}


		}
?>
<input type="submit" name="Grade" value="Grade!!"/>
</form>
<?php
	}
?>
</center>


<?php 
	include 'footer.php';
?>