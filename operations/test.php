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
    //Find art specific professions
    $art_specifics        = Profession::random_art($this->branch_amount);
    //Find technology specific professions
    $tech_specifics       = Profession::random_tech($this->branch_amount);
    //Merge art and technology specific profession, then shuffle them
    $branch_specifics     = $art_specifics->merge($tech_specifics)->shuffle();
    $term_expression      = "";

    //Loop all specifics
    foreach($branch_specifics as $key => $branch_specific) {

      //Find terms
      $terms = $branch_specific->desired_terms();
      foreach($terms as $term) {

        $term_expression = isset($term->term) ? $term->term : "";
        $expression_id   = "";
        switch(true) {
          case $term->is_material:
            $expression_id = Expression::where("expression", "material")->first()->id;
            break;
          case $term->is_technique:
            $expression_id = Expression::where("expression", "technique")->first()->id;
            break;
          case $term->is_result:
            $expression_id = Expression::where("expression", "result")->first()->id;
            break;
          case $term->is_proces:
            $expression_id = Expression::where("expression", "proces")->first()->id;
            break;
          case $term->is_method:
            $expression_id = Expression::where("expression", "method")->first()->id;
            break;
          case $term->is_company:
            $expression_id = Expression::where("expression", "company")->first()->id;
            break;
          case $term->is_exposure:
            $expression_id = Expression::where("expression", "exposure")->first()->id;
            break;
        }

        //Nothing usefull..
        if($term_expression == "") $term_expression = $term->term;
      }

      //General information about profession
      $profession_id = $branch_specific->id;
      $branch_id     = $branch_specific->branch_id;

      //Find males and females
      if ($key % 2 == 0) {
        $profession = $branch_specific->profession_male;

        $this->fases[] = [
          "male"          => 1,
          "female"        => 0,
          "profession"    => $profession,
          "expression"    => $term_expression,

          "branch_id"     => $branch_id,
          "profession_id" => $profession_id,
          "expression_id" => $expression_id,
          "gender"        => "male"
        ];
      } else {
        $profession = $branch_specific->profession_female;

        $this->fases[] = [
          "male"          => 0,
          "female"        => 1,
          "profession"    => $profession,
          "expression"    => $term_expression,

          "branch_id"     => $branch_id,
          "profession_id" => $profession_id,
          "expression_id" => $expression_id,
          "gender"        => "female"
        ];
      }

    }

    $json = json_encode( $this->fases );
    file_put_contents("tmp/test.json" , $json);

  }

}