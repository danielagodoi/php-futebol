<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM equipas ORDER BY id DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM equipas ORDER BY id DESC");
?>

<html>

<head>
	<title>Adicione um novo jogo</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a href="index.php">Equipas</a>
		<a href="jogos.php">Jogos</a>
		<a href="classificacao.php">Classificação</a>
	</div>
	<div class="content">
		<h2>Adicione um novo jogo</h2>

		<form action="addJogoAction.php" method="post" name="add_jogo">
			<table>
				<tr>
					<td>Equipa 1</td>
					<td>
						<select name="equipa_1">
							<option value="">--- Escolha uma equipa ---</option>
							<?php
							while ($res = mysqli_fetch_assoc($result)) {
								$id = $res['id'];
								$name = $res['name'];
								$value = $id . "," . $name;
								echo "<option value=$value>$name</option>";
							}
							?>
						</select>
					</td>
					<td>Gols</td>
					<td>
						<input type="number" name="gols_equipa_1" min="0" value="0"
							oninput="validity.valid||(value='');">
					</td>
				</tr>
				<tr style="text-align: center;">
					<td></td>
					<td>X</td>
				</tr>
				<tr>
					<td>Equipa 2</td>
					<td>
						<select name="equipa_2">
							<option value="">--- Escolha uma equipa ---</option>
							<?php
							while ($res = mysqli_fetch_assoc($result2)) {
								$id = $res['id'];
								$name = $res['name'];
								$value = $id . "," . $name;
								echo "<option value=$value>$name</option>";
							}
							?>
						</select>
					</td>
					<td>Gols</td>
					<td>
						<input type="number" name="gols_equipa_2" min="0" value="0"
							oninput="validity.valid||(value='');">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<br>
						<input type="button" onclick="location.href='jogos.php';" value="Voltar" />
						<input type="submit" name="submit" value="Adicionar jogo">
				</tr>
			</table>
		</form>
	</div>
</body>

</html>