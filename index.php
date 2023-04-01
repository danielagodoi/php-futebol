<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM equipas ORDER BY id DESC");
?>

<html>

<head>
	<title>Equipas</title>
	<link href="assets/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="topnav">
		<a class="active" href="index.php">Equipas</a>
		<a href="jogos.php">Jogos</a>
		<a href="classificacao.php">Classificação</a>
	</div>
	<div class="content">

		<h2>Equipas</h2>
		<p>
			<a href="add.php">Adicione uma nova equipa</a>
		</p>
		<table width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Nome</strong></td>
			</tr>
			<?php
			// Fetch the next row of a result set as an associative array
			while ($res = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $res['name'] . "</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a>";
			}
			?>
		</table>
	</div>
</body>

</html>