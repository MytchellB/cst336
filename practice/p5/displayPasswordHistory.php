<html>
	<head>
		<style>
			table {
				margin: 0 auto;
				width:700px;
				border: 1px solid black;
			}
			tr, td {
				border: 1px solid gray;
			}
			body {
				text-align: center;
				background-color: #FFE6F9;
			}
		</style>
		<?php
            include 'index.php';
            
            
        ?>

	</head>
	
	

<h1> Password History </h1>

<table>
<?php
echo $_GET['output'];
?>
</table>
<br />
<form action="index.php">
	<input type="submit" value="Generate more passwords">
</form>
</html>
