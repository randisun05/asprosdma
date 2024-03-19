
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Aspro SDMA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Registrasi belum dibuka, mohon menunggu pengumuman dari pihak Aspro SDMA
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

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