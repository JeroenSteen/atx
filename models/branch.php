<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Branch extends Eloquent {

  protected $table = 'branches';

  public function professions() {
    return $this->hasMany('Profession', 'branch_id', 'id')->with('Profession');
  }

}