<?php session_start(); ?>




<style>
.container { font-size: 0; }
.container div { display: inline-block;   background: #000000; font-size: 12px; }
.container div.a { width: 130px; background: #555555; }
.container div.b {  background: gray; }`
</style>

<div class="selector"> 

<p> Please select an open ended coding question to take.</p>
<select name="selectOE">
	<option value="A">A</option>
</select>


</div>


<div class="container">
	<?php if($_SESSION['desc'] != ""){ ?>

		<div style="width:600px;" class="question_viewer" id="question_viewer">

		 <center> <p> <b> <span style="background-color: #FFFF00;"> This is what the question will look like  </span> </b> </p> </center> 

		<p> <center>  <b> <?php if ( isset($_SESSION['desc']) )echo $_SESSION['desc']; else echo "question not set. in session."?> </b> </center> </p>

		<p> The code that you write below has to work for the provided test cases below :- </p>
		<center>

		<ul style="list-style-position: inside">
		<?php if($t1 != ""){ ?>	<li> <?php echo $_SESSION['t1']; ?> </li> <?php } ?>
		<?php if($t2 != ""){ ?>	<li> <?php echo $_SESSION['t2'];; ?> </li><?php } ?>
		<?php if($t3 != ""){ ?>	<li> <?php echo $_SESSION['t3'];; ?> </li><?php } ?>
		<?php if($t4 != ""){ ?>	<li> <?php echo $_SESSION['t4'];; ?> </li><?php } ?>
		</ul>

		</center>
		</div>
	<?php } ?>

	<div>space</div>
	<div class="b" name="question_taker">
		<form name="answered" id="OE_taker" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<textarea name="answerBox" cols="70" rows="9" 
			name="Q_desc"><?php if ( $_SESSION['submitted'] != ""){echo $_SESSION['submitted'];}else{echo $_SESSION['help'];}?></textarea>
			<input  type="submit" name="submitting" value="Test Code"/>
		</form>		
	</div>
	<div></div>
</div>