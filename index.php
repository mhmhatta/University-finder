<?php
$thisPage = "home";
include('assets/checkconnect.php');
include('assets/headerIndex.php');

//Load Library
require_once realpath(__DIR__ . '') . "/vendor/autoload.php";
require_once __DIR__ . "/html_tag_helpers.php";

$uri_rdf = 'http://localhost/TUBES_WS/berita.rdf';
$data = \EasyRdf\Graph::newAndLoad($uri_rdf);
$doc = $data->primaryTopic();
?>

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg">
  <div class="container">

    <div class="row">

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">

      </div>

    </div>

  </div>


</section><!-- End Clients Section -->
</main><!-- End #main -->

<br><br>
<div class="container" data-aos="fade-up">
  <div class="section-title">
    <h2>TOP 7 University Around The World</h2>
  </div>
  <div class="row ml-3 mr-3">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
      <table class="table">
        <tr>
          <thead class="table-dark">
            <td>#</td>
            <td>Nama Universitas</td>
            <td>Lokasi</td>
            <td>Skor</td>
            <td></td>
          </thead>
          <tbody></tbody>
          <?php
          include "koneksi.php";
          $no = 1;
          $query = mysqli_query($kon, 'SELECT * FROM top_uni');
          while ($data = mysqli_fetch_array($query)) {
          ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $data['name'] ?></td>
          <td><?php echo $data['locate'] ?></td>
          <td><?php echo $data['score'] ?></td>
        </tr>
      <?php
          }
      ?>
      </tbody>
      </tr>
      </table>
    </div>
  </div>

  <br> <br>
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>NEWS EDUCATION</h2>
    </div>
    <div class="row ml-3 mr-3">

      <?php foreach ($doc->all('foaf:HB') as $hn) { ?>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="card">
            <img src="<?= $hn->get('foaf:img'); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="card-title">
                <h4><?= $hn->get('foaf:title'); ?></h4>
              </div>
              <span style="font-weight: 600;"><?= $hn->get('foaf:tanggal'); ?> <br> </span>
              <?= $hn->get('foaf:isi'); ?>
            </div>
            <div class="card-footer">
              <a href="<?= $hn->get('foaf:link_berita'); ?>" class="btn btn-outline-success">Read More</a>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php foreach ($doc->all('foaf:HB1') as $hn1) { ?>
        <div class="col-md-6 col-sm-6 mb-3">
          <div class="card">
            <img src="<?= $hn1->get('foaf:img'); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="card-title">
                <h4><?= $hn1->get('foaf:title'); ?> </h4>
              </div>
              <span style="font-weight: 600;"><?= $hn->get('foaf:tanggal'); ?> <br></span>
              <?= $hn1->get('foaf:isi'); ?>
            </div>
            <div class="card-footer">
              <a href="<?= $hn1->get('foaf:link_berita'); ?>" class="btn btn-outline-success">Read More</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>

  <!-- OUR TEAM -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>OUR TEAM</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/172772.jpg" class="testimonial-img" alt="">
              <h3>Muhammad Hatta Abdillah</h3>
              <h4>211402110</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/Gery.jpeg" class="testimonial-img" alt="">
              <h3>Gery Jonathan Manurung</h3>
              <h4>211402137</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/Bill.jpeg" class="testimonial-img" alt="">
              <h3>Bill Clinton</h3>
              <h4>201402083</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/Ridho.jpeg" class="testimonial-img" alt="">
              <h3>Ridho P Sibuea</h3>
              <h4>211402014</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/nadya.jpeg" class="testimonial-img" alt="">
              <h3>Nadya Ruth Purba</h3>
              <h4>211402154</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="images/Jessica.jpeg" class="testimonial-img" alt="">
              <h3>Jessica Larasty Meliala </h3>
              <h4>211402116</h4>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <?php include('assets/footer.php'); ?>