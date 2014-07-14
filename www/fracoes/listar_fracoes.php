<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }

	$title = "Listar Frações";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">

		<h2>Lista de Frações</h2>
		<br />
		
		<table class="table table table-hover">
		<tr>
			<th>Id</th>
			<th>Condómino</th>
			<th>Identificação Unica<br /> da Fração</th>
			<th>Permilagem</th>
			<th>Andar</th>
			<th>Tipo</th>
			<th>Observações</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php
		$result = mysqli_query($con,"SELECT a.idfrac, b.nome, a.iuf, a.permilagem, a.andar, a.tipo, a.observacoes
									FROM fracoes a, condominos b
									WHERE a.idcond = b.idcond;") or die("Error2: ".mysqli_error($con));
		
		
		while($row = mysqli_fetch_array($result))
		{
	  		echo "<tr>";
	  		echo "<td>" . $row['idfrac'] . "</td>";
			echo "<td>" . $row['nome'] . "</td>";
			echo "<td>" . $row['iuf'] . "</td>";
			echo "<td>" . $row['permilagem'] . "</td>";
			echo "<td>" . $row['andar'] . "</td>";
			echo "<td>" . $row['tipo'] . "</td>";
			echo "<td>" . $row['observacoes'] . "</td>";
			echo "<td><a href=alterar_fracao.php?id=" . $row['idfrac'] . ">Alterar</a></td>";
			echo "<td><a href=apagar_fracao.php?id=" . $row['idfrac'] . ">Apagar</a></td>";
		};
		?>
		
			</tr>
		</table>
		
	</div>

<?php 
	include "../footer.php";
?>