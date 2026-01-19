<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top" style="display:none;">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h3>NorteTrac</h3>
            <p>
              Rodovia BR-316, Km 11, 2938 <br> 
              Bairro do Uriboca, Marituba - PA <br> 
              CEP: 67200-000 <br>
              <strong>Telefone:</strong> (91) 3366-1000<br>
              <strong>E-mail:</strong> info@nortetrac.com.br<br>
            </p>
            <div class="social-links mt-3">
              <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="https://bootstrapmade.com/demo/templates/Scaffold/#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Web Design</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Web Development</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Product Management</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Marketing</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="https://bootstrapmade.com/demo/templates/Scaffold/#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action="https://bootstrapmade.com/demo/templates/Scaffold/" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      © Copyright <strong><span>NorteTrac</span></strong>. Todos os Direitos Reservados
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </div>
</footer><!-- End Footer -->

<iframe name="win" id="win"></iframe>

<script type="text/javascript">
/* ENVIAR MENSAGEM == */
function enviaMensagemEp(){

  if(!window.stsEnviaMensagemEp){
    stsEnviaMensagemEp = 1;
  } else if(stsEnviaMensagemEp == 1){
    return false;
  } else {
    stsEnviaMensagemEp = 1;
  }

  /* COLETAR DADOS == */
  var rand = String(Math.random());
  var nome = $('#nome').val();
  var telefone = $('#telefone').val();
  var telefone_calc = telefone.replace(/\D/ig, '');
  var email = $('#email').val();
  var assunto = $('#assunto').val();
  var mensagem = $('#mensagem').val();
  
  /* VALIDAR CAMPOS == */
  var qntErrosEp = 0;

  $('#nome_erro, #email_erro, #telefone_erro, #assunto_erro, #mensagem_erro').html('');

  if(nome.length < 5){
    qntErrosEp++;
    $('#nome_erro').html('Nome deve ter no mínimo 5 caracteres');
  }

  if(telefone_calc.length < 10){
    qntErrosEp++;
    $('#telefone_erro').html('Informe o telefone/celular corretamente');
  }

  if(email.length < 5){
    qntErrosEp++;
    $('#email_erro').html('Campo de e-mail inválido');
  }

  if(assunto.length < 5){
    qntErrosEp++;
    $('#assunto_erro').html('Assunto deve ter no mínimo 5 caracteres');
  }

  if(mensagem.length < 15){
    qntErrosEp++;
    $('#mensagem_erro').html('Mensagem deve ter no mínimo 10 caracteres');
  }

  if(qntErrosEp > 0){
    stsEnviaMensagemEp = 0;
    return false;
  }

  var url_post_ep = document.location.origin+'/ajax/contatoEnviarMensagem.php';

  $('#bntEnviarMensagem').html('Enviando Mensagem');
  $('#bnt_enviar_mensagem_ca, #nome, #email, #telefone, #assunto, #mensagem').attr({'disabled':true});

  $.post(url_post_ep, {
    rand:rand,
    nome:nome,
    telefone:telefone,
    email:email,
    assunto:assunto,
    mensagem:mensagem
  }, function(json){

    console.log(json);

    $('#bntEnviarMensagem').html('Mensagem enviada com sucesso! Retornaremos em breve!');

  }).fail(function(info){
    console.log(info);
  });

}
</script>
