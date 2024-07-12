<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Azure</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url()?>/assets-all/img/logo.jpg" rel="icon">
  <link href="<?=base_url()?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?=base_url()?>/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?=base_url()?>/assets-all/img/logo.jpg" alt="">
        <h1 class="sitename">Azure</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">Home</a></li>
          <li><a href="#about">Overview</a></li>
          <li><a href="#services">Amenities</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="<?=site_url('Page/login')?>">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1 class="">BEACHFRONT LIVING IN THE HEART OF THE CITY</h1>
            <p class="">Located in Bicutan, Parañaque City, AZURE URBAN RESORT RESIDENCES brought the first ever large scale man-made beach concept to a residential development in the Philippines.</p>
            <div class="d-flex">
              <a href="<?=site_url('Page/login')?>" class="btn-get-started">Get Started</a>
              <a href="#." class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?=base_url()?>/assets-all/img/1.jpg" class="img-fluid animated" alt="" width="70%">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- about Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="">AZURE OVERVIEW</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Designed by the award-winning master planning and architectural firm Broadway Malyan, each tower highlights a breathtaking tropical modern aesthetic that provides optimal natural ventilation, light, and shade.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Nine captivating mid-rise towers</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Resort-inspired outdoor amenities</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>An iconic clubhouse-The Azure Beach Club</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Key retail and service establishments catered to residents</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Ample parking slots</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>A tropical-inspired gated residential community with 24/7 security</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Ready-for-occupancy condo units</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <img src="<?=base_url()?>/assets-all/img/AZURE 9 TOWERS.jpg" width="300px" alt="">
            <p>AZURE’S 9 TOWERS</p>
            <p>Named after some of the most beautiful beaches in the world. From Rio in Brazil, Santorini in Greece, St. Tropez in France, Positano in Italy, and Miami in the US to Maui in Hawaii, Maldives in South Asia, the famous Boracay of the Philippines and Bahamas in the Caribbean.</p>
            <!-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
          </div>

        </div>

      </div>

    </section><!-- /about Section -->

    <!-- services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>BEACH-INSPIRED AMENITIES</h2>
        <p>INDOORS</p>
        <p>Azure Beach Club feat. Lobby Lounge, Ice Cream and Candy Bar, Male and Female Spa, Locker Rooms, Children’s Playroom, Infirmary, Gym & Studio, Movie Room, Game Room, Function Rooms, Al Fresco Dining</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
               <img src="<?=base_url()?>/assets-all/img/LOBBY LOUNGE.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">LOBBY LOUNGE</a></h4>
              <p>A welcoming and restful entrance</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/ICE CREAM & CANDY BAR.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">ICE CREAM & CANDY BAR</a></h4>
              <p>Dessert and café lounge with a bright and multicolored atmosphere.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/MALE SPA AND FEMALE SPA.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">MALE SPA AND FEMALE SPA</a></h4>
              <p>Relax and ease away every ache and pain.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-broadcast icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/LOCKER ROOMS.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">LOCKER ROOMS</a></h4>
              <p>For your privacy and safety</p>
            </div>
          </div><!-- End Service Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
               <img src="<?=base_url()?>/assets-all/img/CHILDREN’S PLAYROOM.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">CHILDREN’S PLAYROOM</a></h4>
              <p>A colorful indoor play area for your active kids</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/GYM & STUDIO.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">GYM & STUDIO</a></h4>
              <p>A spacious fitness center with top-grade equipment and marvelous views</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/MOVIE ROOM.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">MOVIE ROOM</a></h4>
              <p>For a comfortable entertainment experience</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-broadcast icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/AL FRESCO DINING AREA.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">AL FRESCO DINING AREA</a></h4>
              <p>For a delightful dining experience.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/GAME ROOM.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">GAME ROOM</a></h4>
              <p>A variety of traditional and video games provides ample fun.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/ILLUMINATED HALLWAYS.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">ILLUMINATED HALLWAYS</a></h4>
              <p>Alternating hues</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/FUNCTION ROOM.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">FUNCTION ROOM</a></h4>
              <p>Ideal for meetings, seminars, and small parties</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-broadcast icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/LOUNGE & FUNCTION ROOM.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">LOUNGE & FUNCTION ROOM</a></h4>
              <p>A venue for small events or a quiet place to catch up on work, read a good book, or just hangout in style.</p>
            </div>
          </div><!-- End Service Item -->

          </div>

      </div>

      <div class="container section-title mt-5" data-aos="fade-up">
        <p>OUTDOORS</p>
        <p>White sand man-made beach, wave pool, lagoon pool, lap pool, beach bar, beach playground, beach volleyball area, basketball court</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
               <img src="<?=base_url()?>/assets-all/img/THE AZURE BEACH.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">THE AZURE BEACH</a></h4>
              <p>An iconic man-made beach facility with fine white sand, undulating waves, and water features.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/THE AZURE WAVEPOOL.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">THE AZURE WAVE POOL</a></h4>
              <p>Your very own man-made beach comes with a wave machine that creates fun beach waves every few minutes.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/LAP POOL.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">LAP POOL</a></h4>
              <p>A 25-meter infinity lap pool with floating sunbathing-beds.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-broadcast icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/LAGOON POOL.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">LAGOON POOL</a></h4>
              <p>Exclusive to residents, the Azure’s lagoon pool is your next option for a more relaxed swim.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
               <img src="<?=base_url()?>/assets-all/img/THE BEACH BAR.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">THE BEACH BAR</a></h4>
              <p>A dynamic hangout in the middle of the Azure beach</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/KIDDIE POOL WITH CHILDREN’S BEACH PLAYGROUND.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">KIDDIE POOL WITH CHILDREN’S BEACH PLAYGROUND</a></h4>
              <p>Featuring fun slides and exciting water features for your kids!</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/BEACH VOLLEYBALL.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">BEACH VOLLEYBALL</a></h4>
              <p>Dedicated to the great summer sport</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-broadcast icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/THE AZURE BASKETBALL COURT.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">THE AZURE BASKETBALL COURT</a></h4>
              <p>Shoot some hoops in your very own outdoor basketball court.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
              <img src="<?=base_url()?>/assets-all/img/AZURE BEACH CLUB.jpg" width="250px" alt="">
              <h4><a href="#" class="stretched-link">AZURE BEACH CLUB</a></h4>
              <p>A one-of-a-kind beach club amenity that integrates dining, relaxation, and entertainment facilities into one seamless, tropical-inspired experience.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div> -->
              <img src="#" width="250px" alt="">
              <h4><a href="#" class="stretched-link">FOOD STALLS AND CONVENIENCE STORE</a></h4>
              <p></p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <!-- <div class="icon"><i class="bi bi-calendar4-week icon"></i></div> -->
              <img src="#" width="250px" alt="">
              <h4><a href="#" class="stretched-link">ROOF DECK, SKY VIEW, AND SKY GARDEN</a></h4>
              <p></p>
            </div>
          </div><!-- End Service Item -->

          </div>

      </div>

    </section><!-- /services Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <strong>RIGHT AT THE BICUTAN EXIT OF SLEX AND SKYWAY</strong>
                  <p>SLEX West Service Road, corner D. Soledad Avenue, Bicutan,
                  Parañaque City</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>0917-777-1448</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>cozystays.azure@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.0269485477857!2d121.04220187587313!3d14.483142079940059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf0585c07d9b%3A0xef3e63b30f501b33!2sAzure%20Beach%20Resort!5e0!3m2!1sen!2sph!4v1719731356455!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
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

  <footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Arsha</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?=base_url()?>/assets/vendor/aos/aos.js"></script>
  <script src="<?=base_url()?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?=base_url()?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?=base_url()?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?=base_url()?>/assets/js/main.js"></script>

</body>

</html>