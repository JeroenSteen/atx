<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Profession extends Eloquent {

  protected $table = 'professions';

  public static function random_art($amount) {
    return Profession::where("branch_id", 1)->orderByRaw("RAND()")->take($amount)->get();
  }
  public static function random_tech($amount) {
    return Profession::where("branch_id", 2)->orderByRaw("RAND()")->take($amount)->get();
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

  public function terms() {
    //return $this->hasManyThrough('Term', 'Profession_Term', 'term_id', 'id')->get();
    //return $this->hasManyThrough('Term', 'Profession_Term', 'profession_id', 'id')->get();
    return $this->belongsToMany('Term', 'profession_terms', 'profession_id', 'term_id')->get();
  }

}