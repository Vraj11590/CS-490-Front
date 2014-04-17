<?php 
	include 'curl.php';
	include 'header.php';

	$questions = "nothing";
	$current_filter = "Newest First";
	$filter = "Default";

	//get default when page loads
	$all = pull_questions(array('flag'=>'Pull Questions', 'filter'=>$filter));
	$questions = json_decode($all);	 	

	if(isset($_POST['submit'])) 
	{ 
	    $filter = $_POST['filter'];
	    if($filter == 'Default'){
	    	$current_filter = "Newest First";
	    }
	    if($filter == 'HL'){
	    	$current_filter = "Highest to Lowest in Difficulty";
	    }
	    if($filter == 'MostIncorrect'){
	    	$current_filter = "Most students got these questions wrong!";
	    }
	    if($filter == 'MostCorrect'){
	    	$current_filter = "Most students got these questionss right!";
	    }
	    if($filter == 'OE'){
	    	$current_filter = "Open Ended / Coding";
	    }	    	    	    	    
	    if($filter == 'TF'){
	    	$current_filter = "True/False";
	    }	
	    if($filter == 'MC'){
	    	$current_filter = "Multiple Choice";
	    }	
	    if($filter == 'FB'){
	    	$current_filter = "Fill in the Blank";
	    }		    	    
		$all = pull_questions(array('flag'=>'Pull Questions', 'filter'=>$filter));
		$questions = json_decode($all);	    
	}


	?>


<div style="padding:10px; width:600px; margin:auto;">

	<div style="float:right;">
		<form name="filters" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select name="filter">

			<option value="Default"
			<?=$filter == 'Default' ? ' selected="selected"' : '';?>>
		    Default (Newest First)
		    </option>
			
			<option value="HL"
			<?=$filter == 'HL' ? ' selected="selected"' : '';?>>
		    Difficulty (High to Low)
		    </option>
			
			<option value="MostIncorrect"
			<?=$filter == 'MostIncorrect' ? ' selected="selected"' : '';?>>
			Most Unanswered / Failed
			</option>
			
			<option value="MostCorrect"
			<?=$filter == 'MostCorrect' ? ' selected="selected"' : '';?>>
			Most Answered / Correct
			</option>
			
			<option value="FB"
			<?=$filter == 'FB' ? ' selected="selected"' : '';?>>
  	     	Fill in the blank 
  	     	</option>
			
			<option value="MC"
			<?=$filter == 'MC' ? ' selected="selected"' : '';?>>
			Multiple Choice
			</option>
			<option value="TF"
			<?=$filter == 'TF' ? ' selected="selected"' : '';?>>
			True/False 
			</option>

			<option value="OE"
			<?=$filter == 'OE' ? ' selected="selected"' : '';?>>
			Open Ended / Coding
			</option>
		</select>
		<input type="submit" value="Filter!" name="submit"/>
	</form>

	</div>

	<div id="cart" style="float:left;">
		Quiz Cart: 0 items
	</div>

</div>


<div style="padding:10px; width:800px; margin:auto;">
	
	<p> Filter: &nbsp; <b> <?php echo $current_filter; ?> </b> </p>

	
	<?php 
			foreach ($questions as $key => $value) {
					echo $questions[$key]->Question." ";
					echo $questions[$key]->Difficulty." ";
					echo $questions[$key]->CreatedBy."<br/>";

			}
	?>


</div>
<script type="text/javascript">

	console.log("heelo");

	$( "#filter" ).change(function() {
		//update table upon filter

	});
</script>


<?php

	include 'footer.php';


?>

