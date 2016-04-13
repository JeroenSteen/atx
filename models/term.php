<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Term extends Eloquent {

  protected $table = 'terms';
  public $timestamps = false;

  public static function random() {
    //Find all terms, fake random
    $terms    = Term::lists("id")->toArray();

    //Take one random term by term id
    $term_id  = array_rand($terms, 1);

    //Return random term
    return Term::find($term_id);
  }

  public function profession() {
    return $this->belongsTo('Profession');
  }

}