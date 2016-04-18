<?php if(!StateOperator::is_state("start") && !StateOperator::is_state("finish") ) { ?>

<!-- Modal Structure -->
<div id="explanation" class="modal tac">
  <div class="modal-content">
    <h4>Art & Technologie (E)xperiments</h4>
    <p>
      De test toont <strong style="color: #26a69a;">40 combinaties</strong> van <strong style="color: #26a69a;">twee woorden</strong>.<br>
      Kies steeds het <strong style="color: #26a69a;">beroep</strong> met up of down toets.
    </p>
    <img src="img/wii_buttons.png" alt="wii" width="80px" height="auto" />
  </div>
  <div class="modal-footer">
    <a class="modal-action modal-close waves-effect yellow btn ml-10 black-text" style="float: none;">
      Oke
    </a>
  </div>
</div>
<script>
 $(document).ready(function() {
    // Initialize the plugin
    $('#explanation').openModal();
  });
</script>

<?php } ?>


<?php if(StateOperator::is_state("finish")) { ?>

<!-- Modal Structure -->
<div id="explanation" class="modal tac">
  <div class="modal-content">
    <h4>Art & Technologie (E)xperiments</h4>
    <p>
      <strong style="color: #26a69a;">Dank</strong> voor het uitvoeren van de ATX test.<br>
      Uw resultaten ziet u in <strong style="color: #26a69a;">blauw</strong>.
    </p>
    <img src="img/wii_buttons.png" alt="wii" width="80px" height="auto" />
  </div>
  <div class="modal-footer">
    <a class="modal-action modal-close waves-effect yellow btn ml-10 black-text" style="float: none;">
      Oke
    </a>
  </div>
</div>
<script>
 $(document).ready(function() {
    // Initialize the plugin
    $('#explanation').openModal();
  });
</script>

<?php } ?>