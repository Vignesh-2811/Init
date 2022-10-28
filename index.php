<?php
error_reporting(E_ERROR | E_PARSE);

include('includes/header.php');
include('includes/hero.php');
include('functions/userfunctions.php');
// include('includes/gossip.php');
?>

<!-- ======= Gossips Section ======= -->
<section id="services" class="services">
  <div class="container">
  <div class="row">
      <div class="col-md-12">


    <div class="section-title">
      <span>Today's Gossips</span>
      <h2>Today's Gossips</h2>
      <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
    </div>
    <!-- <div class="container"> -->
   

        <div class="row">
          <?php
          $announcements = getAllActive("announcement");

          if (mysqli_num_rows($announcements) > 0) {
            foreach ($announcements as $item) {

          ?>


              <div class="col-lg-4 col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                
                <!-- <div class="icon-box"> -->
                <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
                <div class="card shadow">
                  <div class="card-body">
              <h5><?= $item['club']; ?></h5>

                    <img src="uploads/<?= $item['poster']; ?>" alt="poster" height="175em" width="350em">
                    <h4><a href="products.php?announcement=<?= $item['slug']; ?>"><?= $item['title']; ?></a></h4>
                    <p><?= $item['shortdescription']; ?></p>
                  </div>
                </div>
              </div>
    <?php
            }
          } else {
            echo "No data available";
          }


    ?>

    <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="450">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="750">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div> -->

      </div>
    </div>
        </div>
        </div>
  </div>
</section><!-- End Gossips Section -->




<?php
include('includes/footer.php');
?>