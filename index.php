<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Website by Fairuz | Thank You for Coming</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/letter-f.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

 
</head>



<body class="index-page">


  <header id="header" class="header d-flex flex-column justify-content-center">

    <i class="header-toggle d-xl-none bi bi-list"></i>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li>
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
        <li><a href="#portfolio"><i class="bi bi-images navicon"></i><span>Portfolio</span></a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i><span>Research</span></a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i><span>Contact</span></a></li>
        <li><a href="aplikasi"><i class="bi bi-columns-gap"></i><span>MILK.io</span></a></li>
      </ul>
    </nav>

  </header>

  <main class="main">
  <!--API Scopus-->
  <?php
    $apiKey = "d3a7416a53291eb0bb1a85770755681a";
    $authorId = "57931825700"; // Ganti dengan Scopus Author ID
    $url = "https://api.elsevier.com/content/author/author_id/57931825700?view=metrics";
    
    $options = [
        "http" => [
            "header" => "X-ELS-APIKey: $apiKey\r\nAccept: application/json\r\n",
            "method" => "GET",
        ],
    ];
    
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $data = json_decode($response, true);
    // var_dump($data);
    // echo "Nama Penulis: " . $data['author-retrieval-response'][0]['author-profile']['preferred-name']['surname'] . "\n";
    // echo "H-Index: " . $data['author-retrieval-response'][0]['h-index'];
    ?>
    <!--API Scopus-->

    <!--Webscrapping Gscholar-->
    <?php
    include('htmldom/simple_html_dom.php');

    $url = "https://scholar.google.com/citations?user=suWxEcoAAAAJ&hl=id";
    $html = file_get_html($url);
    
    // Ambil Nama Penulis
    $author_name = $html->find('.gsc_prf_in', 0);
    
    // Ambil Jumlah Sitasi
    $citations = $html->find('td.gsc_rsb_std', 0)->plaintext;
    
    // Ambil Jumlah Dokumen (Publikasi)
    $documents = count($html->find('.gsc_a_tr'));
    
    // echo "Nama: $author_name\n";
    // echo "Jumlah Sitasi: $citations\n";
    // echo "Jumlah Dokumen: $documents\n";
    ?>



    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="assets/img/hero-background.jpg" alt="">

      <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <h2>Welcome to My Website</h2>
            <p>I'm <span class="typed" data-typed-items="Fairuz, Engineer, Researcher, Designer, Trader"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
            <div class="social-links">
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="https://www.facebook.com/fairuz.milkiy/"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/fairuzmilky"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/in/fairuz-milkiy-kuswa-6a4016110/"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>I am a researcher at the National Research and Innovation Agency, where my work primarily focuses on green energy, CO2 neutrality, and biomass co-firing. My passion for research extends to exploring topics like coding, artificial intelligence (AI) technologies, and IoT automation.

          Beyond my professional pursuits, I am a creative enthusiast who enjoys graphic design, website development, and industrial 3D design. These hobbies allow me to express creativity and innovation in various ways outside the laboratory.
          
          In addition to my work and hobbies, I also engage in trading as a side activity. While it started as a way to earn small profits, it has become a stepping stone toward my dream of "trading for a living."
        </p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/foto-profil.jpeg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>Young Engineer &amp; Trader.</h2>
            <p class="fst-italic py-3">
              Both as an engineer and a trader, I am currently delving into these two fields. In addition, here is my personal data:
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>April 1995</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>fairuzmk.github.io</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+62 8133 3627 xxxx</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Tangerang Selatan, Indonesia</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master of Engineer</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>fairuzmilkiy@yahoo.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              Thank you for stopping by, and feel free to connect or collaborate if our interests align!
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-file-text"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $documents ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>GScholar Documents</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-link"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $citations ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Citations</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-h-circle"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $data['author-retrieval-response'][0]['h-index']?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Scopus H-index</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-person-workspace"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?php
$currentYear = date("Y");
$selisih = $currentYear - 2018;
echo $selisih; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Years Work Experience</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <p>My skills are well-distributed across various areas, though none can be considered entirely perfect.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>Web Design</span> <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

            <div class="progress">
              <span class="skill"><span>3D Solidwork</span> <i class="val">70%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

            <div class="progress">
              <span class="skill"><span>Data Simulation Analysis</span> <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

          </div>

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>Engineering</span> <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

            <div class="progress">
              <span class="skill"><span>Researching</span> <i class="val">95%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

            <div class="progress">
              <span class="skill"><span>Programming</span> <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

          </div>

        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>My journey has been shaped by a commitment to continuous learning and professional growth. With a solid foundation in education, I have dedicated six years to advancing my career as an engineer within a government agency. Over the past year, I have expanded my expertise into the field of trading, pursuing it with focus and determination. Throughout my journey, my passion for technology and innovation has remained a constant driving force.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item pb-0">
              <h4>Young Researcher and Engineer in BRIN</h4>
              <h5>2021 - Present</h5>
              <p><em>Research in Coal Combustion Study</em></p>
              <ul>
                <li>Kajian Pembakaran Batubara Berau untuk Memperoleh Kinerja Boiler PLTU Suralaya yang Aman dengan Pengendalian Masalah Slagging dan Fouling</li>
                <li>Kajian Slagging dan Fouling Batubara PT Jembayan Muarabara dengan Drop Tube Furnace</li>
                <li>Kajian Slagging dan Fouling Batubara PT Kaltim Prima Coal dengan Drop Tube Furnace</li>
                <li>Kajian Slagging dan Fouling Batubara PT Kideco Jaya Agung dengan Drop Tube Furnace</li>
                <li>Kajian Pengabuan Blending Batubara Bhumi Jati Power</li>
                <li>Inovasi Teknologi Peningkatan Kualitas Biodiesel dan Campurannya</li>
                <li>Assesment of Drop Tube Furnace Combustion Test for Coal Blended and Additive</li>
                <li>Kajian dan Konsultasi Blending Batubara untuk PLTU </li>
                <li>Riset Bahan Bakar Co-firing PLTU berbagai jenis dan wilayah di Indonesia</li>
                <li>Uji co-firing Batubara dan Biomassa Kelapa Sawit</li>
                <li>Kajian Analisis Performa Blending Batubara dan Aplikasi Aditif di Unit 5-7 Suralaya</li>
                <li>Kajian Uji Bakar co-firing Bahan Bakar Jumputan Padat (BBJP)</li>

                
              </ul>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>Engineer in BPPT</h4>
              <h5>2018 - 2021</h5>
              <p><em>Electrical Support for Biodiesel Study</em></p>
              <ul>
                <li>Pengembangan Standar dan Karakterisasi Campuran Biodiesel B30 untuk Sektor Pembangkit Listrik</li>
                <li>Pengembangan Sistem Elektrikal Dan Instrumentasi Pilot Plant High Quality Biodiesel Kapasitas 1 Ton / Hari</li>
                <li>Kajian Pemisahan Parameter Kadar Air Dan Kotoran Dalam Standar Mutu Biodiesel</li>
                <li>Sistem Elektrikal dan Instrumentasi Pilot Plant High Quality Biodiesel Kap. 1Ton/Hari</li>
                <li>Sistem Utilitas Pilot Plant High Quality Biodiesel Kap. 1Ton/Hari</li>
                <li>Pengaruh Volume Penyimpanan Bahan Bakar Campuran Biodiesel Terhadap Kenaikan Kadar Air</li>

           </ul>
            </div><!-- Edn Resume Item -->

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Sumary</h3>

            <div class="resume-item">
              <h4>Fairuz Kuswa</h4>
              <p><em>6 years as an engineer in a government agency, 1 year of serious involvement in trading, and a long-standing interest in all things technology-related.</em></p>
              <ul>
                <li>Serpong, Tangerang Selatan, ID</li>
                <li>(62) 8133 627X XXX</li>
                <li>fairuzmilkiy@yahoo.com</li>
              </ul>
            </div><!-- Edn Resume Item -->

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Master of Mechanical Engineering</h4>
              <h5>2022 - 2024</h5>
              <p><em>Sepuluh Nopember Institute of Technology, Surabaya, ID</em></p>
              <p>I specialized in Energy Conversion, particularly in the topic of combustion. 
                My research focused on the combustion of palm oil biomass and its associated 
                risks in pulverized coal (PC) boilers. 
                I graduated with a GPA of 3.85 in 2 years.</p>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>Bachelor of Electrical Engineering</h4>
              <h5>2013 - 2017</h5>
              <p><em>Brawijaya University, Malang, ID</em></p>
              <p>I am in the Power and Electronic Engineering department, 
                and my research topic is single-phase induction generators using 
                numerical calculations. I graduated with a GPA of 3.60, Cum Laude, 
                in 4 years.</p>
            </div><!-- Edn Resume Item -->

          </div>

         

        </div>

      </div>

    </section><!-- /Resume Section -->




    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Research Paper</h2>
        <p>A high-quality research paper developed based on systematically collected data and findings over a five-year period, featuring in-depth analysis, rigorous methodology, and significant contributions to the relevant field of study.</p>
      </div><!-- End Section Title -->
      <?php include 'test.php' ?>
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
        
        <?php foreach ($scopusdoc as $doc): ?>
                <div class="service-item" data-aos="fade-left">
                    <div class="pemisah">
                        <img src="assets/img/elsevier_logo.png" class="image">
                        
                        <a href="<?= 'https://doi.org/' . $doc['doi'] ?>" target="_blank" class="stretched-link">
                            <h3><?= htmlspecialchars($doc['publisher']) ?></h3>
                            <h4><?= htmlspecialchars($doc['title']) ?></h4>
                            <h5> <strong>Published :</strong> <?= htmlspecialchars($doc['thterbit']) ?></h5>
                        </a>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

         
          
          <!-- End Service Item -->

         



        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Quotes of The Day</h2>
        <p>If you ever feel like your life is a mess, remember that there are people around you who might be going through something even worse. Stay grateful.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <iframe frameBorder="0" frameBorder="0" style="width:100%; height:200px" src="https://kwize.com/quote-of-the-day/embed/&txt=0&font=&color=000000&background=ffffff">
                      </iframe>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <iframe frameBorder="0" frameBorder="0" style="width:100%; height:200px" src="https://kwize.com/quote-of-the-day/embed/&txt=0&font=&color=000000&background=ffffff&fid=success">

                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <iframe frameBorder="0" frameBorder="0" style="width:100%; height:200px" src="https://kwize.com/quote-of-the-day/embed/&txt=0&font=&color=000000&background=ffffff&fid=work">

                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

           

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Me</h2>
        <p>You can reach me via email; however, if you are genuinely interested in connecting with me, I will share my WhatsApp number to you</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Serpong - Tangerang Selatan, ID</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+62 8133 627X XXX</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>fairuzmilkiy@yahoo.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="https://api.web3forms.com/submit" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <input type="hidden" name="access_key" value="80780a06-2b8f-4899-b213-e93a211dea0a">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container">
      <h3 class="sitename">Fairuz Milkiy Personal Resume</h3>
      <p>An individual has the ability to unlock their full potential when they are genuinely committed.
        <br>Attitude is always Number One
      </p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href="https://www.facebook.com/fairuz.milkiy/"><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/fairuzmilky"><i class="bi bi-instagram"></i></a>
      <a href="https://www.linkedin.com/in/fairuz-milkiy-kuswa-6a4016110/"><i class="bi bi-linkedin"></i></a>
      </div>

      
      <div class="container">
        <div class="copyright">
          <span>Copyright © 2024</span> <strong class="px-1 sitename">FMK Design</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="#" id="scroll-top">Me</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>