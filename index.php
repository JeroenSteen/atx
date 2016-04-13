<?php
//phpinfo();

require('vendor/autoload.php');
require('config/database.php');

//$test_op  = new TestOperator();
//$fases    = $test_op->make();
?>

<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ATX</title>
  <meta name="description" content="Art & Technologie (E)xperiments">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav>
      <div class="nav-wrapper">
        <div class="container">
          <a class="brand-logo">
            ATX
          </a>
        </div>
      </div>
    </nav>

    <div class="container mt-10">
      <div class="row">
        <div class="col s12 m12 l12 tac">

          <?php include("_button.php"); ?>

        </div>
      </div>
    </div>

    <div class="container mt-10">

      <?php include("_charts.php"); ?>

    </div>

    <script src="https://code.jquery.com/jquery-1.12.2.min.js"></script>
    <script src="css/materialize/js/materialize.min.js"></script>
    <script src="js/chartjs/Chart.min.js"></script>
    <script src="js/uri/src/URI.min.js"></script>

    <script src="js/moment-with-locales.js"></script>
    <script src="js/moment-timezone-with-data.js"></script>
    <script src="js/interaction.js"></script>

    <?php include("_data.php"); ?>

  </body>
</html>

