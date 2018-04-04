<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

	<?php

	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}
	$login = $_SESSION['login'];
	
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
	$q8 = $_POST['q8'];
	$q9 = $_POST['q9'];
	$q10 = $_POST['q10'];
	$q11 = $_POST['q11'];
	$q12 = $_POST['q12'];
	$q13 = $_POST['q13'];
	$q14 = $_POST['q14'];
	$q15 = $_POST['q15'];
	$q16 = $_POST['q16'];
	$q17 = $_POST['q17'];
	$q18 = $_POST['q18'];
	$q19 = $_POST['q19'];
	$q20 = $_POST['q20'];

	include("conexao.php");
                                                                                                                                                                   
    $sql ="INSERT INTO questionario (login, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20) 
    values ('$login', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20')"; 
                         
    $result = mysqli_query( $db, $sql);
    if(!$result){?>
        <div class="alert alert-danger"><br><br><br>
            <strong>Error!</strong> não foi possivel registrar suas respostas
            <a href="questionario.html"><button type="button" class="btn btn-danger">ok</button>
        </div><?php
    }
   else{?>              
        <div class="alert alert-success"><br><br><br>
              <strong>Success!</strong> Obrigado pela participação.
              <a href="grafico-individual.php">
              <button type="button" class="btn btn-primary">ok</button>
        </div><?php
   }

?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
