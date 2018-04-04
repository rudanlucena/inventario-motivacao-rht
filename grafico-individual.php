<!DOCTYPE html>
<html>
<head>
<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}
	$login = $_SESSION['login'];
?>	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript" src="js/Chart.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
<?php
	include("conexao.php");
   $respostas = $db->query("SELECT * from questionario where login = '$login'");
   if(mysqli_affected_rows($db) > 0){
      while ($resposta = $respostas->fetch_assoc()){
      	$fisiologicas = ($resposta['q1']) + ($resposta['q4']) + ($resposta['q16']) + ($resposta['q20']);
      	$seguranca = ($resposta['q2']) + ($resposta['q3']) + ($resposta['q9']) + ($resposta['q19']);
      	$participacao = ($resposta['q5']) + ($resposta['q7']) + ($resposta['q12']) + ($resposta['q15']);
      	$reconhecimento = ($resposta['q6']) + ($resposta['q8']) + ($resposta['q14']) + ($resposta['q17']);
      	$realizacao = ($resposta['q10']) + ($resposta['q11']) + ($resposta['q13']) + ($resposta['q18']); ?>  
          
		<?php         
       }
   	   $respostas->free(); 
	}
?>

<input type="hidden" value="<?=$fisiologicas?>" id="fisiologicas">
<input type="hidden" value="<?=$seguranca?>" id="seguranca">
<input type="hidden" value="<?=$participacao?>" id="participacao">
<input type="hidden" value="<?=$reconhecimento?>" id="reconhecimento">
<input type="hidden" value="<?=$realizacao?>" id="realizacao">

	<div align="center">
		<h2 align="center">Gráfico Indivudual</h2>
	</div><br><br>
	<canvas id="myChart" width="50%" height="15%"  style="background-color: white;"></canvas>
	<script>

		var fisiologicas =  $("#fisiologicas").val();
		var seguranca =  $("#seguranca").val();
		var participacao =  $("#participacao").val();
		var reconhecimento =  $("#reconhecimento").val();
		var realizacao =  $("#realizacao").val();

		console.log(fisiologicas);
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Básicas Fisiológicas", "Necessidades Segurança", "Necessidades Participação", "Auto-Reconhecimento", "Auto-Realização"],
				datasets: [{
					label: '# of Votes',
					data: [fisiologicas, seguranca, participacao, reconhecimento, realizacao],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<br><br>
	<div align="right">
		<a class="waves-effect waves-light btn" href="logout.php">Sair<i class="material-icons right">send</i></a>
	</div>
	
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>