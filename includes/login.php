<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= $urlSite;?>/imagens/favicon.ico" rel="icon">
  
  <!-- Google Fonts -->
  <link href="./css/css-1.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./css/aos.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/bootstrap-icons.css" rel="stylesheet">
  <link href="./css/boxicons.min.css" rel="stylesheet">
  <link href="./css/glightbox.min.css" rel="stylesheet">
  <link href="./css/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold - v4.0.1
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">

  <?php require_once "./includes/header.php";?>

  <style type="text/css">
    
    .boxLogin{
      padding: 0 !important;
    }

    .boxLogin .mb-5{
      margin-bottom: 1rem !important;
    }

    .boxLogin .mb-6, .boxLogin .my-6 {
        margin-bottom: 2rem!important;
    }

    .boxLogin .form-group{
      margin-bottom: 1rem;
    }

    .boxLogin .form-group label{
      display: inline-block;
      margin-bottom: .5rem;
    }

    .boxLogin .form-control{
      padding: 10px 13px;
    }

    .boxLogin .btn-block{
      display: block;
      width: 100%;
    }

  </style>

  <script type="text/javascript">
    
    /* FAZER LOGIN == */
    function loginEp(){

      /* COLETANDO DADOS == */
      var emailLoginEp = $('#formLoginEp #emailLoginEp').val();
      var senhaLoginEp = $('#formLoginEp #senhaLoginEp').val();

      var urlEp = window.location.origin+'/scripts/login.php';

      document.getElementById('formLoginEp').action = urlEp;
      document.getElementById('formLoginEp').method = 'post';
      document.getElementById('formLoginEp').target = 'win';
      document.getElementById('formLoginEp').submit();

      $('#emailLoginEp, #senhaLoginEp, button').attr({'disabled':true});
      $('button').html('Fazendo Login...');

    }

    /* LOGIN OK == */
    function loginOkEp(){

      window.location.href = '<?= $urlApp;?>';

    }

    /* LOGIN ERRO == */
    function loginErroEp(){

      alert('Login ou Senha incorreto.');

      $('#emailLoginEp, #senhaLoginEp, button').attr({'disabled':false});
      $('button').html('Login');

    }

  </script>

  <!-- CONTENT
    ================================================== -->
    <section class="section-border border-primary boxLogin">
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
          <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">
            
            <!-- Heading -->
            <h1 class="mb-0 font-weight-bold text-center">
              Área do Cliente
            </h1>

            <!-- Text -->
            <p class="mb-6 text-center text-muted">
              Informe seu E-mail e Senha.
            </p>

            <!-- Form -->
            <form class="mb-6" id="formLoginEp" onsubmit="return false;">

              <!-- Email -->
              <div class="form-group">
                <label for="email">
                  E-mail
                </label>
                <input type="email" class="form-control" name="emailLoginEp" id="emailLoginEp" placeholder="Seu E-mail">
              </div>

              <!-- Password -->
              <div class="form-group mb-5">
                <label for="password">
                  Senha
                </label>
                <input type="password" class="form-control" name="senhaLoginEp" id="senhaLoginEp" placeholder="Sua Senha">
              </div>

              <!-- Submit -->
              <button class="btn btn-block btn-primary" type="submit" onclick="loginEp()">
                Login
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center text-muted">
              <a href="<?php echo $urlSite?>/recuperar-senha">Esqueceu a senha?</a>
            </p>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center text-muted" style="display: none;">
              Não tem uma conta ainda <a href="<?php echo $urlSite?>/planos">Cadastre-se</a>.
            </p>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

  <?php require_once "./includes/rodape.php";?>

  <a href="<?= $urlSite;?>/#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require_once "./includes/js.php";?>

<div id="icpbravoaccess_loaded"></div></body></html>