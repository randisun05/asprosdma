<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <!--page Header-->
    <section class="page-header parallaxie padding_top center-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-titles text-center">
                        <h2 class="whitecolor font-light bottom30">{{ title }}</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page Header ends-->


    <section id="our-testimonial" class="padding_m">
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: activeTab === 'pusat' }"
                            @click="setActiveTab('pusat')">Pengurus Pusat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: activeTab === 'penasihat' }"
                            @click="setActiveTab('penasihat')">Dewan Penasihat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: activeTab === 'pembina' }"
                            @click="setActiveTab('pembina')">Dewan Pembina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: activeTab === 'pakar' }"
                            @click="setActiveTab('pakar')">Dewan Pakar</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <!-- Monitoring -->
                <div v-show="activeTab === 'pusat'" class="tab-pane fade show active" id="pusat">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <hr>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2 col-sm-12 text-center">
                                                <div class="heading-title">
                                                    <h3 class="darkcolor bottom20">Pengurus</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/ketua.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Dr. Rita Kardinasari, S.Psi, M.Si, Dipl.
                                                            TAA</h4>
                                                        <h5>Ketua Umum Aspro SDMA</h5>
                                                        <p>Pemerintah Provinsi Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/wakil.jpeg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Nita Vibriyanti Situmorang, S.AP., M.Si.
                                                        </h4>
                                                        <h5>Wakil Ketua Umum Aspro SDMA</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4 class="">Dian Andriani</h4>
                                                        <h5 class="mt-1">Bendahara I</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4 class="">Kurnia Dianandari</h4>
                                                        <h5 class="mt-1">Bendahara II</h5>
                                                        <p>Provinsi Provinsi DKI Jakarta</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Henni Qurratul Aini</h6>
                                                        <p>Anggota Bendahara 1</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Fungki</h6>
                                                        <p>Anggota Bendahara I</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Eva Fadella</h6>
                                                        <p>Anggota Bendahara II</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Dini</h6>
                                                        <p>Anggota Bendahara II</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Agung Sugiarto, S.H., M.H.</h4>
                                                        <h5>Sekretaris I</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Endang Kristuti</h6>
                                                        <p>Anggota Sekretaris I</p>
                                                        <p>Badan Riset dan Inovasi Nasional</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Mohamad Dzikri Fadillah</h6>
                                                        <p>Anggota Sekretaris I</p>
                                                        <p>Badan Riset dan Inovasi Nasional</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Yulia Razila Ningsih</h6>
                                                        <p>Anggota Sekretaris I</p>
                                                        <p>Pemerintah Provinsi Riau</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Eko Kusdianto</h6>
                                                        <p>Anggota Sekretaris I</p>
                                                        <p>Pemerintah Provinsi Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Riyanto, S.A.P., M.AP.</h4>
                                                        <h5>Sekretaris II</h5>
                                                        <p>Badan Pemeriksa Keuangan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Agus Setiyo Utomo</h6>
                                                        <p>Anggota Sekretaris II</p>
                                                        <p>Kementerian Pedagangan</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Yenita Anggraini</h6>
                                                        <p>Anggota Sekretaris II</p>
                                                        <p>Pemerintah Provinsi Lampung</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Rafrian ika</h6>
                                                        <p>Anggota Sekretaris II</p>
                                                        <p>Kementerian Agama</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Ade Jajang Jatnika</h4>
                                                        <h5>Ketua Bidang Hubungan Masyarakat dan Kerja Sama</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Anggi Yudha</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Dadi Mulyadi</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Agus Amirudin</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Kementerian Luar Negeri</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Sabtutik Handayani</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Universitas Sebelas Maret</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Erwin Sopyana</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Kementerian ATR/BPN</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Rio Setiawan</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Kementerian Dalam Negeri</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Iceu Novida</h6>
                                                        <p>Anggota Bidang I</p>
                                                        <p>Pemerintah Provinsi Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>FX. Sunaryanta</h4>
                                                        <h5>Ketua Bidang Hukum dan Advokasi</h5>
                                                        <p>Pemerintahan Kabupaten Pemalang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Firna Novi Anggoro</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Badan Pusat Statistik</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Rakhmat Fajar Nugraha</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Aditya Sarsito Sukarsono</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Kementerian Hukum dan Hak Asasi Manusia</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Putri Rahmalya</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Badan Pembinaan Hukum Nasional Kemenkumham</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Achmad Soebagdja</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Pemerintah Provinsi Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Hendro Rusmanto</h6>
                                                        <p>Anggota Bidang II</p>
                                                        <p>Kementerian Dalam Negeri</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Mia Dian Ratnasari</h4>
                                                        <h5>Ketua Bidang Pengembangan Kapasitas Insani</h5>
                                                        <p>Badan Karantina Indonesia</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Hakim</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Desi Napitupulu</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Badan Riset dan Inovasi Nasional</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Asep Budiman</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Institut Seni dan Budaya Indonesia - Bandung</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Pamuji</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Pemerintah Provinsi Jawa Tengah</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Iwan Prasetyo</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Lembaga Administrasi Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Agustini Irmawati</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Kementerian Pertanian</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Andy Setyawan</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Sunsya Putri Ratu Pertiwi</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Vina Rizkanti</h6>
                                                        <p>Anggota Bidang III</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-center mt-4">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Andre</h4>
                                                        <h5>Ketua Bidang Sumber Pendanaan Organisasi</h5>
                                                        <p>Badan Pengawas Obat dan Makanan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Claudia Frederika Margaretha</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Kementerian Perdagangan</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Debby Yelviona</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Mahkamah Konstitusi</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Hary Lasmana</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Kementerian Desa dan PDTT</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Imas Siti Fatimah</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Kementerian Kesehatan</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Saepul</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Pemerintah Provinsi Jawa Barat</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h6>Bimo Adi Prianggoro</h6>
                                                            <p>Anggota Bidang IV</p>
                                                            <p>Kementerian Kelautan dan Perikanan</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Dhanu Sukma Utomo</h4>
                                                        <h5>Ketua Bidang Keanggotaan dan Organisasi</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Giyarsi</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Dimas Anugrah Dwi Saputra</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Afreza Zail Fahmi</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Aisyah Huwaida Siregar</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Anggota Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Novalia Fajri</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Kementerian PPPA</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Luxmaning Hutaki Widiastari</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>BPS Provinsi Lampung</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/team-7.jpg" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h6>Hestiani</h6>
                                                        <p>Anggota Bidang V</p>
                                                        <p>Kementerian Dalam Negeri</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div v-show="activeTab === 'penasihat'" class="tab-pane fade show active" id="penasihat">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2 col-sm-12 text-center">
                                                <div class="heading-title">
                                                    <h2 class="darkcolor bottom20">Dewan Penasihat</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/yomo.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Drs. Haryomo Dwi Putranto, M.Hum.</h4>
                                                        <h5>Plt. Kepala Badan Kepegawaian Negara</h5>
                                                        <p>Badan Kepegawaian Negara</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/imas.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Hj. Imas Sukmariah, S.Sos., MAP.</h4>
                                                        <h5>Sekretaris Utama Badan Kepegawaian Negara</h5>
                                                        <p>Badan Kepegawaian Negara</p>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/aris.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Drs. Aris Windiyanto, M.Si.</h4>
                                                        <h5>Deputi Bidang Mutasi Kepegawaian</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/suharmen.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Suharmen, S.Kom., M.Si</h4>
                                                        <h5>Deputi Bidang Sistem Informasi Kepegawaian</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="activeTab === 'pembina'" class="tab-pane fade show active" id="pembina">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <hr>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2 col-sm-12 text-center">
                                                <div class="heading-title">
                                                    <h2 class="darkcolor bottom20">Dewan Pembina</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/yomo.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Drs. Haryomo Dwi Putranto, M.Hum.</h4>
                                                        <h5>Deputi Bidang Pembinaan Manajemen Kepegawaian</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/otok.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Dr. Otok Kuswandaru, S.Sos., M.Si., CIPA
                                                        </h4>
                                                        <h5>Deputi Bidang Pengawasan dan Pengendalian</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-center padding_m">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/kapusbin.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Dr. Achmad Slamet Hidayat, S.Pd, M.Si</h4>
                                                        <h5>kepala Pusat Pembinaan Jabatan Fungsional Kepegawaian</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/bayu.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Bajoe Leodi Hargono, M.M., M.T., M.Sc.
                                                        </h4>
                                                        <h5>Kepala Pusat Penilaian Kompetensi ASN</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/satya.png" alt="">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Satya Pratama</h4>
                                                        <h5>Kepala Pusat Pengembangan Kompetensi ASN</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="team-box no-hover">
                                                    <div class="image">
                                                        <img src="/assets/images/tauchid.png" alt="" style="width: 90%;"
                                                            class="ms-2">
                                                    </div>
                                                    <div class="team-content gradient_bg">
                                                        <h4>Tauchid Djatmiko, SH, M.Si</h4>
                                                        <h5>Analis SDM Aparatur Ahli Utama</h5>
                                                        <p>Badan Kepegawaian Negara</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-show="activeTab === 'pakar'" class="tab-pane fade show active" id="pakar">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <hr>
                                    <section id="our-team-four">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 offset-md-2 col-sm-12 text-center">
                                                    <div class="heading-title">
                                                        <h2 class="darkcolor bottom20">Dewan Pakar</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/kapusbin.png" alt="">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h4>Dr. Achmad Slamet Hidayat, S.Pd, M.Si
                                                            </h4>
                                                            <h5>kepala Pusat Pembinaan Jabatan Fungsional Kepegawaian
                                                            </h5>
                                                            <p>Badan Kepegawaian Negara</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="team-box no-hover">
                                                        <div class="image">
                                                            <img src="/assets/images/tauchid.png" alt=""
                                                                style="width: 90%;" class="ms-2">
                                                        </div>
                                                        <div class="team-content gradient_bg">
                                                            <h4>Tauchid Djatmiko, SH, M.Si</h4>
                                                            <h5>Analis SDM Aparatur Ahli Utama</h5>
                                                            <p>Badan Kepegawaian Negara</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-show="activeTab === 'cabang'" class="tab-pane fade show active" id="cabang">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h5 class="mt-2 text-center"><i class="fa fa-chart-line"></i> Pengurus Cabang</h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials Ends-->


</template>

<script>
//import layout
import LayoutWebsite from '../../../../Layouts/Website.vue';


//import reactive
import {
    reactive
} from 'vue'

//import inertia adapter
import {
    Inertia
} from '@inertiajs/inertia';

//import Head from Inertia
import {
    Head
} from '@inertiajs/inertia-vue3';



export default {

    //layout
    layout: LayoutWebsite,

    //register component
    components: {
        Head,

    },

    //props
    props: {
        title: Object

    },

    data() {
        return {
            activeTab: 'pusat', // Set the default active tab

        };
    },

    methods: {
        setActiveTab(tabName) {
            this.activeTab = tabName;
        },
    },



}

</script>
