<?php


class StateOperator {

  public function is_state($check_state) {

    if(isset($_GET["state"])) {
      $current_state = $_GET["state"];
      if($current_state == $check_state) {
        return true;
      }
    }
    return false;
  }

}

