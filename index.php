<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 include 'db_connect.php'; 
 include 'function.php'; 
 $name=$name_err=$email=$email_err=$subject=$subject_err=$message=$message_err="";
 $name_first=$email_first=$subject_first=$message_first="";
  if(isset($_POST['contact_us'])){
      $er=0;
      $name_first=$_POST["name"];
      $email_first=$_POST["email"];
      $subject_first=$_POST["subject"];
      $message_first=$_POST["message"];
      if (empty($_POST["name"])){
        $name_err = "Name is required";
        $er++;
        }
        elseif (!preg_match("/^[a-z A-Z ]*$/",$name))
        {
        $name_err = "Only letters and white space allowed";
        $er++;
        }
        if (empty($_POST["email"])){
          $email_err = "Email is required";
          $er++;
          }
          else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $email_err = "Invalid email format";
            $er++;
          }
          if (empty($_POST["subject"])){
            $subject_err = "Subject is required";
            $er++;
            }
            elseif (!preg_match("/^[a-z A-Z ]*$/",$_POST["subject"]))
             {
               $subject_err = "Only letters and white space allowed";
               $er++;
             }
             if (empty($_POST["message"])){
              $message_err = "Message is required";
              $er++;
             }
             if($er==0){
                $stmt=$conn->prepare("INSERT into contact_us(name,email,subject,message,send_at) values(:name,:email,:subject,:message,:send_at)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':subject',$subject);
                $stmt->bindParam(':message',$message);
                $stmt->bindParam(':send_at',$send_at);
                $name=get_safe_value($_POST['name']);
                $email=get_safe_value($_POST['email']);
                $subject=get_safe_value($_POST['subject']);
                $message=get_safe_value($_POST['message']);
                $send_at=date("Y-m-d H:i:s");
                $stmt->execute();
                require 'vendor/autoload.php';
                $mail = new PHPMailer;
                $mail->setFrom($email, $name);
            $mail->addAddress("andrew.nomaan@gmail.com",$name);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = "<b>Name:</b>".$name."<br>"."<b>Email-id:</b>".$email."<br><br><div style='font-size:22px;margin-left:100px;'><b>".$message."</b></div>";
            if($mail->send()) 
             {
              $name=$name_err=$email=$email_err=$subject=$subject_err=$message=$message_err="";
              $name_first=$email_first=$subject_first=$message_first="";
            ?>
              <script>
                 
                alert("Your message send successfully.Thank you");
              </script>
            <?php
            } 
          }         
  }
