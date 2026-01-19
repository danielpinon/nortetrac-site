<?php

if(strlen($tipoConteudo) > 0){

  #CONEXÃO COM O BANCO DE DADOS ==
  $conectBdEp = $classEp->conectBdEp();

  #COLETANDO DADOS ==
  $codDt = $tipoConteudo;

  #CONSULTAR DADOS ==
  $queryDt = mysqli_query($conectBdEp, "
    SELECT * FROM 
      diatDtTacog 
    WHERE 
      codDt='$codDt' AND
      excluidoDt=0
  ") or die(mysqli_error($conectBdEp));
  $rowDt = mysqli_fetch_assoc($queryDt);
  $totalDt = mysqli_num_rows($queryDt);

  if($totalDt > 0){

    $idDt = $rowDt['idDt'];
    $codDt = $rowDt['codDt'];
    $codDtDt = str_pad($idDt, 6, '0', STR_PAD_LEFT);
    $codCaUsuAvATVDt = $rowDt['codCaUsuAvATVDt'];
    $clienteDt = $rowDt['clienteDt'];

    #APLICAR DADOS ==
    $jsonDt['idDt'] = $idDt;
    $jsonDt['codDt'] = $codDt;
    $jsonDt['codDtDt'] = $codDtDt;
    $jsonDt['codCaUsuAvATVDt'] = $codCaUsuAvATVDt;
    $jsonDt['clienteDt'] = $clienteDt;

    #ARQUIVOS ANEXADOS AO DIAT ==
    $queryAq = mysqli_query($conectBdEp, "
      SELECT * FROM 
        diatDtTacogAq 
      WHERE 
        codDtAq='$codDt' AND
        tempAq=0 AND
        excluidoAq=0
    ") or die(mysqli_error($conectBdEp));
    $rowAq = mysqli_fetch_assoc($queryAq);
    $totalAq = mysqli_num_rows($queryAq);

    $jsonDt['fotosVideos']['totalAq'] = $totalAq;
    $jsonDt['fotosVideos']['loopAq'] = array();

    if($totalAq > 0){

      do{

        $codAq = $rowAq['codAq'];
        $codDtAq = $rowAq['codDtAq'];
        $tipoAq = $rowAq['tipoAq'];
        $tpContAq = $rowAq['tpContAq'];
        $codDtAq = $rowAq['codDtAq'];
        $nomeAq = utf8_encode($rowAq['nomeAq']);
        $arqAq = $rowAq['arqAq'];
        $tpArqAq = $rowAq['tpArqAq'];
        $tamanhoAq = $rowAq['tamanhoAq'];

        $arrayLpAq = array(
          'codAq'=>$codAq,
          'codDtAq'=>$codDtAq,
          'tipoAq'=>$tipoAq,
          'codDtAq'=>$codDtAq,
          'nomeAq'=>$nomeAq,
          'arqAq'=>$arqAq,
          'tpArqAq'=>$tpArqAq,
          'tamanhoAq'=>$tamanhoAq
        );

        if($tpContAq == 'ATV'){
          array_push(
            $jsonDt['fotosVideos']['loopAq'],
            $arrayLpAq  
          );
        }

      }while($rowAq = mysqli_fetch_assoc($queryAq));

    }

  }

}

$codDtDt = $jsonDt['codDtDt'];
$arquivosATVDt = $jsonDt['fotosVideos'];
$totalAq = $arquivosATVDt['totalAq'];
$loopAq = $arquivosATVDt['loopAq'];

#PROCESSAR METATAGS ==
$tituloSt = 'Nortetrac Tacógrafo';
$descricaoSt = '';
$palavrasChaveSt = '';
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

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          
          <h2>Serviços</h2>

          <p>
            <strong>CÓDIGO ATV</strong>
          </p>
          <h1><?= $codDtDt;?></h1>

          <div>
            <div><strong>Cliente:</strong> <?= $clienteDt;?></div>
          </div>

          <div>
            <a href="<?= $urlSite;?>/diat-atv-download/<?= $codDt;?>" target="_blank"><strong>VISUALIZAR DOCUMENTO ATV</strong></a>
          </div>

          <p style="display: none;">Conheça algumas de nossas soluções voltadas para o mercado de transporte, entre produtos e softwares especializados para a gestão frotas e economia de custos operacionais.</p>


          <div class="row" style="margin-top: 40px;">
            
          <?php 
          foreach($loopAq as $rowAq){

            $arqAq = $rowAq['arqAq'];
            $srcAq = $classEp->urlFilesApp.'/driveEp/'.$arqAq;

            if(preg_match('(.png|.PNG|.gif|.GIF|.jpg|.JPG|.jpeg|.JPEG)', $arqAq)){

              $imgAq = '<img src="'.$srcAq.'" />';

          ?>

              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">

                <div class="icon-box icon-box-blue">

                  <div class="div-img">
                    <?= $imgAq;?>
                  </div>

                </div>

              </div>

            <?php 
            } else {

              $srcAq = $classEp->urlFilesApp.'/driveEp/'.$arqAq;

              $videoAq = '<video width="100%" height="100%" controls>
                <source src="'.$srcAq.'">
                Your browser does not support the video tag.
              </video>';

            ?>

              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">

                <div class="icon-box icon-box-blue">

                  <div class="div-img">
                    <?= $videoAq;?>
                  </div>

                </div>

              </div>

            <?php
          }
        }
            ?>

            </div>

        </div>

      </div>
        
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <?php require_once "./includes/rodape.php";?>

  <a href="<?= $urlSite;?>/#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php require_once "./includes/js.php";?>

<div id="icpbravoaccess_loaded"></div></body></html>