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
          <a class="nav-link" :class="{ active: activeTab === 'pusat' }" @click="setActiveTab('pusat')">Pengurus Pusat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{ active: activeTab === 'penasihat' }" @click="setActiveTab('penasihat')">Dewan Penasihat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{ active: activeTab === 'pembina' }" @click="setActiveTab('pembina')">Dewan Pembina</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{ active: activeTab === 'pakar' }" @click="setActiveTab('pakar')">Dewan Pakar</a>
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
                                    <h2 class="darkcolor bottom20">Pengurus</h2>
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
                                                      <h4 class="darkcolor">Dr. Rita Kardinasari, S.Psi, M.Si, Dipl. TAA</h4>
                                                      <p>Ketua Umum Aspro SDMA</p>
                                                      <ul class="social-icons">
                                                         <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                         <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                         <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                      </ul>
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
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Sekretaris 1</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Sekretaris 2</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
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
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Bendahara 1</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Bendahara 2</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
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
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Ketua Bidang Keanggotaan dan Organisasi</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Ketua Bidang Pengembangan Kapasitas Insani</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                
                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Ketua Bidang Hukum dan Advokasi</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row justify-content-center mt-4"></div>
                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Ketua Bidang Hubungan Masyarakat dan Kerjasama</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/team-7.jpg" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Nama</h4>
                                                            <p>Ketua Bidang Sumber Pendanaan Organisasi</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
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
                                                      <h4 class="darkcolor">Drs. Haryomo Dwi Putranto, M.Hum.</h4>
                                                      <p>Plt. Kepala Badan Kepegawaian Negara</p>
                                                      <ul class="social-icons">
                                                         <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                         <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                         <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                      </ul>
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
                                                            <h4 class="darkcolor">Hj. Imas Sukmariah, S.Sos., MAP.</h4>
                                                            <p>Sekretaris Utama Badan Kepegawaian Negara</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/aris.png" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Drs. Aris Windiyanto, M.Si.</h4>
                                                            <p>Deputi Bidang Mutasi Kepegawaian BKN</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="col-lg-3 col-md-6">
                                                      <div class="team-box no-hover">
                                                         <div class="image">
                                                            <img src="/assets/images/suharmen.png" alt="">
                                                         </div>
                                                         <div class="team-content gradient_bg">
                                                            <h4 class="darkcolor">Suharmen, S.Kom., M.Si</h4>
                                                            <p>Deputi Bidang Sistem Informasi Kepegawaian BKN</p>
                                                            <ul class="social-icons">
                                                               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                                               <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                                            </ul>
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
                                       <h4 class="darkcolor">Drs. Haryomo Dwi Putranto, M.Hum.</h4>
                                       <p>Deputi Bidang Pembinaan Manajemen Kepegawaian BKN</p>
                                       <ul class="social-icons">
                                          <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                          <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                          <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6">
                                 <div class="team-box no-hover">
                                    <div class="image">
                                       <img src="/assets/images/otok.png" alt="">
                                    </div>
                                    <div class="team-content gradient_bg">
                                       <h4 class="darkcolor">Dr. Otok Kuswandaru, S.Sos., M.Si., CIPA</h4>
                                       <p>Deputi Bidang Pengawasan dan Pengendalian</p>
                                       <ul class="social-icons">
                                          <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                          <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                          <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                                       </ul>
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
                              <h4 class="darkcolor">Dr. Achmad Slamet Hidayat, S.Pd, M.Si</h4>
                              <p>kepala Pusat Pembinaan Jabatan Fungsional Kepegawaian BKN</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="team-box no-hover">
                           <div class="image">
                              <img src="/assets/images/bayu.png" alt="">
                           </div>
                           <div class="team-content gradient_bg">
                              <h4 class="darkcolor">Bajoe Leodi Hargono, M.M., M.T., M.Sc.</h4>
                              <p>Kepala Pusat Penilaian Kompetensi ASN</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="team-box no-hover">
                           <div class="image">
                              <img src="/assets/images/satya.png" alt="">
                           </div>
                           <div class="team-content gradient_bg">      
                              <h4 class="darkcolor">Satya Pratama</h4>
                              <p>Kepala Pusat Pengembangan Kompetensi ASN</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="team-box no-hover">
                           <div class="image">
                              <img src="/assets/images/tauchid.png" alt="" style="width: 90%;" class="ms-2">
                           </div>
                           <div class="team-content gradient_bg">
                              <h4 class="darkcolor">Tauchid Djatmiko, SH, M.Si</h4>
                              <p>Analis SDM Aparatur Ahli Utama</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
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
                              <h4 class="darkcolor">Dr. Achmad Slamet Hidayat, S.Pd, M.Si</h4>
                              <p>kepala Pusat Pembinaan Jabatan Fungsional Kepegawaian BKN</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="team-box no-hover">
                           <div class="image">
                              <img src="/assets/images/tauchid.png" alt="" style="width: 90%;" class="ms-2">
                           </div>
                           <div class="team-content gradient_bg">
                              <h4 class="darkcolor">Tauchid Djatmiko, SH, M.Si</h4>
                              <p>Analis SDM Aparatur Ahli Utama</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="team-box no-hover">
                           <div class="image">
                              <img src="/assets/images/team-7.jpg" alt="">
                           </div>
                           <div class="team-content gradient_bg">      
                              <h3>Nama</h3>
                              <p>Akademisi/praktisi Analis SDM Aparatur</p>
                              <ul class="social-icons">
                                 <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i> </a> </li>
                              </ul>
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
            title:Object

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