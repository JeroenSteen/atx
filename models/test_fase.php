<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TestFase extends Eloquent {

  protected $table = 'test_fases';

  //Find amount of testers
  public function tester_amount() {
    return count(TestFase::groupBy("tester")->get());
  }

  //Find latest tester id, increment for newest tester id
  public function latest_tester_id() {
    $latest_tester = TestFase::orderBy("tester", "desc")->first();

    if(count($latest_tester)) {
      return $latest_tester->tester;
    } else {
      return 0;
    }
  }

  //Mean of time of specific tester
  public function tester_scores($tester_id, $branch_id, $gender) {

    if($gender == "male") {

      return ( TestFase::where([
        "tester"      => $tester_id,
        "branch_id"   => $branch_id,
        "gender"      => "male"
        ])->get());

    } else if ($gender == "female") {

     return ( TestFase::where([
        "tester"      => $tester_id,
        "branch_id"   => $branch_id,
        "gender"      => "female"
        ])->get());

    }

  }
  //Mean of time of all testers
  public function testers_scores($branch_id, $gender) {

    if($gender == "male") {

      return ( TestFase::where([
        "branch_id"   => $branch_id,
        "gender"      => "male"
        ])->get());

    } else if ($gender == "female") {

     return ( TestFase::where([
        "branch_id"   => $branch_id,
        "gender"      => "female"
        ])->get());

    }

  }

  public function total_scores($scores) {
    //Total of scores in millisecond
    $total = 0;

    //Loop all scores
    foreach($scores as $score) {
      $total += $score->milliseconds;
    }

    return $total;
  }

  public function mean_scores($scores, $testers) {
    //Number of scores
    $count = count($scores);
    //Total of scores in millisecond
    $total = 0;

    //Loop all scores
    foreach($scores as $score) {
      $total += $score->milliseconds;
    }

    return $total / 1;
  }

}