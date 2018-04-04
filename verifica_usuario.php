
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <?php
                            // session_start inicia a sessão
  session_start();
  include("conexao.php"); 

  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $result = mysqli_query($db, "SELECT * FROM funcionario where login='$login' and senha='$senha'");
  if(mysqli_affected_rows($db) == 1){ 
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
                                                //Header("location:../partida/listar_rodadas.php");
    if($login == "admin")
        echo "<script>location.href='grafico-geral.php';</script>";

    $result = mysqli_query($db, "SELECT * FROM questionario where login='$login'");
    if(mysqli_affected_rows($db) == 1)  
        echo "<script>location.href='questionario_computado.html';</script>";                                                                

    echo "<script>location.href='questionario.html';</script>";                                                             
}
else{
   echo '<div class="alert alert-danger"><br><br><br>
   <strong>Error!</strong> Não foi possivel efetuar o login.
   <a href="index.html"><button type="button" class="btn btn-danger">ok</button>
   </div>';
   unset ($_SESSION['login']);
   unset ($_SESSION['senha']);                             
}

mysqli_close($db);
?>  
</body>
</html>