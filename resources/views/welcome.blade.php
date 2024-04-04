<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zenith</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="/res/logo (2)_1.png" rel="icon">
  <link href="/res/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
           <h1 class="logo"><a href="index.html">Zenith</a></h1> 
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">À Propos</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li> <a class="nav-link scrollto btn" href="#signIn" role="button" aria-disabled="true" data-toggle="modal" data-target="#exampleModalCenter">Connecter-vous</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
        </div>
      </div>

    </div>
  </header>

  <section id="hero">
    <div class="hero-container">
      <video src="./res/home video.mp4" autoplay muted loop type="video/mp4" id="bg-video"></video>
      
      <div class="video-overlay">
          <div class="caption">
                <h2>Bienvenue à <span style="color: #18d26e;font-weight: 700;">Zenith</span></h2>
                <p>Notre plateforme éducative est un espace dynamique conçu pour inspirer et faciliter l'apprentissage tout au long du parcour.</p>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
  Connecter-vous
</button>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Entrez vos informations !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('layout.alert-mess')
<form method="POST" action="{{ url('/') }}">
      @csrf
          <div class="txt">
          <input name="email" placeholder=" " type="text" required>
          <span></span>
          <label for="email">Nom d'utilisateur</label>
          </div>
      
          <div class="txt">
          <input name="password" placeholder=" " type="password" required>
          <span></span>
          <label for="password">Mot de passe</label>
          </div>
      
          <div class="pass"><a href="/">Mot de passe oublier?</a></div>  
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" value="Se Connecter" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

  </section>

  <main id="main">

    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="bi bi-briefcase"></i>
            <h4 class="title"><a href="">Personnel qualifié</a></h4>
            <p class="description">Employer des enseignants compétents, qualifiés et passionnés, ainsi que du personnel administratif et de soutien dévoué, pour offrir un environnement d'apprentissage optimal.</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="bi bi-card-checklist"></i>
            <h4 class="title"><a href="">Environnement sécurisé</a></h4>
            <p class="description">Créer un environnement sûr, inclusif et bienveillant où tous les élèves se sentent respectés, valorisés et en sécurité pour apprendre et s'épanouir.</p>
            </div>

          <div class="col-lg-4 box">
            <i class="bi bi-binoculars"></i>
            <h4 class="title"><a href="">Suivi des progrès</a></h4>
            <p class="description">Mettre en place des systèmes de suivi et d'évaluation pour suivre les progrès académiques, sociaux et émotionnels des élèves, fournir un retour d'information aux enseignants, et offrir un soutien supplémentaire lorsque nécessaire.</p>
          </div>

        </div>
      </div>
    </section>

    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>À propos</h3>
          <p>Zenith est une plateforme d'enseignement dynamique et inspirant qui célèbre l'apprentissage, l'exploration et le développement personnel à chaque étape du parcours éducatif. Fondée sur un engagement indéfectible envers l'excellence académique, l'intégrité et le bien-être des élèves, notre école du collège au lycée s'efforce de créer un environnement stimulant où chaque individu peut atteindre son plein potentiel.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="/res/notre mission.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Notre Mission</a></h2>
              <p>
                Inspirer, d'éduquer et de préparer nos élèves à devenir des citoyens du monde compétents, responsables et épanouis. Enracinés dans les valeurs de l'excellence académique, du respect mutuel et de l'intégrité.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="/res/notre objectif.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Notre Objectif</a></h2>
              <p>
                Assurer que chaque élève atteigne son plein potentiel académique en fournissant un enseignement de haute qualité est un objectif essentiel et important dans le domaine de l'éducation.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="/res/notre vision.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Notre Vision</a></h2>
              <p>
                Nous aspirons à créer un héritage d'excellence et d'impact positif qui perdurera bien au-delà des murs de notre établissement, façonnant ainsi un avenir meilleur pour les générations futures.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="services">
      <div class="container" data-aos="fade-up">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p><span style="color: #18d26e;font-weight: 700;">Zenith</span> offre une variétés de services :</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="#">Téléverser des ressources</a></h4>
            <p class="description">Nous mettrons l'accent sur la possibilité pour les professeurs de téléverser des ressources, offrant ainsi aux étudiants une diversité de supports d'apprentissage.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="#">Sécurité </a></h4>
            <p class="description">Mettre en œuvre des protocoles de sécurité pour assurer la sécurité des données des élèves et des professeur, ainsi que pour faire face à toute situation d'urgence ou de crise éventuelle.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="#">Interfaces conviviales</a></h4>
            <p class="description">L'interface utilisateur  est conviviale, intuitive et facile à naviguer pour les étudiants et les professeurs.	Les fonctionnalités sont présentées de manière claire et compréhensible.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="#">Les notifications </a></h4>
            <p class="description">Les notifications jouent un rôle essentiel dans la vie d'un étudiant moderne et d'enseignants en lui fournissant des rappels et des informations importantes. En organisant des notifications liées aux événements académiques.</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="#">Performance  </a></h4>
            <p class="description">La plateforme est performante et réactive, même avec un grand nombre d'utilisateurs simultanés.Les temps de chargement plus au mois rapides pour offrir une expérience fluide aux utilisateurs.
</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="#">L'organisation du calendrier</a></h4>
            <p class="description">Cette plateforme En intégrant à la fois les matières et les examens dans le calendrier, en incluant les dates d'examen dans le calendrier, l'étudiant peut se préparer adéquatement en allouant suffisamment de temps pour réviser chaque sujet en profondeu.</p>
          </div>

        </div>

      </div>
    </section>

       

    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contactez-nous</h3>
         
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Quartier Palmeraie,Marrakech, Maroc.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:053365789012">053365789012</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="Zenith@gmail.com">Zenith@gmail.com</a></p>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Zenith</h3>
            <p>Nous sommes déterminés à fournir un environnement sûr, bienveillant et respectueux où la diversité est célébrée et où chaque voix est entendue.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right scrollto"></i> <a href="#about">À propos</a></li>
              <li><i class="bi bi-chevron-right scrollto"></i> <a href="#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              123 Rue des Roses,<br>
              Quartier Palmeraie,<br>
              Marrakech, Maroc.<br>
              <strong>Phone:</strong> 053365789012<br>
              <strong>Email:</strong> Zenith@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Zenith</strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8Hgcp0Ddq4KcIC0Qouf6t6E3t4z+XnNyA6vZv" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script>
    if (window.location.pathname === '/login') {
        $('#exampleModalCenter').modal('show');
    }
</script>
</html>