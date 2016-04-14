<?php if(!StateOperator::is_state("start")) { ?>

<!-- Modal Structure -->
<div id="explanation" class="modal tac">
  <div class="modal-content">
    <h4>Art & Technologie (E)xperiments</h4>
    <p>
      De test toont <strong>40 combinaties</strong> van <strong>twee woorden</strong>.<br>
      Kies steeds het <strong>beroep</strong> met up of down toets.
  </p>
  </div>
  <div class="modal-footer">
    <a class=" modal-action modal-close waves-effect yellow btn ml-10 black-text" style="float: none;">
      Oke
    </a>
  </div>
</div>

<script>
 $(document).ready(function() {

    // Initialize the plugin
    //$('#explanation').popup('show');
    $('#explanation').openModal();

  });
</script>

<?php } ?>