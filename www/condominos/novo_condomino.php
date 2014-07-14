<?php
	session_start();
	//Validação da sessão
	if(!isset($_SESSION["login"]) or !$_SESSION["login"]){ header("Location: ../index.php"); }
	
	$title = "Novo Condomino";
	include "../header.php";
	
	//Estabelecimento da ligação à base de dados
	$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)
	or die("Error1: ".mysqli_error($con));
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//Validação do formulário sobre os campos vazios
	if(isset($_POST['submit']))
	{
		if(!isset($_POST["nome"])){
		}elseif(!isset($_POST["cc"])){
		}elseif(!isset($_POST["morada"])){
		}elseif(!isset($_POST["telefone"])){
		}elseif(!isset($_POST["email"])){
			$novocondo = new Condominos($_POST["nome"], $_POST["cc"], $_POST["morada"], $_POST["tele"], $_POST["email"]);
		}else{
			echo "<div class='error_message'>Faltam campos por preencher</div>";
		}
	}
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">

	<h2>Inserir Condómino</h2>
	<br />
	
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
			
				<form method="post">
				  <div class="form-group">
				    <label for="nomecondo">Nome do condómino</label>
				    <input type="text" class="form-control" placeholder="Nome" name="nome" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="cccondo">Cartão de cidadão</label>
				    <input type="text" class="form-control" placeholder="CC" name="cc" maxlength="8">
				  </div>
				  
				 <div class="form-group">
				    <label for="moradacondo">Morada do condómino</label>
				    <input type="text" class="form-control" placeholder="Morada" name="morada" maxlength="45">
				  </div>
				  
				  <div class="form-group">
				    <label for="telecondo">Telefone</label>
				    <input type="text" class="form-control" placeholder="Telefone" name="telefone" maxlength="9">
				  </div>
				  
				   <div class="form-group">
				    <label for="emailcondo">E-mail</label>
				    <input type="email" class="form-control" placeholder="E-mail" name="email" maxlength="50">
				  </div>
				  
				  <br />
				  <button type="submit" name="submit" class="btn btn-default">Inserir</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
<!-- /container -->

<?php
	mysqli_close($con);
	include "../footer.php";
?>