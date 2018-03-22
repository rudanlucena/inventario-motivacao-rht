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
            $logado = $_SESSION['login'];
      ?>
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

                        <?php    
                           if(session_destroy()){
                              echo "<script>location.href='index.html';</script>";    
                           }
                        ?> 
                         
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>




