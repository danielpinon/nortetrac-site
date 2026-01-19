<?php
#PROCESSAR METATAGS ==
$tituloSt = 'Nortetrac - Autorizada Autotrac';
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
    opacity: 0.3;
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

  </style>

  <section class="destaque">

    <div class="divImagmDestaque" style="background: url(./imagens/banner1.png);"></div>

    <div class="divInfo">
      <div>
        <h1>CONHEÇA A NORTETRAC, CONCESSIONÁRIA AUTORIZADA AUTOTRAC</h1>
      </div>
      <div>
        A Nortetrac faz parte da rede de concessionárias autorizadas da marca AUTOTRAC, sendo responsável pelo atendimento dos estados do Amazonas, Pará, Tocantins e agora também em Rondônia.
      </div>
    </div>

  </section>  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="margin-top: 0;">
      <div class="container" >

        <div class="row">
          <div class="col-lg-6 aos-init aos-animate" data-aos="zoom-in">
            <img src="./imagens/A1.png?rand=<?= uniqid();?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center aos-init aos-animate" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>Sobre a <span class="corAzul">Nortetrac</span> </h3>
              <p class="font-italic">
                
                A Nortetrac faz parte da rede de concessionárias autorizadas da marca AUTOTRAC, sendo responsável pelo atendimento dos estados do Amazonas, Pará, Tocantins e agora também em Rondônia.

              </p>

              <p>
                A concessionária é responsável pelos seguintes serviços:
              </p>

              <p>
                1) Venda de todos os produtos AUTOTRAC;
              </p>

              <p>
                2) Instalação dos equipamentos nos veículos, dispondo de oficina e equipe especializada de técnicos;
              </p>

              <p>
                3) Prestação de serviços de assistência técnica para manutenção e garantia dos equipamentos instalados nos veículos;
              </p>

              <p>
                4) Atendimento de pós-venda para auxiliar os clientes a utilizar todos os recursos dos produtos, a fim de obter o máximo de benefícios, maximizando o retorno do investimento de cada cliente.
              </p>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" style="display: none;">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item aos-init aos-animate" data-aos="fade-up">
                <a class="nav-link active show" data-bs-toggle="tab" href="https://bootstrapmade.com/demo/templates/Scaffold/#tab-1">
                  <h4>Modi sit est</h4>
                  <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                </a>
              </li>
              <li class="nav-item mt-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <a class="nav-link" data-bs-toggle="tab" href="https://bootstrapmade.com/demo/templates/Scaffold/#tab-2">
                  <h4>Unde praesentium sed</h4>
                  <p>Voluptas vel esse repudiandae quo excepturi.</p>
                </a>
              </li>
              <li class="nav-item mt-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <a class="nav-link" data-bs-toggle="tab" href="https://bootstrapmade.com/demo/templates/Scaffold/#tab-3">
                  <h4>Pariatur explicabo vel</h4>
                  <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                </a>
              </li>
              <li class="nav-item mt-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-bs-toggle="tab" href="https://bootstrapmade.com/demo/templates/Scaffold/#tab-4">
                  <h4>Nostrum qui quasi</h4>
                  <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 aos-init aos-animate" data-aos="zoom-in">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="./imagens/features-1.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="./imagens/features-2.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="./imagens/features-3.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-4">
                <figure>
                  <img src="./imagens/features-4.png" alt="" class="img-fluid">
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services One Section ======= -->
    <section id="diferenciais" class="services section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Diferenciais</h2>
          <p>Conheça mais sobre  nosso atendimento ao cliente, prestação de peças e serviços, equipe diferenciada e suporte técnico!</p>
        </div>

        <div class="row">
          

          <div class="col-md-6 col-lg-3-v2 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/suporte.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">ATENDIMENTO AO CLIENTE</a></h4>
                
                <p class="description">ATENDIMENTO COMERCIAL</p>
                <p class="description">SUPORTE E PÓS VENDAS</p>
                <p class="description">EQUIPE DE INSTALAÇÃO E ASSISTÊNCIA TÉCNICA</p>
                <p class="description">CONSULTORIA NA GESTÃO DE RASTREAMENTO</p>

              </div>
            </div>

          <div class="col-md-6 col-lg-3-v2 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/engine.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">PEÇAS ORIGINAIS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a></h4>
                
                <p class="description"> PEÇAS ORIGINAIS AUTOTRAC </p>
                <p class="description"> CONFIABILIDADE </p>
                <p class="description"> SEGURANÇA NO USO </p>
                <p class="description"> CONTROLE DE QUALIDADE </p>

              </div>
            </div>

            <div class="col-md-6 col-lg-3-v2 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/garantia.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">GARANTIA DE SERVIÇOS</a></h4>
                
                <p class="description">GARANTIA DE SERVIÇOS</p>
                <p class="description">GARANTIA DE PEÇAS</p>
                <p class="description">DISPONIBILIDADE DE AGENDA</p>
                <p class="description">SERVIÇO DE ATENDIMENTO EXTERNO (SAE)</p>

              </div>
            </div>

            <div class="col-md-6 col-lg-3-v2 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/equipe.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">EQUIPE ESPECIALIZADA</a></h4>
                
                <p class="description">TÉCNICOS CAPACITADOS</p>
                <p class="description">ATENDIMENTO EXCLUSIVO</p>
                <p class="description">ESTRUTURA PRÓPRIA</p>
                <p class="description">PONTOS DE APOIO</p>

              </div>
            </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Serviços</h2>
          <p>Conheça algumas de nossas soluções voltadas para o mercado de transporte, entre produtos e softwares especializados para a gestão frotas e economia de custos operacionais.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in">

            <div class="icon-box icon-box-pink">

              <div class="div-img">
                <img src="./imagens/1.png" />
              </div>

              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">TRANSPORTE DE LONGA DISTANCIA</a></h4>
              <p class="description">
              Voltado para empresas de transporte com atuação rodoviária e urbana. Com cobertura disponível durante toda a viagem, é também ideal para empresas com necessidade de intenso tráfego de dados e aplicações em gestão logística, gerenciamento de risco, telemetria e controle de jornada.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">

              <div class="div-img">
                <img src="./imagens/2.png" />
              </div>

              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">COLETA-ENTREGA E DISTRIBUIÇÃO URBANA</a></h4>
              <p class="description">Desenvolvido para atender empresas de transporte, distribuição, logística e prestação de serviços com atuação predominantemente urbana, o Autotrac Celular utiliza a rede de comunicação de dados GSM/GPRS.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              
              <div class="div-img">
                <img src="./imagens/3.png" />
              </div>

              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">LOCALIZADORES FIXOS E PORTATEIS</a></h4>
              <p class="description">O Autotrac Smartbox é um rastreador portátil destinado ao rastreamento de carga. Pequeno e discreto, ele pode ser inserido em qualquer tipo de carga e facilmente ocultado entre outras mercadorias.
