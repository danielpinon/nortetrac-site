<?php

#PROCESSAR CÓDIGO DE RECUPERAÇÃO DE SENHA ==
if(strlen($tipoConteudo) > 0){

  #CONEXAO COM O BANCO DE DADOS ==
  $conectBdEp = $classEp->conectBdEp();

  #VARIÁVEIS ==
  $dataAtualCalc = date("YmdHis");

  #COLETAR DADOS ==
  $codSn = strip_tags($tipoConteudo);

  #CONSULTAR DADOS ==
  $querySn = mysqli_query($conectBdEp, "SELECT * FROM usuariosCaRecSenhaSn WHERE codSn='$codSn'") or die(mysqli_error($conectBdEp));
  $rowSn = mysqli_fetch_assoc($querySn);
  $totalSn = mysqli_num_rows($querySn);

  if($totalSn > 0){

    $timeValidadeSn = $rowSn['timeValidadeSn'];
    $timeValidadeSnCalc = preg_replace('/[^\d]/', '', $timeValidadeSn);
    
    if($dataAtualCalc < $timeValidadeSnCalc){



    } else {
      $codSn = '';
    }

  } else {

    require_once "./includes/pagina_nao_encontrada.php";

    exit();

  }

} else {

  $codSn = '';

}


?>


<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recuperar Senha</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= $urlSite;?>/imagens/favicon.ico" rel="icon">
  
  <!-- Google Fonts -->
  <link href="<?= $urlSite;?>/css/css-1.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= $urlSite;?>/css/aos.css" rel="stylesheet">
  <link href="<?= $urlSite;?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $urlSite;?>/css/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $urlSite;?>/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $urlSite;?>/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= $urlSite;?>/css/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= $urlSite;?>/css/style.css" rel="stylesheet">

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

    .divErroEp {
      color: #f03c3c;
    }

  </style>

  <script type="text/javascript">



  </script>

  <!-- CONTENT
    ================================================== -->
    <section class="section-border border-primary boxLogin">
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
          <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">
            
            <!-- Heading -->
            <h1 class="mb-0 font-weight-bold text-center">
              Redefinir Senha
            </h1>

            <?php
            if(strlen($codSn) > 0){
            ?>

              <!-- Form -->
              <form class="mb-6" onsubmit="return false;">

                <input type="hidden" id="tpAcaoCa" value="salvar-nova-senha">
                <input type="hidden" id="codSn" value="<?php echo $codSn;?>">

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                  Informe e confirme a nova senha.
                </p>

                <!-- Email -->
                <div class="form-group">
                  <label for="email">
                    Senha
                  </label>
                  <input type="password" class="form-control" id="senhaLoginCa" onselectstart="return false;" onpaste="return false;" oncopy="return false;" oncut="return false;" ondrag="return false;" ondrop="return false;" autocomplete="off">
                  <div class="divErroEp" id="senhaLoginCaErro"></div>
                </div>

                <!-- Email -->
                <div class="form-group">
                  <label for="email">
                    Confirmar Senha
                  </label>
                  <input type="password" class="form-control" id="senhaLoginCaConfirm" onselectstart="return false;" onpaste="return false;" oncopy="return false;" oncut="return false;" ondrag="return false;" ondrop="return false;" autocomplete="off">
                  <div class="divErroEp" id="senhaLoginCaConfirmErro"></div>
                </div>

                <!-- Submit -->
                <button class="btn btn-block btn-primary" type="submit" id="bntRecuperarSenhaCa" onclick="redefinirSenha();">
                  Salvar Senha
                </button>

              </form>

            <?php
            } else {
            ?>

              <!-- Text -->
              <p class="mb-6 text-center text-muted">
                Insira seu e-mail para redefinir sua senha.
              </p>

              <!-- Form -->
              <form class="mb-6" onsubmit="return false;">

                <input type="hidden" id="tpAcaoCa" value="solicitacao">

                <!-- Email -->
                <div class="form-group">
                  <label for="email">
                    E-mail
                  </label>
                  <input type="email" class="form-control" id="emailLoginEp" placeholder="Informe seu email de login" value="renato@nortetrac.com.br">
                  <div class="div_erro_ep" id="resultadoStsCa"></div>
                </div>

                <!-- Submit -->
                <button class="btn btn-block btn-primary" type="submit" id="bntRecuperarSenhaCa" onclick="redefinirSenha();">
                  Redefinir Senha
                </button>

              </form>

            <?php
            }
            ?>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center text-muted">
              Lembra Da Senha? <a href="<?= $urlSite;?>/login">Fazer Login</a>.
            </p>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

  <?php require_once "./includes/rodape.php";?>

  <a href="<?= $urlSite;?>/#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require_once "./includes/js.php";?>

  <script type="text/javascript">
      
    /* REDEFINIR SENHA == */
    function redefinirSenha(){

      /* PROCESSAR STATUS == */
      if(!window.stsRedefinirSenha){
        stsRedefinirSenha = 1;
      } else if(stsRedefinirSenha == 1){
        return false;
      } else {
        stsRedefinirSenha = 1;
      }

      /* COLETAR DADOS == */
      var tpAcaoCa = $('#tpAcaoCa').val();

      if(tpAcaoCa == 'solicitacao'){

        /* SOLICITAÇÃO == */

        var emailLoginEp = $('#emailLoginEp').val();

        /* VALIDAR E-MAIL DE LOGIN == */
        if(emailLoginEp.length < 5){
          stsRedefinirSenha = 0;
          $('#resultadoStsCa').html('E-mail inválido');
          return false;
        }

        /* PROCESSAR VARIÁVEIS == */
        var urlPostEp = document.location.origin+'/ajax/loginRedefinirSenha.php';
        var rand = classEp.gerarId();

        $('#resultadoStsCa').html('');
        $('#emailLoginEp').attr('disabled', true);
        $('#bntRecuperarSenhaCa').html('Processar Dados...');
        $('#bntRecuperarSenhaCa').attr('disabled', true);

        $.post(urlPostEp, {
          rand:rand,
          tpAcaoCa:tpAcaoCa,
          emailLoginEp:emailLoginEp
        }, function(json){

          console.log(json);

          var json_ca = eval('('+json+')');

          if(typeof json_ca.total_ca != undefined){

            var total_ca = json_ca.total_ca;
            
            if(total_ca == 0){

              stsRedefinirSenha = 0;

              $('#resultadoStsCa').html('E-mail de login não encontrado!');
              $('#bntRecuperarSenhaCa').html('Redefinir Senha');
              $('#emailLoginEp').attr('disabled', false);
              $('#bntRecuperarSenhaCa').attr({'disabled':false});

            } else {

              $('#bntRecuperarSenhaCa').html('Link enviado por email');

            }

          } else {

            stsRedefinirSenha = 0;

            $('#bntRecuperarSenhaCa').html('Redefinir Senha');
            $('#bntRecuperarSenhaCa').attr({'disabled':false});

          }

        }).fail(function(info){
          console.log(info);
        });

      } else {

        /* COLETANDO DADOS == */
        var codSn = $('#codSn').val();
        var senhaLoginCa = $('#senhaLoginCa').val();
        var senhaLoginCaConfirm = $('#senhaLoginCaConfirm').val();

        /* VALIDAR CAMPOS == */
        var qntErrosEp = 0;
        $('#senhaLoginCaErro, #senhaLoginCaConfirmErro').html('');

        if(senhaLoginCa.length < 6){
          qntErrosEp++;
          $('#senhaLoginCaErro').html('A senha deve ter no mínimo 6 caracteres');
        }
        
        if(senhaLoginCa != senhaLoginCaConfirm){
          qntErrosEp++;
          $('#senhaLoginCaConfirmErro').html('As senhas não são iguais');
        }

        if(qntErrosEp > 0){
          stsRedefinirSenha = 0;
          return false;
        }

        /* SALVAR NOVA SENHA == */
        var urlPostEp = document.location.origin+'/ajax/loginRedefinirSenha.php';
        var rand = classEp.gerarId();

        $('#bntRecuperarSenhaCa').html('Processar Dados...');
        $('#bntRecuperarSenhaCa, #senha_login_ca, #senha_login_ca_confirm').attr('disabled', true);

        $.post(urlPostEp, {
          rand:rand,
          codSn:codSn,
          tpAcaoCa:tpAcaoCa,
          senhaLoginCa:senhaLoginCa,
          senhaLoginCaConfirm:senhaLoginCaConfirm
        }, function(json){

          console.log(json);

          stsRedefinirSenha = 0;

          $('#bntRecuperarSenhaCa').html('Senha alterada com sucesso!!!');

        }).fail(function(info){
          console.log(info);
        });

      }

    }

    </script>

<div id="icpbravoaccess_loaded"></div></body></html>