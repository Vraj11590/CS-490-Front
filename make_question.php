<?php 
session_start();	

include 'curl.php';
include 'header.php';

//print_r($_SESSION);

	$type="none";
	
	if(isset($_POST['submit'])) 
	{ 
	    $type = $_POST['typeQ'];
	}

	if(isset($_POST['OEsubmit']))
	{

		$Description=$_POST['Q_desc'];
		$t1 = $_POST['T1'];
		$t2 = $_POST['T2'];
		$t3 = $_POST['T3'];
		$t4 = $_POST['T4'];
		$difficulty = $_POST['diff'];
		$createdBy = $_SESSION['token'];
		$createBy_Name = $_SESSION['name'];
		$type = $_POST['type'];
		$unique_name = $_POST['Question_name'];
		$helpcode = $_POST['Q_help_code'];


		$data = array(	'action' =>  'QuestionMakeOE',
						'Description' => $Description,
						'T1'=> $t1,
						'T2'=> $t2,
						'T3'=> $t3,
						'T4'=> $t4,
						'Difficulty'=>$difficulty,
						'CreatorName'=>$createBy_Name,
						'CreatorUCID'=>$createdBy,
						'Question_name'=>$unique_name,
						'helpcode'=>$helpcode
					 );

		$result = create_question($data);
		$do = json_decode($result);
		if($do->Flag == "Success"){
			header("Location: http://front.codingcat.vj/make_question.php?m=added");
		}
		if($do->Flag == "Failed"){
			header("Location: http://front.codingcat.vj/make_question.php?m=failed");
		}

	}

	if(isset($_POST['MCsubmit']))
	{
		$Description=$_POST['Q_desc'];
		$C1 = $_POST['C1'];
		$C2 = $_POST['C2'];
		$C3 = $_POST['C3'];
		$C4 = $_POST['C4'];
		$correct = $_POST['correct'];
		$difficulty = $_POST['diff'];
		$createdBy = $_SESSION['token'];
		$createBy_Name = $_SESSION['name'];
		$type = $_POST['type'];
		$unique_name = $_POST['Question_name'];


		$data = array(	'action' =>  'QuestionMakeMC',
						'Description' => $Description,
						'C1'=> $C1,
						'C2'=> $C2,
						'C3'=> $C3,
						'C4'=> $C4,
						'Correct' => $correct,
						'Difficulty'=>$difficulty,
						'CreateorName'=>$createBy_Name,
						'CreatorUCID'=>$createdBy,
						'Question_name' => $unique_name
					 );

		$result = create_question($data);
		$do = json_decode($result);
		if($do->Flag == "Success"){
			header("Location: http://front.codingcat.vj/make_question.php?m=added");
		}
		if($do->Flag == "Failed"){
			header("Location: http://front.codingcat.vj/make_question.php?m=failed");
		}

	}

	if(isset($_POST['TFsubmit']))
	{
		$Description=$_POST['Q_desc'];
		$correct = $_POST['tf_ans'];
		$difficulty = $_POST['diff'];
		$createdBy = $_SESSION['token'];
		$createBy_Name = $_SESSION['name'];
		$type = "TF";
		$unique_name = $_POST['Question_name'];		

		$data = array(	'action' =>  'QuestionMakeTF',
						'Description' => $Description,
						'Correct' => $correct,
						'Difficulty'=>$difficulty,
						'CreateorName'=>$createBy_Name,
						'CreatorUCID'=>$createdBy,
						'Question_name' => $unique_name
					 );
		$result = create_question($data);
		$do = json_decode($result);
		if($do->Flag == "Success"){
			header("Location: http://front.codingcat.vj/make_question.php?m=added");
		}
		if($do->Flag == "Failed"){
			header("Location: http://front.codingcat.vj/make_question.php?m=failed");
		}
	
	}

	if(isset($_POST['FBsubmit'])){
		$Description=$_POST['Q_desc'];
		$correct = $_POST['fb_ans'];
		$difficulty = $_POST['diff'];
		$createdBy = $_SESSION['token'];
		$createBy_Name = $_SESSION['name'];
		$type = "TF";
		$unique_name = $_POST['Question_name'];		

		$data = array(	'action' =>  'QuestionMakeFB',
						'Description' => $Description,
						'Correct' => $correct,
						'Difficulty'=>$difficulty,
						'CreateorName'=>$createBy_Name,
						'CreatorUCID'=>$createdBy,
						'Question_name' => $unique_name
					 );
		$result = create_question($data);
		$do = json_decode($result);
		if($do->Flag == "Success"){
			header("Location: http://front.codingcat.vj/make_question.php?m=added");
		}
		if($do->Flag == "Failed"){
			header("Location: http://front.codingcat.vj/make_question.php?m=failed");
		}
		

	}


?>

<div style="padding:10px; width:600px; margin:auto;">

<p> Select the type of question you want to create 