</p>
            </div>
          </div>

        </div>

        <div class="row" style="margin-top: 40px;">

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-blue">
             
              <div class="div-img">
                <img src="./imagens/4.png" />
              </div>

              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">JORNADA DE TRABALHO DE MOTORISTAS</a></h4>
              <p class="description">Com o Supervisor Jornada Business além de controlar a jornada de trabalho com base nos parâmetros da legislação, é possível também controlar o tempo de direção contínua e medir a produtividade dos seus motoristas.

</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/5.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">TELEMETRIA - GESTÃO DE CONDUÇÃO DE VEÍCULOS</a></h4>
                <p class="description">Permite o controle eletrônico das condições de uso do veículo, colaborando para a redução dos custos de operação e manutenção, ajudando a prevenir acidentes. O Supervisor Telemetria emite relatórios sobre velocidade, RPM, freadas e acelerações bruscas, e outros importantes indicadores de performance da frota.
</p>
              </div>
            </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/6.png" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">CONTROLE LOGÍSTICO DE VEÍCULOS E CARGAS</a></h4>
                <p class="description">Conheça esta poderosa ferramenta de controle logístico, reduzindo seus gastos com os tempos de espera para carregamento e descarregamento evitando perdas, atrasos e garantindo a qualidade e satisfação de seu cliente.
