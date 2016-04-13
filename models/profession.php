<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Profession extends Eloquent {

  protected $table = 'professions';
  public $timestamps = false;


  /*public static function random_branch($amount, $branch_id) {
    return Profession::where("branch_id", $branch_id)
      ->orderByRaw("RAND()")
      ->take($amount)
      ->get();
  }*/
  public static function random_art($amount) {
    return Profession::where("branch_id", 1)
      ->orderByRaw("RAND()")
      ->take($amount)
      ->get();
  }
  public static function random_tech($amount) {
    return Profession::where("branch_id", 2)
      ->orderByRaw("RAND()")
      ->take($amount)
      ->get();
  }

  public static function random() {
    //Find random profession
    return Profession::orderByRaw("RAND()")->first();
  }

  public static function female() {
    return $this->profession_female;
  }

  public static function male() {
    return $this->profession_male;
  }

  public function branch() {
    return $this->belongsTo('Branch');
  }

  //Find terms performed by a profession
  public function terms() {
    //return $this->hasManyThrough('Term', 'Profession_Term', 'term_id', 'id')->get();
    //return $this->hasManyThrough('Term', 'Profession_Term', 'profession_id', 'id')->get();
    return $this->belongsToMany('Term', 'profession_terms', 'profession_id', 'term_id')->get();
  }

  //Increases the results of desired terms
  public function desired_terms() {
    //return $this->hasManyThrough('Term', 'Profession_Term', 'term_id', 'id')->get();
    //return $this->hasManyThrough('Term', 'Profession_Term', 'profession_id', 'id')->get();
    return $this->belongsToMany('Term', 'profession_terms', 'profession_id', 'term_id')->get();
      /*->orWhere("is_technique", true)
      ->orWhere("is_method", true)
      ->orWhere("is_proces", true)
      ->orWhere("is_material", true)
      ->orWhere("is_company", true)
      ->orWhere("is_exposure", true)
      ->orWhere("is_result", true)->get();*/
  }

}