<form name="type" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<select name="typeQ">
			<option value="FB"
			<?=$type == 'FB' ? ' selected="selected"' : '';?>>
  	     	Fill in the blank 
  	     	</option>
			
			<option value="MC"
			<?=$type == 'MC' ? ' selected="selected"' : '';?>>
			Multiple Choice
			</option>
			<option value="TF"
			<?=$type == 'TF' ? ' selected="selected"' : '';?>>
			True/False 
			</option>

			<option value="OE"
			<?=$type == 'OE' ? ' selected="selected"' : '';?>>
			Open Ended / Coding
			</option>
	</select>
	<input type="submit"  name="submit"/>
</form>

<?php 
	if($type == "none"){
?>
	<?php 
		if(isset($_GET['m'])){
			$m = $_GET['m'];
			if($m == "added"){
				echo "<p> <b> Your question has be successfully added! </b> </p>";
			}
			if($m == "failed"){
				echo "<p> <b> The question you are trying to add already exists! </b> </p>";
			}			
		}
	?>

	
	The questions that you create will be added to the questions bank! You can view the question by clicking "All Questions" above.
<?php
	}
?>

<?php 
	if($type == "MC"){
?>
	<center> <font color = "green"> You are creating a multiple choice question about the java programming language. </center> </font>
	<form name="MCFORM" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" value="MC" name="type"/>
		Detailed Question Description: 
		<textarea rows="8" cols="70" name="Q_desc"></textarea>
		<hr/>

		Create Choices :- Leave blank if needed. <br/>
		<center>
		Choice A : <input type="text" name="C1" placeholder="Bunnies"/><br/>
		Choice B : <input type="text" name="C2" placeholder="Airplanes"/><br/>
		Choice C : <input type="text" name="C3" placeholder="Cats"/><br/>
		Choice D : <input type="text" name="C4" placeholder="Almonds"/> <br/>
		<br/>
		Correct Choice: 
				<select name="correct">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				</select>
		</center>
		<hr/>
	<center>
	Select the difficulty of this question : 
		<select name = "diff">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<br/>
	Name identifier : <input type = "text" name="Question_name" placeholder="ex: Recursion Theory "/>
	</center>
	
	<hr/>		

		<input style="float:right;" type="submit" name="MCsubmit" value="Create this Question"/>
	</form>	
<?php
	}
?>

<?php 
	if($type == "TF"){
?>
	<center> <b> <u> <p> Create a True or False</p> </b> </u> </center>
	<p> Type your true/false statement in the box below and then select the correct choice.
	<form name="TFFORM" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<textarea name="Q_desc" cols="70"></textarea>
			<hr/>
		<center>
			<p> The statement above is :-
			<select name="tf_ans">
				<option value="true">True</option>
				<option value="false">False</option>
			</select>
		<br/>
		Select the difficulty of this question : 
		<select name = "diff">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>			
		<br/>
		Name identifier : <input type = "text" name="Question_name" placeholder="ex: Object Oriented Concept "/>

		</center>
		<hr/>
		<input style="float:right;" type="submit" name="TFsubmit" value="Create this Question"/>
	</form>

<?php
	}
?>

<?php 
	if($type == "OE"){

?>
	<center> <font color = "green"> You are creating a open ended coding question in the java programming language. </center> </font>

	<p> * Code will be compiled as java code * </p>
	<form name="OEFORM" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" value="OE" name="type"/>
		Detailed Question Description: 
		<textarea rows="8" cols="70" name="Q_desc"></textarea>
		<hr/>
	Provide four testcases to test the written code.<br/>
	<center>
		Testcase 1 :- <input type="text" name="T1" placeholder="test case 1"/><br/>
		Testcase 2 :- <input type="text" name="T2" placeholder="test case 2"/><br/>
		Testcase 3 :- <input type="text" name="T3" placeholder="test case 3"/><br/>
		Testcase 4 :- <input type="text" name="T4" placeholder="test case 4"/>
	</center>
	<hr/>
		<center>
			Write any javacode below that you would like to provide the user with. If not leave 
			blank.
			<textarea rows="3" cols="70" name="Q_help_code"></textarea>
		</center>
	<hr/>
	<center>
	Select the difficulty of this question : 
		<select name = "diff">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<br/>
	Name identifier : <input type = "text" name="Question_name" placeholder="ex: Warmpup 1 "/>
	</center>
	
	<hr/>
	<center>

		<input style="float:right;" type="submit" name="OEsubmit" value="Add to Question Bank">

	</center>

	</form>


<?php
	}
?>

<?php 
	if($type == "FB"){
?>
	<center> <b> <u> <p> Create a Fill in the blank</p> </b> </u> </center>
	<p> Type your fill in the blank, and leave a * where you want the ____(blank) to appear. </p>
	<form name="FBFORM" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<textarea name="Q_desc" cols="70"></textarea>
			<hr/>
		<center>
			<p> The correct answer is :-
				<input type = "text" name="fb_ans" placeholder=""/>
		<br/>
		Select the difficulty of this question : 
		<select name = "diff">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>			
		<br/>
		Name identifier : <input type = "text" name="Question_name" placeholder="ex: Object Oriented Concept "/>

		</center>
		<hr/>
		<input style="float:right;" type="submit" name="FBsubmit" value="Create this Question"/>
	</form>

<?php
	}
?>

</p>

</div>



<?php


include 'footer.php';


?>