<?php

class TestOperator {

  //Amount of fases of test
  public $fase_amount         = 40; //40 general fases
  //Amount of branch specific
  public $branch_amount       = 20; //20 branch fases of 40 general fases
  //Amount of gender specific
  public $gender_amount       = 10; //10 gender fases of 20 branch fases
  //Amount of expression specific
  public $expression_amount   = 5; //5 expression fases of 10 gender fases

  //Fases of test, with profession + material or technique
  public $fases = [];

  public function TestOperator() {
  }

  public function make() {

    $art_specifics        = Profession::random_art($this->branch_amount);
    $tech_specifics       = Profession::random_tech($this->branch_amount);
    $branch_specifics     = $art_specifics->merge($tech_specifics);
    $term_expression      = "";

    //Loop all specifics
    foreach($branch_specifics as $key => $branch_specific) {

      //Find terms
      $terms = $branch_specific->terms();
      foreach($terms as $term) {
        if($term->is_material) $term_expression = $term->term;
        if($term->is_technique) $term_expression = $term->term;
        if($term->is_result) $term_expression = $term->term;
        if($term->is_proces) $term_expression = $term->term;
        if($term->is_method) $term_expression = $term->term;

        if($term_expression == "") $term_expression = $term->term;
      }

      //Find males and females
      if ($key % 2 == 0) {
        $profession = $branch_specific->profession_male;

        $this->fases[] = [
          "male"        => 1,
          "female"      => 0,
          "profession"  => $profession,
          "expression"  => $term_expression
        ];
      } else {
        $profession = $branch_specific->profession_female;

        $this->fases[] = [
          "male"        => 0,
          "female"      => 1,
          "profession"  => $profession,
          "expression"  => $term_expression
        ];
      }

    }

    $json = json_encode( $this->fases );
    file_put_contents("tmp/test.json" , $json);

  }

}