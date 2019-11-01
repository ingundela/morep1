<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

//if we want to send via SMTP
    $mail->Host = "smtp.gmail.com";
    //$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "senaidbacinovic@gmail.com";
    $mail->Password = "5C1bcnPkDI4Wd%#";
    $mail->SMTPSecure = "ssl"; //TLS
    $mail->Port = 465; //587
    $mail->addAddress('etelvino@vinostour4fun.com');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Seu email foi enviado, Obrigado!";
    else
        $msg = "Por favor tente novamente!";

    unlink($file);
  }
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Google verification - Indixing website-->
  <title>VinosTour4Fun</title>
  <link href="css/fa-light.min.css" rel="stylesheet" />
  <link href="css/fontawesome-all.min.css" rel="stylesheet" />
  <link href="css/fontawesome-all.css" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/main.min.css">


</head>

<body id="home">
  <header>
    <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="contacts_email_cell mobile_hide"><i class="fas fa-envelope"></i> info@vinostour4fun.com</span>
            <span class="contacts_email_cell mobile_hide"><i class="fas fa-phone"></i> +258 85 556 0000</span>
            <span class="contacts_email_cell mobile_hide"><i class="fas fa-phone"></i> +258 87 990 0940</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="list-unstyled social">
                            
                            <li><a href="https://business.facebook.com/Vinos-Tour4Fun-112693720096207/?business_id=370835443612620"
                  target="_blank"><i class="fab fa-facebook-f facebook"></i></a></li>
              <li><a href="#" target="_blank"> <i class="fab fa-linkedin-in linkedin"></i></a>
              </li>
              <li><a href="#" target="_blank"><i class="fab fa-instagram instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <nav class="navbar navbar-expand-md navbar-light">
      <div class="container">
         <a class="navbar-brand" href="index.html"><img src="img/logo_vinos.jpg"></a>
        <button class="navbar-toggler compressed" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parque_mucapana.html">roteiro - Parque Mucapana Gagnaux</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="katembe.html">roteiro - Katembe</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="sendemail.php">contactos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="parque_mucapana">
            <div class="container">
                <h1 class="title_hero">fale conosco</h1>
            </div>
        </div>
  </header>
      
      <!--contact form-->
      <section class="contactForm section-space justify-content-center">
        <div class="container ">
          <div class="row alighn align-items-center">
            <div class="col-lg-8 col-md-12">
              <h2 class="vinos_contact">Vino'sTour4Fun</h2>
              <p>A nossa finalidade é atender ao público consumidor com turismo de qualidade realizando um optimo trabalho e oferecendo roteiros maravilhosos.</p>
              <p><span class="mission_content">Missão: </span>Orientar pessoas ou grupos durante passeios e visitas informando sobre aspectos socioculturais, históricos, ambientais, geográficos e outros de interesse.</p>
              <p><span class="mission_content">Vissão: </span> Ser empresa de referência e reconhecida como a melhor opção para organização, promoção e divulgação de roteiros de passeios e visitas a locais históricos, ambientais, de entretenimento e de interesse.</p>
              <ul class="list_unstyled contact_list">
                <li><i class="fas fa-phone"></i> <span class="bold">Telefone:</span> +258 85 556 0000</li>
                <li><i class="fas fa-phone"></i> <span class="bold">Telefone:</span> +258 87 990 0940</li>
                <li><i class="fab fa-whatsapp-square"></i> <span class="bold">WhatsApp:</span> +258 85 556 0000</li>
                <li><i class="fas fa-envelope"></i> <span class="bold">Email:</span> info@vinostour4fun.com</li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-12">

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <div class="contact_form">
                <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Full Name..."><br>
                <input class="form-control" name="subject" placeholder="Subject..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
                <input id="sendBtn" class="btn contact-btn" name="submit" type="submit" value="Enviar Email">
              </form>
              </div>
            </div>
          </div>
            </div>
        </div>
      </section>
       <!--call to action two--->
       <section class="vantagens section_space text-center justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page_title">
            <h2>nossas vantagens</h2>
          </div>
        </div>
      </div>
      <div class="vantagem_content">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="vanta_img">
              <img src="img/vanta-img.png" class="mx-auto d-block" alt="vantagens">
            </div>
          </div>
          <div class="col-md-6">
            <div class="vanta_content">
              <ul class="vanta_list list-unstyled">
                <li><i class="fas fa-check"></i> Melhora a sua compreensão da cultura Moçambicana</li>
                <li><i class="fas fa-check"></i> Suas experiências criarão uma memória que você lembrará pelo resto da sua vida</li>
                  <li><i class="fas fa-check"></i> Terá histórias engraçadas para contar aos amigos em casa</li>
                  <li><i class="fas fa-check"></i> Tornar-se-á um incrível contador de histórias</li>
                  <li><i class="fas fa-check"></i> Criará novos relacionamentos com as pessoas que for a conhecer</li>
                  <li><i class="fas fa-check"></i> Reduzirá o seu stress do dia-a-dia</li>
                  <li><i class="fas fa-check"></i> Mantemos sua mente activa</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer section-space">
      <div class="container p-0">
        <div class="row">
          <div class="col-md-4 hidden-sm hidden-xs">
            <h4 class="vinos"><span class="blue">Vino's</span><span class="orange">Tour4</span><span class="yellow">Fun</span></h4>
            <p>Com a companhia Vino's, você não irá mais se perder em locais que não conhece e optimizará seu tempo aproveitando o que há de melhor a ser visitado, em especial programas e locais exclusivos que só os locais conhecem.</p>
          </div>
          <div class="col-lg-4 col-md-3 col-sm-12 bar_sides">
            <h4>menu:</h4>
            <ul class="menu_list list-unstyled">
              <li><a  href="index.html">Home</a></li>
              <li><a  href="parque_mucapana.html">roteiro - Parque Mucapana Gagnaux</a></li>
              <li><a  href="katembe.html">roteiro - Katembe</a></li>
              <li><a  href="sendemail.php">contactos</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-6 bar_sides">
            <h4>nossas redes:</h4>
            <ul class="redes list-unstyled">
              <li><a href="https://business.facebook.com/Vinos-Tour4Fun-112693720096207/?business_id=370835443612620" target="_blank"><i class="fab fa-facebook-f facebook"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-linkedin-in linkedin"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-instagram instagram"></i></a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-6">
            <span class="info">info@vinostour4fun.com</span>
          </div>
        </div>
      </div>
      </div>
  </footer>
  <div class="built-by">
    <div class="container">
      <p class="text-uppercase text-center">Desenvolvido por <a href="#" class="sb">sb-mozmedia - 2019</a></p>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/main.js"></script> 
    
    
    
  </body>
</html>
