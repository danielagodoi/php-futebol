<html>

<head>
	<title>Adicione uma nova equipa</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a href="index.php">Equipas</a>
		<a href="jogos.php">Jogos</a>
		<a href="classificacao.php">Classificação</a>
	</div>

	<div class="content">
		<?php
		// Include the database connection file
		require_once("dbConnection.php");

		if (isset($_POST['submit'])) {
			// Escape special characters in string for use in SQL statement	
			$name = mysqli_real_escape_string($mysqli, $_POST['name']);

			// Check for empty fields
			if (empty($name)) {
				if (empty($name)) {
					echo "<br/><font color='red'>Campo nome está vazio.</font><br/>";
				}

				// Show link to the previous page
				echo "<br/><input type='button' onclick='location.href=`javascript:self.history.back()`;' value='Voltar' />";
			} else {
				// If all the fields are filled (not empty) 
		
				// Insert data into database
				$result = mysqli_query($mysqli, "INSERT INTO equipas (`name`, `pontuacao`) VALUES ('$name', 0)");

				// Redirect to the main display page (index.php in our case)
				header("Location:index.php");
			}
		}
		?>
	</div>
</body>

</html>