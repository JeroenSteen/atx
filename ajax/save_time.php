<?php

require('../vendor/autoload.php');
require('../config/database.php');

if(isset($_POST["begin_time"]) && isset($_POST["end_time"]) && isset($_POST["tester"]) && isset($_POST["milliseconds"])) {
  $begin_time      = $_POST["begin_time"];
  $end_time        = $_POST["end_time"];
  $tester          = $_POST["tester"];
  $milliseconds    = $_POST["milliseconds"];
  $branch_id       = $_POST["branch_id"];
  $profession_id   = $_POST["profession_id"];
  $expression_id   = $_POST["expression_id"];
  $gender          = $_POST["gender"];

  $fase                 = new TestFase();
  $fase->begin_time     = $begin_time;
  $fase->end_time       = $end_time;
  $fase->tester         = $tester;
  $fase->milliseconds   = $milliseconds;
  $fase->branch_id      = $branch_id;
  $fase->profession_id  = $profession_id;
  $fase->expression_id  = $expression_id;
  $fase->gender         = $gender;

  $fase->save();

}