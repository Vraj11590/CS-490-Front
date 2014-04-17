<html>
<head>
	<script src="jquery.js"> </script>

</head>

<body>
<br/>


<div style="margin:auto; border-bottom:1px solid black; width:600px;">
<?php 

		echo "<a href='home.php'> Home </a> &nbsp;&nbsp;";
		echo "<a href='home.php'> Recently Taken </a> &nbsp;&nbsp;";
		echo "<a href='show_questions.php'> All Questions </a> &nbsp;&nbsp;";
		echo "<a href='make_question.php'> Make Question </a> &nbsp;&nbsp;";
		echo "<a href='home.php'> Statistics </a> &nbsp;&nbsp;";

?>

<div style="float:right;">

		<a href="logout.php?s=<?php echo $_GET['session']; ?>"> Log Out </a>
</div>
</div>

