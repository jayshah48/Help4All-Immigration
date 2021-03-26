<html>
    <head>
        <title> Help4All :: Contact Us </title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href= "assets/css/style.css" rel="stylesheet">
        <link href="assets/img/favicon.png" rel="icon">

        <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    </head>
    
    <body>
        <header id = "header" class = "fixed-top header-transparent">
            <div class = "container d-flex align-items-center">
                <div class = "logo mr-auto">
                    <h1 class = "text-light"><a href = "index.html"> <span> Help4All </span> </a> </h1>
                </div>
                <nav class = "nav-menu d-none d-lg-block">
                    <ul>
                        <li> <span><a href = "index.html">Home </a></span></li>
                        <li> <a href = "aboutus.html"> About Us </a> </li>
                        <li> <a href = "guides.html"> Guides </a> </li>
                        <li> <a href = "#services"> Services </a> </li>
                        <li> <a href = "#team"> Team </a> </li>
                        <li> <a href = "contactus.php"> Contact Us </a> </li>
                    </ul>
            </div>
        </header> 
        <!-- Banner Image-->
        <section id = "banner" class = "banner">
            <div class="banner-container">
                <h1> Welcome to Help4All Immigration </h1>
                <h2> We are here to help international immigrants </h2>
            </div>
        </section> <!-- End Banner-->

        <!--Guides-->

        <section id = "contactform" class = "contactform">
            <div class = "container">
                <div class = "section-title">
                <h2>Any Questions?</h2>
                <p style="text-align: center;">If you have any questions you may contact us by filling up the form below.</p>
                </div>

                <?php
                require 'mysqli_connect.php';
                function redirect_user($page = 'index.html'){
                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url = rtrim($url, '/\\');
                    $url .= '/'.$page;
                    header("Location: $url");
                    exit();
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $q = 'INSERT INTO queries (name, email, phone, city, province, subject, description) VALUES (?, ?, ?, ?, ?, ?, ?)';

                    $stmt = $mysqli->prepare($q);

                    $stmt->bind_param('sssssss', $user, $email, $phone, $city, $province, $sub, $desc);

                    $user = strip_tags($_POST['uname']);
                    $email = strip_tags($_POST['email']);
                    $phone = strip_tags($_POST['phone']);
                    $city = strip_tags($_POST['city']);
                    $province = strip_tags($_POST['province']);
                    $sub = strip_tags($_POST['subject']);
                    $desc = strip_tags($_POST['description']);

                    $stmt->execute();
                    
                    if ($stmt->affected_rows == 1) {
                        echo '<script>alert("Successfully registered your request. We will get back to you at the earliest.")</script>';
                        // redirect_user('contactus.php');
                    } else {
                        echo '<script>alert("Failed to register your request. Please try again!")</script>';
                    }

                    $stmt->close();
                    unset($stmt);
                    $mysqli->close();
                    unset($mysqli);
                }
                ?>

                <div id="contact-form-div">
                    <form id="contact-query-form" action="contactus.php" method="post">
                        <p><label>Name:</label><input type="text" name="uname" size="15" maxlength="60"></p>
                        <p><label>Email:</label><input type="email" name="email" size="15" maxlength="60" required></p>
                        <p><label>Phone:</label><input type="phone" name="phone" size="15" maxlength="10"></p>
                        <p><label>City:</label><input type="text" name="city" size="15" maxlength="60" required></p>
                        <p><label>Province:</label><select name="province">
                            <option value="alberta" selected>Alberta</option>
                            <option value="bc">British Columbia</option>
                            <option value="manitoba">Manitoba</option>
                            <option value="newbrunswick">New Brunswick</option>
                            <option value="newfoundland">Newfoundland and Labrador</option>
                            <option value="nwterritories">Northwest Territories</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="nunavut">Nunavut</option>
                            <option value="ontario">Ontario</option>
                            <option value="pei">Prince Edward Island</option>
                            <option value="quebec">Quebec</option>
                            <option value="saskatchewan">Saskatchewan</option>
                            <option value="yukon">Yukon</option>
                        </select></p>
                        <p><label>Subject:</label><select name="subject">
                            <option value="sim" selected>SIM Card</option>
                            <option value="sin">SIN (Social Insurance Number)</option>
                            <option value="driverLicence">Driver's Licence</option>
                            <option value="otherLicence">Other Licence</option>
                            <option value="essentials">Essential Items</option>
                            <option value="studyPermit">Study Permit</option>
                            <option value="workPermit">Work Permit</option>
                            <option value="permitExtension">Visa and Permit Extension</option>
                            <option value="incometax">Income Tax</option>
                            <option value="safety">Safety and Security</option>
                            <option value="other">Other</option>
                        </select></p>
                        <p><label>Description:</label><textarea name="description" rows="7" cols="60" maxlength="250" required></textarea></p>
                        <p><label></label><input class="query-submit-btn" type="submit" value="Send"></p>
                    </form>
                </div>
            </div>
        </section>

    <!-- Contact -->
    <section id = "contact" class = "contact section-bg">
        <div class = "container">
            <div class = "section-title">
                <h2> Contact </h2>
                <p> Please get in touch and our experts will answer all your questions. </p>
            </div>
            <div>
            
            <div class = "row">
                <div class="col-lg-6">
                    <div class = "info-box mb-4">
                        <i class = "bx bx-map"></i>
                        <h3> Our Address </h3>
                        <p> 280 Thaler Avenue, Kitchener, N2A1R6 </p>
                    </div>
                </div>
                <div class = "col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                    <i class = "bx bx-envelope"></i>
                    <h3> Email Us </h3>
                    <p> contact@example.com </p>
                    </div>
                </div>
                <div class = "col-lg-3 col-md-6">
                    <div class = "info-box mb-4">
                        <i class = "bx bx-phone-call"></i>
                        <h3> Call Us </h3>
                        <p> +1 5197223398 </p>
                    </div>
                </div>
            </div>
            <div class = "row">
            
                <div class = "col-lg-12">
                <iframe class = "mb-4 mg-lg-0" src="https://www.google.com/maps/embed/v1/place?q=280+thaler+avenue&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 col-md-8">
            <div class="footer-info" data-aos="fade-up" data-aos-delay="50">
              <h3>Help4All</h3>
              <p class="pb-3"><em>We are here to help international immigrants.</em></p>
              <p>
                280 Thaler Avenue <br>
                Kitchener, N2A1R6, Canada<br><br>
                <strong>Phone:</strong> +1 5197223398<br>
                <strong>Email:</strong> contact@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" >
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="aboutus.html">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="guides.html">Guides</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contactus.php">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">A</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">B</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">C</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">D</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">E</a></li>
            </ul>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2021 <strong><span>Help4All</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

        <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>

</html>