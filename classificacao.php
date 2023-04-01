<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM equipas ORDER BY pontuacao DESC");
?>

<html>

<head>
	<title>Classificacão</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a href="index.php">Equipas</a>
		<a href="jogos.php">Jogos</a>
		<a class="active" href="classificacao.php">Classificação</a>
	</div>
	<div class="content">
		<h2>Classificacão</h2>
		<table width='80%'>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Nome</strong></td>
				<td><strong>Pontuação</strong></td>
			</tr>
			<?php
			while ($res = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $res['name'] . "</td>";
				echo "<td>" . $res['pontuacao'] . "</td>";
			}
			?>
		</table>
	</div>
</body>

</html>