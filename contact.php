<?php
error_reporting(E_ERROR | E_PARSE);

include('includes/header.php');
include('functions/userfunctions.php');
// include('includes/gossip.php');
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

    <div class="section-title" data-aos="zoom-out">
        <h2>Contact</h2>
        <p>Contact Us</p>
    </div>

    <div class="row mt-5">

        <div class="col-lg-4" data-aos="fade-right">
            <div class="info">

                <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
                </div>

                <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 99419 49400</p>
                </div>

            </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
        <style>
            button {
                background: #cc1616;
                border: 0;
                padding: 10px 24px;
                color: #fff;
                transition: 0.4s;
        }
        </style>
        <form action="functions/message.php" method="post" role="form">
            <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required/>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required/>
            </div>
            </div>
            <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
            </div>
            <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3"></div>
            <div class="text-center"><button type="submit" name="contact_message">Send Message</button></div>
        </form>

        </div>

    </div>

    </div>
</section><!-- End Contact Section -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<?php
include('includes/footer.php');
?>
