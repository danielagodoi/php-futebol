<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM equipas WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
// $age = $resultData['age'];
// $email = $resultData['email'];
?>
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
	<h2>Editar Equipa</h2>

	<form name="edit" method="post" action="editAction.php">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td>
					<br>
					<input type="button" onclick="location.href='index.php';" value="Voltar" />
					<input type="submit" name="update" value="Editar equipa">
				</td>
			</tr>
		</table>
	</form>
</body>

</html>