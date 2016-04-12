<?php
//Find score of tester; male art professions
$art_male_tester_scores        = TestFase::tester_scores(1, 1, "male");
//Find score of tester; female art professions
$art_female_tester_scores      = TestFase::tester_scores(1, 1, "female");
//Find score of tester; male art professions
$tech_male_tester_scores       = TestFase::tester_scores(1, 2, "male");
//Find score of tester; female art professions
$tech_female_tester_scores     = TestFase::tester_scores(1, 2, "female");

//Find totals for tester
$art_male_tester_total         = TestFase::total_scores($art_male_tester_scores);
$art_female_tester_total       = TestFase::total_scores($art_female_tester_scores);
$tech_male_tester_total        = TestFase::total_scores($tech_male_tester_scores);
$tech_female_tester_total      = TestFase::total_scores($tech_female_tester_scores);

//Find score of all testers; male art professions
$art_male_testers_scores       = TestFase::testers_scores(1, "male");
//Find score of all testers; female art professions
$art_female_testers_scores     = TestFase::testers_scores(1, "female");
//Find score of all testers; male art professions
$tech_male_testers_scores      = TestFase::testers_scores(2, "male");
//Find score of all testers; female art professions
$tech_female_testers_scores    = TestFase::testers_scores(2, "female");

//Amount of testers
$tester_amount                 = TestFase::tester_amount();

//Find mean of all testers
$art_male_testers_mean         = TestFase::mean_scores($art_male_testers_scores, $tester_amount);
$art_female_testers_mean       = TestFase::mean_scores($art_female_testers_scores, $tester_amount);
$tech_male_testers_mean        = TestFase::mean_scores($tech_male_testers_scores, $tester_amount);
$tech_female_testers_mean      = TestFase::mean_scores($tech_female_testers_scores, $tester_amount);
?>

<script>
  //Art data set
  var data_art = {
    labels: ["Man", "Vrouw"],
    datasets: [
        {
            label: "Tester",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [<?php echo $art_male_tester_total.",".$art_female_tester_total ?>]
        },
        {
            label: "Gemiddelde",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php echo $art_male_testers_mean.",".$art_female_testers_mean ?>]
        }
    ]
  };

  //Technology data set
  var data_tech = {
    labels: ["Man", "Vrouw"],
    datasets: [
        {
            label: "Tester",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [<?php echo $tech_male_tester_total.",".$tech_female_tester_total ?>]
        },
        {
            label: "Gemiddelde",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php echo $tech_male_testers_mean.",".$tech_female_testers_mean ?>]
        }
    ]
  };

  var ct_art  = document.getElementById("chart-art").getContext("2d");
  var ch_art  = new Chart(ct_art).Bar(data_art);

  var ct_tech = document.getElementById("chart-tech").getContext("2d");
  var ch_tech = new Chart(ct_tech).Bar(data_tech);
</script>