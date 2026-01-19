<?php
#PROCESSAR METATAGS ==
$tituloSt = 'Nortetrac Tacógrafos';
$descricaoSt = 'A Nortetrac faz parte da rede de concessionárias autorizadas da marca AUTOTRAC, sendo responsável pelo atendimento dos estados do Amazonas, Pará, Tocantins e agora também em Rondônia.';
$palavrasChaveSt = 'autotrac, nortetrac, monitoramento, Belém, Pará, Amazonas';
$autorSt = '';
$ogSiteNameSt = $tituloSt;
$ogTituloSt = $tituloSt;
$ogDescricaoSt = $descricaoSt;
$ogNocacheSt = '';
$ogUrlImageSt = '';
$array = array(
  'tituloSt'=>$tituloSt, 
  'descricaoSt'=>$descricaoSt, 
  'palavrasChaveSt'=>$palavrasChaveSt, 
  'autorSt'=>$autorSt, 
  'ogSiteNameSt'=>$ogSiteNameSt, 
  'ogTituloSt'=>$ogTituloSt, 
  'ogDescricaoSt'=>$ogDescricaoSt, 
  'ogNocacheSt'=>$ogNocacheSt, 
  'ogUrlImageSt'=>$ogUrlImageSt
);

$metatags = $classEp->gerarMetatagsEp($array);

?>

<!DOCTYPE html>

<html >

<?php
require_once "./includes/head.php";
?>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">

  <?php require_once "./includes/header.php";?>

  <style>
  .destaque{
    background: #404e56;
    height: 580px;
    display: flex;
    align-items: center;
    padding-bottom: 0;
    position: relative;
  }

  .destaque .divImagmDestaque{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
  }

  .destaque .divInfo{
    text-align: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    max-width: 900px;
  }

  .destaque .divInfo div{
    color: #FFF;
  }

  .destaque .divInfo div h1{

  }

  .destaque .divTacogrado{
    text-align: center;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    max-width: 600px;
    background: #538cc4;
    border-radius: 5px;
  }

  .destaque .divTacogrado img{
    width: 100%;
  }

  .divServicos{
    display: flex;
    margin: 20px 0;
  }

  .divServicos .item{
    flex: 1;
    text-align: center;
    font-weight: bold;
    padding: 20px;
    border: 1px solid #CCC;
    margin: 0 15px;
    border-radius: 5px;
    background: #538cc4;
    color: #FFF;
  }

  @media only screen and (max-width: 680px) {

    .destaque{
      height: 220px;
      margin: 70px 0 0;
    }

    .destaque .divImagmDestaque{
      background-size: 208% !important;
    }

    .destaque .divTacogrado{
      width: 65%;
      margin-top: -50px;
    }

    .destaque .divTacogrado img{

    }

    .divServicos{
      flex-direction: column;
      margin: 0;
    }

    .divServicos .item{
      margin: 10px 0;
    }

  }

  </style>

  <section class="destaque">

    <div class="divImagmDestaque" style="background: url(./imagens/banners/2.png);"></div>

    <div class="divTacogrado">
      <img src="./imagens/logo-tacografo.png">
    </div>

  </section>  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="margin-top: 0;">
      <div class="container" >

        <div class="row">
          <div class="col-lg-6 aos-init aos-animate" data-aos="zoom-in">
            <img src="./imagens/A1.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center aos-init aos-animate" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3 style="display: none;">Sobre a <span class="corAzul">Nortetrac</span> </h3>
              <p class="font-italic">
                
                A Nortetrac Tacógrafos é um posto de ensaios metrológicos de cronotacógrafos creditado INMETRO.

              </p>

              <p>
                Realizamos ensaios em todos os modelos de cronotacográfos para que você possa rodar com o certificado em dia.
              </p>

              <p>
                Possuímos ampla estrutura para atender todos os modelos de ônibus e caminhões.
              </p>

              <p>
                O tacógrafo é o instrumento responsável por registrar e indicar simultaneamente a velocidade e a distância percorrida pelo veículo, contribuindo com parâmetros, como: horas de trabalho, período de direção e parada.

              </p>

              <p>
                Este procedimento é obrigatório e deve ser realizado por empresas credenciadas pelo INMETRO.
              </p>

              <p>
                Pensando sempre na segurança e qualidade dos nossos serviços, a Nortetrac Tacógrafos é credenciada ao INMETRO. 
              </p>

              <p>
                Aqui nós possuímos o simulador de pista para ensaio, garantindo pra você mais comodidade e agilidade no processo.
              </p>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Serviços</h2>
          <p style="display: none;">Conheça algumas de nossas soluções voltadas para o mercado de transporte, entre produtos e softwares especializados para a gestão frotas e economia de custos operacionais.</p>
        </div>

        <div class="divServicos">

          <div class="item">
            Selagem dos Cronotacógrafos
          </div>

          <div class="item">
            Ensaio Metrológico de Cronotacógrafos
          </div>

          <div class="item">
            Consertos e Vendas de Cronotacógrafos
          </div>

          <div class="item">
            Calibração, aferição e alinhamento de agulhas
          </div>
          
        </div>

        <div class="divServicos">

          <div class="item">
            Sensores de velocidade, Cabos, Chicotes
          </div>

          <div class="item">
            Leituras de disco diagrama e laudos técnicos
          </div>

          <div class="item">
            Conserto de painel de instrumentos
          </div>

          <div class="item">
            Emissão do certificado do INMETRO
          </div>

        </div>

      </div>
        
    </section><!-- End Services Section -->

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Fale Conosco</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localização:</h4>
                <p>ROD BR 316 Nº 2938, CEP: 67200-000, <br> MARITUBA-PA</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>contato@nortetrac.com.br</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefone:</h4>
                <p>(91) 3366-1000</p>
              </div>

              <noscript>
                <iframe src="./embed.html" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen=""></iframe>
              </noscript>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-left">
            <form method="post" role="form" class="php-email-form" onsubmit="return false;">

              <div class="form-group mt-3">
                <label for="name">Seu nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
                <div id="nome_erro" class="corErro"></div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Telefone</label>
                  <input type="text" name="telefone" class="form-control" id="telefone" >
                  <div id="telefone_erro" class="corErro"></div>
                </div>

                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Seu e-mail</label>
                  <input type="email" class="form-control" name="email" id="email" >
                  <div id="email_erro" class="corErro"></div>
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="name">Assunto</label>
                <input type="text" class="form-control" name="assunto" id="assunto" >
                <div id="assunto_erro" class="corErro"></div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Mensagem</label>
                <textarea class="form-control" name="mensagem" id="mensagem" rows="10"></textarea>
                <div id="mensagem_erro" class="corErro"></div>
              </div>
              <div class="my-3" style="display: none;">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" onclick="enviaMensagemEp()" id="bntEnviarMensagem">Enviar Mensagem</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once "./includes/rodape.php";?>

  <a href="<?= $urlSite;?>/#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require_once "./includes/js.php";?>

<div id="icpbravoaccess_loaded"></div></body></html>