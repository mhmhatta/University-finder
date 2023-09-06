<?php
$thisPage = "home";
include('assets/checkconnect.php');
include('assets/headerdtl.php');

//Load Library
require_once "lib/EasyRdf.php";
// Deklarasi namespace
EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
EasyRdf_Namespace::set('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');

// Asal pengambilan data
$sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
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
  <div class="row ml-3 mr-3">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
      <?php if (!empty($_GET['detail'])) {
        $ind = $sparql->query(
          'SELECT (SAMPLE(?nama) as ?name) (SAMPLE(?abstract) as ?abstrak) (SAMPLE(?motto) as ?moto) ?lat ?long WHERE {' .
            '<' . $_GET['detail'] . '> dbp:name ?nama;' .
            'dbo:abstract ?abstract;' .
            'dbp:motto ?motto;' .
            'geo:lat ?lat;' .
            'geo:long ?long.' .
            'FILTER(lang(?abstract) = "en").' .
            '}'
        );

        echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                  <table class='table'>
                    <thead>
                      <tr>
                      </tr>
                      <tr>
                      </tr>

                    </thead>
                    <tbody class='table-group-divider'>";

        $no = 1;
        foreach ($ind as $r) {
          echo "<tr>
                        <th scope='row'>Name</th>
                        <td>'" . $r->name . "'</td>
                      </tr>
                      <tr>
                        <th scope='row'>Motto</th>
                        <td>'" . $r->moto . "'</td>
                      </tr>
                      <tr>
                        <th scope='row'>Abstract</th>
                        <td>'" . $r->abstrak . "'</td>
                      </tr>
                      <tr>
                        <th scope='row'>Location</th>
                          <td><iframe width='100%' height='500'
                            src='https://maps.google.com/maps?q=" . $r->lat . "," . $r->long . "&output=embed'></iframe>
                          </td>
                      </tr>";
        }
      } ?>
    </div>
  </div>

  <div class="fixed-bottom">
    <footer>
      <?php include('assets/footer.php'); ?>
    </footer>