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
		<h2>Adicione uma nova equipa</h2>
		<form action="addAction.php" method="post" name="add">
			<table width="25%" border="0">
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" onclick="location.href='index.php';" value="Voltar" />
						<input type="submit" name="submit" value="Adicionar equipa">
				</tr>
			</table>
		</form>
	</div>
</body>

</html>