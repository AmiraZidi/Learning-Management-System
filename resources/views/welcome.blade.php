<!DOCTYPE html>
<html lang="fr">

<head>
  
  <!-- Vendor CSS Files -->
  <link href="/assets/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/assets/css/style.css" rel="stylesheet">
</head>


<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:pfelms@gmail.com">pfelms@gmail.com</a>
        <i class="bi bi-phone"></i>+216 75 29 26 25
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://www.facebook.com/www.isetgb.rnu.tn/" class="facebook"><i class="bi bi-facebook"></i></a>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto">DEPARTEMENT <br> STIC</h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hi">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#clubs">Nos Clubs</a></li>
          <li><a class="nav-link scrollto" href="#certif">Certifications</a></li>
          <li><a class="nav-link scrollto" href="#formation">Formations</a></li>
          <li><a class="nav-link scrollto" href="#dep">Notre département</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    @if(Auth::user()->usertype === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard Admin</span></a>
                    @elseif(Auth::user()->usertype === 'enseignant')
                        <a href="{{ route('enseignants.dashboard') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard Enseignant</span></a>
                    @elseif(Auth::user()->usertype === 'etudiant')
                        <a href="{{ route('etudiants.dashboard') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard Étudiant</span></a>
                    @endif      
                @else
                    <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Se connecter</span></a>

                   
                @endauth
            </div>
        @endif

    </div>
  </header><!-- End Header -->

  <!-- ======= Hi Section ======= -->
  <section id="hi" class="d-flex align-items-center">
    <div class="container">
      <h1 ><b>Département S.T.I.C</b></h1>
      <h2><b>DEPARTEMENT SCIENCES ET TECHNOLOGIES DE L'INFORMATION ET DE LA COMMUNICATION</b></h2>
    </div>
  </section><!-- End Hi -->

  <main id="main">

    <!-- ======= Pourquoi nous Section ======= -->
    <section id="prq-nous" class="prq-nous">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Pourquoi choisir le département S.T.I.C ?</h3>
              <p>
                Le département STIC de l'ISET de Gabès forme des techniciens supérieurs depuis 0000 
                et a adopté le système LMS depuis l'année universitaire 2024/2025. 
                Son objectif est de former des licenciés compétents pour les entreprises des télécommunications, réseaux et informatique. 
                Les diplômés de la Licence Appliquée en Télécommunication acquièrent des compétences pointues et une solide base scientifique, 
                les préparant à concevoir et entretenir des solutions informatiques adaptées aux besoins professionnels. 
                Les spécialités offertes facilitent leur intégration sur le marché du travail.
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Sécurité, Innovation, Compétences et Opportunités</h4>
                    <p>La formation en STIC offre expertise sécurité réseau, compétences innovantes, bases solides en informatique, opportunités pro et réseaux de contacts.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Guidés par l'Excellence</h4>
                    <p>
                      Les formateurs et enseignants du département STIC, parmi les plus compétents, guident les étudiants vers l'excellence en technologie de l'information et communication.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="../assets/assets/img/lab.png" style="width: 45%;"> <br><br>
                    
                    <h4>Explorer, Expérimenter, Innover</h4>
                    <p>Nos laboratoires informatiques fournissent un cadre pratique et stimulant où les étudiants peuvent explorer, expérimenter et innover, concrétisant ainsi leurs connaissances théoriques en projets concrets.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= clubs Section ======= -->
    <section id="clubs" class="clubs">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Nos Clubs</h3>
            <p>Nos clubs étudiants, au cœur de notre département, offrent une multitude d'activités pour cultiver les passions, stimuler la créativité et tisser des liens entre étudiants. Ce sont des espaces où chacun peut explorer de nouveaux horizons, développer des compétences et s'intégrer dans une communauté dynamique.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title">Club de Technologie : Exploration, Apprentissage et Collaboration</h4>
              <p class="description">Rejoignez notre club de technologie pour une expérience immersive, mêlant activités d'intégration et éducatives, où la passion pour la technologie se conjugue avec le plaisir de l'apprentissage et de la collaboration!</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift" ></i></div>
              <h4 class="title" >Club Culturel : Explorez la Diversité, Célébrez l'Intégration</h4>
              <p class="description">Découvrez la richesse culturelle au sein de notre département en rejoignant notre club dédié. Avec une gamme d'activités diverses et éducatives, plongez-vous dans des expériences stimulantes qui célèbrent la diversité et favorisent l'intégration au sein de notre communauté étudiante.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title" >Club de Volontariat : Ensemble pour un Impact Positif</h4>
              <p class="description">Engagez-vous dans des actions bénévoles significatives au sein de notre département en rejoignant notre club dédié au volontariat. Ensemble, travaillons à créer un impact positif dans notre communauté grâce à des projets et des initiatives altruistes qui changent des vies et renforcent les liens entre étudiants.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End clubs Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas "><img src="../assets/assets/img/ens.png " style="width:70%;"></i>
              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
              <p>Enseignants</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas "><img src="../assets/assets/img/etud.png " style="width:100%;"></i>
              <span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1" class="purecounter"></span>
              <p>Etudiants inscrit</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas "><img src="../assets/assets/img/labs.png " style="width:70%;"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
              <p>Laboratoires</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1" class="purecounter"></span>
              <p>Etudiants diplomés</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Certifications Section ======= -->
    <section id="certif" class="certif">
      <div class="container">

        <div class="section-title">
          <h2>Certifications</h2>
          <p>Pendant la formation des étudiants, notre département STIC propose une sélection variée et valorisante de certifications.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas "> <img src="../assets/assets/img/cisco.png " style="width: 100px;"></i></div>
              <h4>CISCO</h4>
              <p>Les certifications CCNA1 et CCNA2 de Cisco valident la compétence des étudiants dans les fondamentaux des réseaux informatiques, 
                ainsi que dans les technologies avancées de routage et de commutation.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas "><img src="../assets/assets/img/microsoft.png " style="width: 50px;"></i></div>
              <h4>MICROSOFT AZURE</h4>
              <p>La certification Microsoft Azure atteste de la maîtrise des services cloud et des solutions d'infrastructure proposées par Microsoft.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas "><img src="../assets/assets/img/c2ilogo.png " style="width: 50px;"></i></div>
              <h4><a href="">C2I</a></h4>
              <p>Le C2I (Certificat Informatique et Internet) valide les compétences numériques essentielles, 
                telles que la maîtrise des outils bureautiques, la recherche d'informations en ligne, 
                la sécurité informatique et la gestion de projets numériques.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Certifications Section -->

    <!-- ======= Formation Section ======= -->
    <section id="formation" class="formation">
      <div class="container">

        <div class="section-title">
          <h2>Formation</h2>
          <p>La formation est alignée sur le système semestriel adopté par le réseau des ISETs. 
            D'une durée totale de six semestres, elle intègre des stages, 
            permettant aux étudiants de se spécialiser en sécurité des réseaux et en télécommunications.
          </p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">L Sécurité des réseaux</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">L Réseaux et Systèmes en télécommunications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">LACC Développement mobile</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>L Sécurité des réseaux</h3>
                    <p class="fst-italic">Option dés la 2éme année</p>
                    <p>L'option Sécurité des Réseaux (SR) forme des spécialistes capables de protéger les systèmes informatiques et les infrastructures de communication contre les menaces numériques. 
                      Les étudiants acquièrent des compétences avancées en sécurité des réseaux, en cryptographie, en gestion des risques et en réponse aux incidents de sécurité. 
                      Avec des cours sur les techniques de piratage éthique, la protection des données et la sécurité des applications, les étudiants sont préparés à travailler dans des entreprises, 
                      des agences gouvernementales ou des organisations qui requièrent une expertise en cybersécurité.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/assets/img/sr.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>L Réseaux et Systèmes en télécommunications</h3>
                    <p class="fst-italic">Option dés la 2éme année</p>
                    <p>L'option Réseaux et Systèmes en télécommunications forme des professionnels pour concevoir, 
                      déployer et gérer des infrastructures de communication modernes. Les étudiants acquièrent des compétences pointues en réseaux informatiques,
                      télécommunications, sécurité des données et gestion des services réseau. Avec des cours sur les protocoles de communication, la conception de réseaux,
                       la sécurité des données et les technologies sans fil, 
                      les étudiants sont prêts à travailler dans les télécommunications, les fournisseurs d'accès Internet et d'autres secteurs des TIC.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/assets/img/telecom.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>LACC Développement mobile</h3>
                    <p class="fst-italic">Cette formation est programmée sur 30 semaines réparties entre l’ISET Gabès et l’entreprise
                      d’accueil.</p>
                    <p>La licence appliquée Co-Construite DEVELOPPEMENT DES APPLICATIONS MOBILES habilitée en 2014 par le ministère de l’Enseignement Supérieur et de la Recherche Scientifique, 
                      est le fruit d’une collaboration entre l’Institut Supérieur des Etudes Technologiques de Gabès et les partenaires industriels de la région du secteur développement mobile.
                       Cette licence s'appuie sur une forte demande des entreprises de pouvoir recruter des collaborateurs compétents dans les domaines du développement d'applications mobiles.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/assets/img/mobiledev.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Formation Section -->

    <!-- ======= dep Section ======= -->
    <section id="dep" class="dep">
      <div class="container">

        <div class="section-title">
          <h2>Notre département </h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../assets/assets/img/sticteam/team1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Directeur</h4>
                <span>specialité</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../assets/assets/img/sticteam/team2.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>chef département</h4>
                <span>specialité</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../assets/assets/img/sticteam/team3.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Responsable A</h4>
                <span>specialité</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../assets/assets/img/sticteam/team4.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Responsable B</h4>
                <span>specialité</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End dep Section -->

    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery19.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery9.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery14.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery15.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/Gallery1.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery11.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery12.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <img src="../assets/assets/img/gallery/gallery13.jpg" class="testimonial img-fluid" alt="">
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
  

  </main><!-- End #main -->

  <footer id="footer" style="background-color: #343a40; color: #fff; padding: 40px 0;">
    <div class="footer-top" style="background-color: #343a40; color: #fff; padding: 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 footer-contact">
                    <h3>Département STIC</h3>
                    <p style="color: #ffffff;">Pour plus d'informations sur les lieux et les modalités de contact, veuillez nous joindre directement.</p>
                    <div class="info mt-4">
                        <div class="address">
                            <i class="bi bi-geo-alt" style="color: #f39c12;"></i>
                            <h4 style="color: #ffffff;"><span>Localisation:</span> <br><span><p style="color: #ffffff;">Teboulbou, 3 rue Al-Aroussi Al-Hadded</p></span></h4>
                            
                        </div>
                        <div class="email">
                            <i class="bi bi-envelope" style="color: #f39c12;"></i>
                            <h4 style="color: #ffffff;"><span>Email:</span><br><span><p><a href="mailto:pfelms@gmail.com" style="color: #fff; text-decoration: underline;">pfelms@gmail.com</a></p></span></h4>
                            
                        </div>
                        <div class="phone">
                            <i class="bi bi-phone" style="color: #f39c12;"></i>
                            <h4 style="color: #ffffff;"><span>Tél:</span><br><span><p><a href="tel:+21675292625" style="color: #fff; text-decoration: underline;">+216 75 29 26 25</a></p></span></h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div style="border: 1px solid #ddd; padding: 10px; margin-top: 20px; border-radius: 8px;">
                        <iframe style="border:0; width: 100%; height: 350px; border-radius: 8px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.0066952337756!2d10.101589611245048!3d33.863718327549904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12556e49c3f6adbf%3A0xaa81492277b3e4b9!2sInstitut%20Superieure%20des%20Etudes%20Technologique%20de%20Gabes!5e0!3m2!1sfr!2stn!4v1715022685805!5m2!1sfr!2stn" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-md-flex py-4 justify-content-between">
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://www.facebook.com/www.isetgb.rnu.tn/" class="facebook" style="color: #3b5998; margin: 0 10px;"><i class="bx bxl-facebook"></i></a>
        </div>
    </div>
</footer>


<!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-t op d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/assets/js/main.js"></script>

</body>

</html>