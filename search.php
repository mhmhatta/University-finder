<?php
$thisPage = "search";
include('assets/checkconnect.php');

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>University</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://kit.fontawesome.com/866812587f.js" crossorigin="anonymous"></script>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- CSS only -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between header-portofolio">
      <h1 class="logo"><a href="index.php">U N I V E R S I T Y</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="" class="logo"><img src="assets/img/unesco.png" alt="" class="img-fluid"></a>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Find University at Your Country!</h1>
            <div class="text-center">
              <form action="search.php" method="GET">
              <div class="mb-3 justify-content-center">
                <input type="text" class="form-control rounded-pill w-80" placeholder="Enter a Country" id="exampleInputEmail1" aria-describedby="emailHelp" name="src"
                value="<?= @$_GET['cari'] ?>">
                <br><button class="btn btn-outline-success mb-3" type="submit">Cari</button>
              </div>
              </form>
              <form action="search.php" method="get">
                  <input type="hidden" name="ind" value="run">
                  <button class="btn btn-outline-success mb-3" type="submit">Indonesia</button>
                </form>
              <form action="search.php" method="get">
                      <input type="hidden" name="trky" value="run">
                      <button class="btn btn-outline-info mb-3" type="submit">Turkey</button>
                </form>
              <form action="search.php" method="get">
                      <input type="hidden" name="frnc" value="run">
                      <button class="btn btn-outline-warning mb-3" type="submit">France</button>
                </form>
              <form action="search.php" method="get">
                    <input type="hidden" name="jpn" value="run">
                    <button class="btn btn-outline-danger mb-3" type="submit">Japan</button>
                </form>
          </div>
          <div>
        </div>
        </div>
      </div>
      <?php
            if (!empty($_GET['src'])) {
              $src = $sparql->query(
                'SELECT ?univ ?name ?ngrname ?loc ?mhs WHERE {'.
                  '?univ dbo:type dbr:Public_university;'.
                  'dbp:name ?name;'.
                  'dbo:city ?kota;'.
                  'dbo:country ?ngr;'.
                  'dbo:numberOfStudents ?mhs.'.
                  '?ngr dbp:commonName ?ngrname.'.
                  '?kota dbp:name ?loc.'.
                  'FILTER(?ngr = dbr:'.str_replace(' ', '_', ucwords($_GET['src'])).' || ?kota = dbr:'.str_replace(' ', '_', ucwords($_GET['src'])).')'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Number of Students</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($src as $r) {
                echo "<tr>
                        <th scope='row'>".$no++."</th>
                        <td>".$r->name."</td>
                        <td>".$r->ngrname.", ".$r->loc."</td>
                        <td>".$r->mhs."</td>
                        <td>
                          <form action='detail.php' method='get'>
                          <input type='hidden' name='detail' value='$r->univ'>
                          <button class='btn btn-outline-secondary' type='submit'>Detail</button>
                          </form>
                        </td>
                      </tr>";
              }}?>
          <?php
            if (!empty($_GET['ind'])) {
              $ind = $sparql->query(
                'SELECT ?univ ?name ?ngrname ?loc ?mhs WHERE {'.
                  '?univ dbo:type dbr:Public_university;'.
                  'dbp:name ?name;'.
                  'dbo:city ?kota;'.
                  'dbo:numberOfStudents ?mhs;'.
                  'dbo:country ?ngr.'.
                  '?ngr dbp:commonName ?ngrname.'.
                  '?kota dbp:name ?loc.'.
                  'FILTER(?ngr = dbr:Indonesia)'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Number of Students</th>
                        <th scope='col'>rsrc</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($ind as $r) {
                echo "<tr>
                      <th scope='row'>".$no++."</th>
                      <td>".$r->name."</td>
                      <td>".$r->ngrname.", ".$r->loc."</td>
                      <td>".$r->mhs."</td>
                      <td>".$r->univ."</td>
                      <td>
                        <form action='detail.php' method='get'>
                        <input type='hidden' name='detail' value='$r->univ'>
                        <button class='btn btn-outline-secondary' type='submit'>Detail</button>
                        </form>
                      </td>
                      </tr>";
              }}?>
            <?php
            if (!empty($_GET['trky'])) {
              $ind = $sparql->query(
                'SELECT ?univ ?name ?ngrname ?loc ?mhs WHERE {'.
                  '?univ dbo:type dbr:Public_university;'.
                  'dbp:name ?name;'.
                  'dbo:city ?kota;'.
                  'dbo:numberOfStudents ?mhs;'.
                  'dbo:country ?ngr.'.
                  '?ngr dbp:commonName ?ngrname.'.
                  '?kota dbp:name ?loc.'.
                  'FILTER(?ngr = dbr:Turkey)'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Number of Students</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($ind as $r) {
                echo "<tr>
                      <th scope='row'>".$no++."</th>
                      <td>".$r->name."</td>
                      <td>".$r->ngrname.", ".$r->loc."</td>
                      <td>
                        <form action='detail.php' method='get'>
                        <input type='hidden' name='detail' value='$r->univ'>
                        <button class='btn btn-outline-secondary' type='submit'>Detail</button>
                        </form>
                      </td>
                      </tr>";
              }}?>
            <?php
            if (!empty($_GET['frnc'])) {
              $ind = $sparql->query(
                'SELECT ?univ ?name ?ngrname ?loc ?mhs WHERE {'.
                  '?univ dbo:type dbr:Public_university;'.
                  'dbp:name ?name;'.
                  'dbo:city ?kota;'.
                  'dbo:numberOfStudents ?mhs;'.
                  'dbo:country ?ngr.'.
                  '?ngr dbp:commonName ?ngrname.'.
                  '?kota dbp:name ?loc.'.
                  'FILTER(?ngr = dbr:France)'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Number of Students</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($ind as $r) {
                echo "<tr>
                      <th scope='row'>".$no++."</th>
                      <td>".$r->name."</td>
                      <td>".$r->ngrname.", ".$r->loc."</td>
                      <td>".$r->mhs."</td>
                      <td>
                        <form action='detail.php' method='get'>
                        <input type='hidden' name='detail' value='$r->univ'>
                        <button class='btn btn-outline-secondary' type='submit'>Detail</button>
                        </form>
                      </td>
                      </tr>";
              }}?>
            <?php
            if (!empty($_GET['jpn'])) {
              $ind = $sparql->query(
                'SELECT ?univ ?name ?ngrname ?loc ?mhs WHERE {'.
                  '?univ dbo:type dbr:Public_university;'.
                  'dbp:name ?name;'.
                  'dbo:city ?kota;'.
                  'dbo:numberOfStudents ?mhs;'.
                  'dbo:country ?ngr.'.
                  '?ngr dbp:commonName ?ngrname.'.
                  '?kota dbp:name ?loc.'.
                  'FILTER(?ngr = dbr:Japan)'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Number of Students</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($ind as $r) {
                echo "<tr>
                      <th scope='row'>".$no++."</th>
                      <td>".$r->name."</td>
                      <td>".$r->ngrname.", ".$r->loc."</td>
                      <td>".$r->mhs."</td>
                      <td>
                        <form action='detail.php' method='get'>
                        <input type='hidden' name='detail' value='$r->univ'>
                        <button class='btn btn-outline-secondary' type='submit'>Detail</button>
                        </form>
                      </td>
                      </tr>";
              }}?>
              <?php
            if (!empty($_GET['detail'])) {
              $ind = $sparql->query(
                'SELECT ?nama ?abstract ?motto ?lat ?long WHERE {'.
                  'dbr:Bandung_Institute_of_Technology dbp:name ?nama;'.
                                                     'dbo:abstract ?abstract;'.	
                                                     'dbp:motto ?motto;'.
                                                     'geo:lat ?lat;'.
                                                     'geo:long ?long.'.
               'FILTER(lang(?abstract) = "en").'.
                '}'
              );

              echo "<div class='container mb-3' data-aos='fade-up' style='height : auto; padding-bottom: 300px;'>
                    <div class='section-title'>
                      <h2>Daftar Universitas</h2>
                    </div>
                  <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>University</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>abstract</th>
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <tbody class='table-group-divider'>";

              $no = 1;
              foreach ($ind as $r) {
                echo "<tr>
                      <th scope='row'>".$no++."</th>
                      <td>".$r->nama."</td>
                      <td>".$r->lat."</td>
                      <td>".$r->motto."</td>
                      <td>".$r->abstract."</td>
                      </tr>";
              }}?>
    </div>
  </section><!-- End Hero -->
</body>

<div class="fixed-bottom">
  <footer >
  <?php include('assets/footer.php'); ?>
</footer>