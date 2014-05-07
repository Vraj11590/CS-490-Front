<?php 
	session_start();

	if($_SESSION['token']){
		echo "redirect";
	}
?>

<html>

	<center>

	 <h1> Welcome to Coding Cat </h1> 

	 <p> The source of your java source </p>

	</center>
 

	<div style="padding-top:10px;padding-left:30px;margin:auto;border:1px solid black; width:250px; ">
			<center><font color="red">
			<?php 
				if(isset($_GET['message'])){
					echo $_GET['message'];
				}

			?>
			</font>
			</center>
		<form method="POST" name="login_form" id="login_form" action="login.php">

			User: <input type="text" name="ucid" id="ucid" required>
			<br/>
			Pass: <input type="password" name="pass" id="pass" required>
			<br/>			<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;
			<input type="submit"/>

		</form>
			<a href="about.php"> About </a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;
			<a href="about.php"> Sign Up </a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;


	</div>

	<div style="margin:auto; ">


	</div>


</html>
