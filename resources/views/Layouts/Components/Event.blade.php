<section id="video-bg" class="video-parallax mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7 wow fadeInLeft" data-wow-delay="300ms">
                <div class="heading-title text-md-start text-center padding_bottom">
                    <span>Kegiatan Selanjutnya</span>
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($events as $key => $event)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
                                    <div class="news_item shadow card d-flex justify-content-center align-items-center">
                                        <div class="col-md-3 col-sm-3 text-center mb-0">
                                            <img src="{{asset('storage/' . $event->image)}}" class="d-block img-fluid" style="max-height: 300px;" alt="...">
                                        </div>
                                        <div class="mt-4">
                                            <h4 class="text-capitalize font-light darkcolor" style="font-weight: bold; text-align: center">
                                                {{ $event->title }}
                                            </h4>
                                            <div class="mt-2 text-center">
                                                @if($event->status === 'active')
                                                <span class="badge bg-success">Open</span>
                                                @elseif($event->status === 'closed')
                                                <span class="badge bg-danger">Closed</span>
                                                @endif
                                            </div>
                                            <ul class="top20 bottom20">
                                                <li>
                                                    <a href="#."><i class="fa fa-calendar me-2" title="Tanggal pelaksanaa"></i>{{ $event->date }}</a>
                                                    <a class="ms-4" href="#."><i class="fa fa-user-o me-2" title="Jumlah peserta"></i>{{ $event->participant }}</a>
                                                </li>
                                                <li>
                                                    <p>Pendaftaran ditutup pada {{ $event->date }}</p>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                @if($event->status == 'active')
                                                <a href="/events/{{ $event->slug }}" title="join" class="button btnprimary" type="button">Join</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>


            <!-- Ini adalah bagian yang seharusnya berada di dalam kolom lain -->
            <div class="col-md-5 col-sm-5 padding_bottom wow fadeInRight" data-wow-delay="350ms" style="position: relative;">
                <div class="image text-center">
                    <!-- Gambar -->
                    <div class="image mt-4 ms-5">
                        <img alt="SEO" src="/assets/images/narsumkomjar.png" style="width: 100% " class="mt-2">
                        <!-- Tombol Join -->
                        <a href="https://asprosdma.id/berita/open-call-narasumber-komunitas-belajar" title="Join" class="button btnsecondary" style="position: absolute; top: 94%; left: 50%; transform: translate(-50%, -50%); z-index: 1;">  DAFTAR  </a>
                    </div>
                </div>
            </div>


            <!-- Akhir bagian yang seharusnya berada di dalam kolom lain -->

        </div>
    </div>
</section>