</p>
              </div>
            </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Services One Section ======= -->
    <section id="services-one" class="services section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Soluções AUTOTRAC ONE</h2>
          <p>Mais tranquilidade para você e para sua família. Linha de rastreadores voltados para o seu dia-a-dia. Tudo o que você valoriza ficou mais seguro!</p>
        </div>

        <div class="row" style="margin-top: 40px;">
          

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/7.jpg" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">AUTOTRAC ONE MINI</a></h4>
                <p class="description">Com o rastreador portátil Autotrac Mini você monitora pessoas, objetos, equipamentos e o que mais você puder imaginar, de forma discreta, a partir de seu celular ou tablet, com alertas automáticos de localização, trajetos percorridos, excesso de velocidade e muito mais!</p>
              </div>
            </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/8.jpg" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">AUTOTRAC ONE CARRO</a></h4>
                <p class="description">Com o Autotrac One Carro você conecta seu automóvel com o seu celular ou tablet. Monitore a posição do seu carro em mapas digitais, receba alertas de excesso de velocidade e deslocamento não autorizado, fixe seu posição de parada e encontre seu carro com recursos de realidade aumentada.

</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box icon-box-blue">
                
                <div class="div-img">
                  <img src="./imagens/9.jpg" />
                </div>

                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="https://bootstrapmade.com/demo/templates/Scaffold/">AUTOTRAC ONE MOTO</a></h4>
                <p class="description">Com o Autotrac One Moto você pode monitorar sua motocicleta a partir de seu tablet, smartphone, ou computador. Ao estacionar, programe um alerta automático para seu celular em caso de movimento não autorizado e relaxe. Se preciso acione o Serviço de Pronta Resposta, disponível 24 horas por dia.

</p>
              </div>
            </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="display: none;"> 
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 891px;">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 380px; top: 0px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 760px; top: 0px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 297px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 380px; top: 297px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 760px; top: 297px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 594px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="position: absolute; left: 380px; top: 594px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="position: absolute; left: 760px; top: 594px;">
            <div class="portfolio-wrap">
              <img src="./imagens/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="./imagens/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta" style="display: none;">
      <div class="container">

        <div class="row aos-init aos-animate" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://bootstrapmade.com/demo/templates/Scaffold/#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials" style="display: none;">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper" id="swiper-wrapper-4262d1dbe2cd6e0c" aria-live="off" style="transform: translate3d(-1514.67px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="1 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="2 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="3 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div>

            <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group" aria-label="4 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" role="group" aria-label="5 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" role="group" aria-label="6 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="7 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide" data-swiper-slide-index="4" role="group" aria-label="8 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" role="group" aria-label="9 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" role="group" aria-label="10 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="11 / 11" style="width: 358.667px; margin-right: 20px;">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./imagens/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div></div>
          <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team" style="display: none;">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member aos-init aos-animate" data-aos="zoom-in">
              <div class="pic"><img src="./imagens/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-twitter"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-facebook"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-instagram"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="./imagens/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-twitter"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-facebook"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-instagram"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="./imagens/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-twitter"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-facebook"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-instagram"></i></a>
                  <a href="https://bootstrapmade.com/demo/templates/Scaffold/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients" style="display: none;">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Clientes</h2>
          <p>Veja alguns de nossos clientes.</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in">
              <img src="./imagens/client-1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <img src="./imagens/client-2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="150">
              <img src="./imagens/client-3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
              <img src="./imagens/client-4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="250">
              <img src="./imagens/client-5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <img src="./imagens/client-6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo aos-init aos-animate" data-aos="zoom-in" data-aos-delay="350">
              <img src="./imagens/client-7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
            <div class="client-logo">
              <img src="./imagens/client-8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg" style="display: none;">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box aos-init aos-animate" data-aos="zoom-in">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq" style="display: none;">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

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