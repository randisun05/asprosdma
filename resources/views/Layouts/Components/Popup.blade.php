
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Registrasi AsproSDMA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                <div class="cbp-item web logo">
                    <img src="/assets/images/tanggalregis.jpeg" alt="" style="width: 100%">
                        <div class="overlay center-block whitecolor">
                        <a class="plus" data-fancybox="" href="/assets/images/tanggalregis.jpeg"></a>
                        </div>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
  setTimeout(function(){
    var modalTriggerBtn = document.getElementById('modalTriggerBtn');
    var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    modal.show();

    modalTriggerBtn.addEventListener('click', function() {
      modal.hide();
    });

    document.addEventListener('click', function(e) {
      if (e.target === modalTriggerBtn) {
        return;
      }
      if (!modalTriggerBtn.contains(e.target) && !document.getElementById('exampleModal').contains(e.target)) {
        modal.hide();
      }
    });
  }, 3000);
});
</script>
