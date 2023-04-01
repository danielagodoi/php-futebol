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
			$equipa_1 = mysqli_real_escape_string($mysqli, $_POST['equipa_1']);
			$equipa_2 = mysqli_real_escape_string($mysqli, $_POST['equipa_2']);


			$gols_equipa_2 = mysqli_real_escape_string($mysqli, $_POST['gols_equipa_2']);

			// Check for empty fields
			if (empty($equipa_1) || empty($equipa_2)) {
				if (empty($equipa_1)) {
					echo "<br/><font color='red'>Campo nome da equipe 1 está vazio.</font><br/>";
				}

				if (empty($equipa_2)) {
					echo "<br/><font color='red'>Campo nome da equipe 2 está vazio.</font><br/>";
				}

				// Show link to the previous page
				echo "<br/><input type='button' onclick='location.href=`javascript:self.history.back()`;' value='Voltar' />";
			} else {
				$equipa_1_array = explode(',', $equipa_1);
				$equipa_2_array = explode(',', $equipa_2);

				$id_equipa_1 = $equipa_1_array[0];
				$name_equipa_1 = $equipa_1_array[1];
				$gols_equipa_1 = mysqli_real_escape_string($mysqli, $_POST['gols_equipa_1']);

				$id_equipa_2 = $equipa_2_array[0];
				$name_equipa_2 = $equipa_2_array[1];

				if ($id_equipa_1 == $id_equipa_2) {
					echo "<br/><font color='red'>Necessário escolher equipas diferentes.</font><br/>";
					// Show link to the previous page
					echo "<br/><input type='button' onclick='location.href=`javascript:self.history.back()`;' value='Voltar' />";
					return;
				}
				// If all the fields are filled (not empty) 
				// Insert data into database
				$result = mysqli_query($mysqli, "INSERT INTO jogos (`name_equipa_1` ,`gols_equipa_1`,`name_equipa_2` ,`gols_equipa_2`) VALUES ('$name_equipa_1', '$gols_equipa_1', '$name_equipa_2', '$gols_equipa_2')");

				if ($gols_equipa_1 > $gols_equipa_2) {
					mysqli_query($mysqli, "UPDATE equipas SET `pontuacao` = `pontuacao` + 3 WHERE `id` = $id_equipa_1");
				} else if ($gols_equipa_2 > $gols_equipa_1) {
					mysqli_query($mysqli, "UPDATE equipas SET `pontuacao` = `pontuacao` + 3 WHERE `id` = $id_equipa_2");
				} else {
					mysqli_query($mysqli, "UPDATE equipas SET `pontuacao` = `pontuacao` + 1 WHERE `id` = $id_equipa_1");
					mysqli_query($mysqli, "UPDATE equipas SET `pontuacao` = `pontuacao` + 1 WHERE `id` = $id_equipa_2");
				}

				// Redirect to the main display page (index.php in our case)
				header("Location:jogos.php");
			}
		}
		?>
	</div>
</body>

</html>