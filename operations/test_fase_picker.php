<?php

/*
TRY OUT: to improve /operations/test.php with better algorithm
to pick fase two combination terms: profession and expression term.

Eisen
Loop steeds
Zijn er al genoeg branch term
Pak branch term
Wordt dit een man. of vrouw. vorm? Is de gender array al gevuld?
Heeft dit beroep genoeg van alle kunstuitingen
*/

require('../vendor/autoload.php');
require('../config/database.php');

class TestFaseOperator {

  //Amount of fases of test: 40 general fases
  public $fase_amount         = 40;
  //Amount of branch specific: 20 branch fases of 40 general fases
  public $branch_amount       = 20;
  //Amount of gender specific: 10 gender fases of 20 branch fases
  public $gender_amount       = 10;
  //Amount of expression specific: 5 expression fases of 10 gender fases
  public $expression_amount   = 5;

  public $test_fases = [];

  public function make() {
    //Eisen
    //Loop steeds
    //Zijn er al genoeg branch terms
    //Pak branch term
    //Wordt dit een man. of vrouw. vorm? Is de gender array al gevuld?
    //Heeft dit beroep genoeg van alle kunstuitingen


    //Find branches
    $branches = Branch::all();

    //Loop until test fase picker is done
    while(true) {

      //Loop all branches
      foreach($branches as $branch) {
        $branch_id = $branch->id;

        //Test needs more terms of certain branch
        if(count($test_fases[$branch_id]) != $this->branch_amount) {

          echo "Test needs more professions of certain branch"."<br>";
          $branch_profession = Profession::where("branch_id", $branch_id)->first();

          $used_gender = false;
          //Test needs more gender specific terms for branch
          if(count($this->test_fases[$branch_id]["males"]) != $this->gender_amount && $used_gender == false) {

            echo "Test needs more male professions for branch"."<br>";
            $this->test_fases[$branch_id]["males"][]["profession"] = $branch_profession->profession_male;

            $used_gender = true;
          }
          if(count($this->test_fases[$branch_id]["females"]) != $this->gender_amount && $used_gender == false) {

            echo "Test needs more female professions for branch"."<br>";
            $this->test_fases[$branch_id]["females"][]["profession"] = $branch_profession->profession_female;

            $used_gender = true;
          }
          $used_gender = false;

        } else {
          //Done filling
          break;
        }
      }
      break;

    }

    print_r($this->test_fases);

  }
}

$tfo = new TestFaseOperator();
$tfo->make();