<!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Aspro SDMA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cbp-item web logo">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

                            {{-- <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="/assets/images/pop-up survey.jpg" class="d-block w-100" alt="...">
                                  <div class="overlay center-block whitecolor">
                                      <a class="plus" data-fancybox="" href="/assets/images/pop-up survey.jpg"></a>
                                  </div>
                                </div>

                                    <div class="carousel-item">
                                    <img src="/assets/images/pop-up-kartu.jpg" class="d-block w-100" alt="...">
                                    <div class="overlay center-block whitecolor">
                                        <a class="plus" data-fancybox="" href="/assets/images/pop-up-kartu.jpg"></a>
                                        </div>
                                    </div>

                                </div> --}}

                            <div class="carousel-inner">
                                @foreach ($datas as $index => $data)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="/storage/{{ $data->image }}" class="d-block w-100" alt="...">
                                        <div class="overlay center-block whitecolor">
                                            <a class="plus mb-5" data-fancybox="" href="/storage/{{ $data->image }}"></a>
                                            @if ($data->button == 1)
                                            <a href="{{ $data->link }}" class="btn btn-primary" target="_blank">Klik Untuk Detail</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Tombol navigasi harus di luar loop -->
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <a href="https://asprosdma.id/berita/survey-komunitas-belajar-aspro-sdma" class="btn btn-primary" target="_blank">Detail</a> --}}
                </div>
            </div>
        </div>
    </div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
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
                if (!modalTriggerBtn.contains(e.target) && !document.getElementById(
                        'exampleModal').contains(e.target)) {
                    modal.hide();
                }
            });
        }, 3000);
    });
</script>