?>      
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>शैलेंद्र सिंह रावत - कांग्रेस</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-white.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="cta d-none d-md-block">
        <a href="" class="scrollto"><i class="bi bi-envelope-fill"></i> shailendrarawatyamkeswer@gmail.com</a>
        <a href="" class="scrollto"><i class="bi bi-phone"></i> +91 7453973944</a>
      </div>
      <div class="cta">
        <a href="https://www.facebook.com/profile.php?id=100074900967902" class="scrollto"><i
            class="bi bi-facebook"></i></a>
        <a href="https://twitter.com/ssnegiuk" class="scrollto"><i class="bi bi-twitter"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="./"> <img src="assets/img/unnamed.png" class="img-fluid" alt=""><strong>शैलेंद्र सिंह
            रावत</strong><span> (विधान सभा सदस्य, कोटद्वार)</span></a></h1>
      <!-- <a href="./" class="logo"><img src="assets/img/logo_footer.jpg" alt="" class="img-fluid"></a> -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">होम</a></li>
          <li><a class="nav-link scrollto" href="#about">बारे में</a></li>
          <li><a class="nav-link scrollto" href="#services">हमारी प्रेरणा</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">गैलरी</a></li>
          <li><a class="nav-link scrollto" href="#supporter">समर्थक</a></li>
          <li><a class="nav-link scrollto" href="#meeting">बैठक</a></li>
          <!-- <li><a class="nav-link scrollto" href="#faq">सामान्य प्रश्न</a></li> -->
          <li><a class="nav-link scrollto" href="#contact">संपर्क</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown thought">विचार</h2>
          <p class="animate__animated animate__fadeInUp">
            हर कोशिश में शायद
            सफलता नहीं मिल पाती लेकिन,
            हर सफलता का
            कारण कोशिश ही होती है।
          </p>
          <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown thought">विचार</h2>
          <p class="animate__animated animate__fadeInUp">शिक्षा से पहले संस्कार, व्यापार से पहले
            व्यवहार और भगवान से पहले माता-पिता को
            पहचानना जीवन की अधिकतर कठिनाइयों
            को हल कर देता है।.</p>
          <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown thought">विचार</h2>
          <p class="animate__animated animate__fadeInUp">किसी भी देश के विकास में किसान, युवा और राजनीति का बहुत बड़ा
            योगदान होता हैं।.</p>
          <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown thought">विचार</h2>
          <p class="animate__animated animate__fadeInUp"> व्यक्तिगत स्वार्थ सिद्ध करने के लिए की गयी राजनीति हमेशा
            ख़तरनाक होती हैं, समाज हित ही राजनीति का उद्देश्य होना चाहिए।.</p>
          <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12" data-aos="fade-up">
            <div class="icon-box">
              <div class="row">
                <div class="col-md-3 header-img">
                  <img src="assets/img/sh2-removebg-preview.png" class="img-fluid mb-3" alt="">
                </div>
                <div class="col-md-3 d-flex align-items-center">
                  <div class="name-heading">
                    <h5><strong>शैलेंद्र सिंह रावत </strong> <span>(विधान सभा सदस्य, कोटद्वार)</span></h5>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul>
                    <li>
                      <h6>यमकेश्वर (पौरी गढ़वाल)</h6>
                    </li>
                    <li>
                      <h6>पार्टी: कांग्रेस </h6>
                    </li>
                    <li>
                      <h6>पद: विधायक, वि.स.स. (विधान सभा सदस्य, कोटद्वार)</h6>
                    </li>
                    <li>
                      <h6>पुत्र श्री: गजेंद्र सिंह रावत</h6>
                    </li>
                    <li>
                      <h6>जन्म: 14 नवंबर 1966</h6>
                    </li>
                    <li>
                      <h6>आयु: 56</h6>
                    </li>
                    <li>
                      <h6> मतदाता के रूप में नामांकित नाम: 41-कोटद्वार (उत्तराखंड) निर्वाचन क्षेत्र, क्रमांक 451 पर भाग
                        संख्या 101</h6>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>बारे में</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12 pt-4 pt-lg-0">
            <p>
              मैं शैलेंद्र सिंह रावत उत्तराखंड का राजनेता हूँ । मैं कोटद्वार से उत्तराखंड विधानसभा का पूर्व विधायक हूँ
              और भारतीय राष्ट्रीय कांग्रेस का सदस्य हूँ । मैं एन डी तिवारी, विजय बहुगुणा और हरीश रावत के मंत्रिमंडल में
              मंत्री था । मेरे शक्तिशाली
              राजनेताओं श्री चंद्र मोहन सिंह नेगी और गिरधारी लाल अमोली के साथ घनिष्ठ राजनीतिक संबंध हैं।
            </p>
          </div>
          <div class="col-lg-12 text-center">
            <a href="https://myneta.info/uttarakhand2017/candidate.php?candidate_id=524" class="btn-learn-more">और
              पढ़े</a>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>हमारी प्रेरणा</h2>
        </div>

        <div class="row">
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/Mahatma-Gandhi.jpg" class="img-fluid" alt="">
              <div class="para-title">
                <h4>महात्मा गांधी</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <img src="assets/img/Jnehru.jpg" class="img-fluid" alt="">
              <div class="para-title">
                <h4>पंडित जवाहरलाल नेहरू</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <img src="assets/img/Sardar-Vallabhbhai-Patel.jpg" class="img-fluid" alt="">
              <div class="para-title">
                <h4>सरदार वल्लभभाई पटेल</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Portfoio Section ======= -->
    <section id="portfolio" class="portfoio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>गैलरी</h2>
        </div>

        <div class="row text-center">
          <div class="col-md-12 mb-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <img src="assets/img/gl1.jpg" class="img-fluid w-100" alt="">
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/gl2.jpg" class="img-fluid w-100" alt="">
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <img src="assets/img/gl3.jpg" class="img-fluid w-100" alt="">
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <img src="assets/img/gl4.jpg" class="img-fluid w-100" alt="">
            </div>
          </div>
          <div class="col-md-12 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <img src="assets/img/gl6.png" class="img-fluid w-100" alt="">
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Portfoio Section -->

    <section id="supporter" class="supporter section-bg">
      <div class="container">

        <div class="section-title">
          <h2>समर्थक</h2>
        </div>

        <div class="row text-center">
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/soniyagandhi.jpg" class="img-fluid" alt="">
              <div class="card-body">
                <h5 class="card-title">सोनिया गांधी</h5>
                <p class="card-text">आईएनसी. अध्यक्ष</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/manmohansingh.jpg" class="img-fluid" alt="">
              <div class="card-body">
                <h5 class="card-title">मनमोहन सिंह</h5>
                <p class="card-text">भारत के 13वें प्रधानमंत्री</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/Rahul_Gandhi.jpg" class="img-fluid" alt="">
              <div class="card-body">
                <h5 class="card-title">राहुल गांधी</h5>
                <p class="card-text">सांसद, लोकसभा</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- # meeting -->
    <section id="meeting" class="meeting">
      <div class="container">

        <div class="section-title">
          <h2>बैठक</h2>
        </div>

        <div class="row">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/cr6.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/cr2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/cr3.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/cr4.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/cr5.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev icon" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span><i class="bi bi-arrow-left-circle-fill"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next icon" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
              <span><i class="bi bi-arrow-right-circle-fill"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container shadow p-3" data-aos="fade-up">

        <div class="section-title">
          <h2>संपर्क</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>पता:</h4>
                <p>कोटद्वार, उत्तराखंड, भारत</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>ईमेल:</h4>
                <p>shailendrarawatyamkeswer@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>फोन:</h4>
                <p>+91 7453973944</p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

          <form action="" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $name_first ?>"
                                        placeholder="आपका नाम">
                                    <span class="err"><?php echo $name_err ?></span>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email_first ?>"
                                        placeholder="आपका ईमेल">
                                    <span class="err"><?php echo $email_err ?></span>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $subject_first ?>" placeholder="विषय">
                                <span class="err"><?php echo $subject_err ?></span>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="संदेश"><?php echo $message_first ?></textarea>
                                <span class="err"><?php echo $message_err ?></span>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" name="contact_us">संदेश भेजें</button></div>
                        </form>

          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-top-1">
      <div class="container py-3">
        <div class="row my-3 text-center">
          <div class="col-md-6 mb-4" data-aos="fade-up">
            <h4>फेसबुक</h4>
            <aside class="widget" style="width: auto;">
              <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100074900967902"
                data-tabs="timeline" data-width="480" data-height="450" data-small-header="false"
                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <div cite="https://www.facebook.com/profile.php?id=100074900967902"
                  class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/profile.php?id=100074900967902">Facebook</a></div>
              </div>
              <div class="textwidget custom-html-widget">
                <script async src="https://connect.facebook.net/hi_IN/sdk.js#xfbml=1&version=v11.0"
                  nonce="gMaj3cox"></script>
              </div>
            </aside>
          </div>
          <div class="col-lg-6 mb-4" data-aos="fade-up">
            <h4>ट्विटर</h4>
            <aside id="custom_html-3" style="width: auto;" class="widget_text widget widget_custom_html">
              <div class="textwidget custom-html-widget"><a class="twitter-timeline" data-width="480" data-height="450"
                  href="#">Tweets by BJP4Bjinor</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 footer-contact">
            <h4>संपर्क करें</h4>
            <p>
              कोटद्वार, उत्तराखंड, भारत<br>
              <br>
              <strong>मोबाइल:</strong> +91 7453973944<br>
              <strong>ईमेल:</strong> shailendrarawatyamkeswer@gmail.com<br>
            </p>
          </div>
          <div class="col-lg-2 col-md-4 footer-links">
            <h4>उपयोगी लिंक</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="./">होम</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">बारे में</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="">टर्म्स ऑफ़ सर्विस</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="https://zoyoecommerce.com/privacypolicy.php">प्राइवेसी
                  पॉलिसी</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-4 footer-info">
            <h3>सामाजिक कड़ियाँ</h3>
            <div class="social-links mt-3">
              <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/people/Shailendra-Singh-Rawat/100074900967902/" class="facebook"><i
                  class="bx bxl-facebook"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 footer-info footer-newsletter">
            <h3>समाचार पत्रिका</h3>
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; 2021 Copyright <strong><span>Shailendra Singh Rawat</span></strong>, All Rights Reserved.
      </div>
      <div class="credits">
        Developed by: <a href="https://zoyoecommerce.com/">Zoyo Ecommerce Pvt. Ltd.</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <!-- JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>