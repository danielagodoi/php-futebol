<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM jogos ORDER BY id DESC");
?>

<html>

<head>
	<title>Jogos</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a href="index.php">Equipas</a>
		<a class="active" href="jogos.php">Jogos</a>
		<a href="classificacao.php">Classificação</a>
	</div>
	<div class="content">

		<h2>Jogos</h2>
		<p>
			<a href="add_jogo.php">Adicione um novo jogo</a>
		</p>
		<table width='80%'>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Equipa</strong></td>
				<td>Gols</td>
				<td>X</td>
				<td>Gols</td>
				<td><strong>Equipa</strong></td>
			</tr>
			<?php
			// Fetch the next row of a result set as an associative array
			while ($res = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $res['name_equipa_1'] . "</td>";
				echo "<td>" . $res['gols_equipa_1'] . "</td>";
				echo "<td>X</td>";
				echo "<td>" . $res['gols_equipa_2'] . "</td>";
				echo "<td>" . $res['name_equipa_2'] . "</td>";
			}
			?>
		</table>
	</div>
</body>

</html>