<html>

<head>
	<title>Editar Equipa</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a href="index.php">Equipas</a>
		<a href="jogos.php">Jogos</a>
		<a href="classificacao.php">Classificação</a>
	</div>
	<?php
	// Include the database connection file
	require_once("dbConnection.php");

	if (isset($_POST['update'])) {
		// Escape special characters in a string for use in an SQL statement
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);

		// Check for empty fields
		if (empty($name)) {
			if (empty($name)) {
				echo "<br/><font color='red'>Campo nome está vazio.</font><br/>";
				// Show link to the previous page
				echo "<br/><input type='button' onclick='location.href=`javascript:self.history.back()`;' value='Voltar' />";
			}
		} else {
			// Update the database table
			$result = mysqli_query($mysqli, "UPDATE equipas SET `name` = '$name' WHERE `id` = $id");

			// Redirect to the main display page (index.php in our case)
			header("Location:index.php");
		}
	}
	?>
</body>

</html>