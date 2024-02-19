<template>
<!-- header -->
<header class="site-header transparent-sidemenu">
    <nav class="navbar navbar-expand-lg bg-gray-transparant static-nav">
       <div class="container">
          <a class="navbar-brand" href="index.html">
            
          <img src="/assets/images/logo.png" alt="logo" style="width: 70%;">
          </a>
          <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#xenav">
             <span> </span>
             <span> </span>
             <span> </span>
          </button>
          <div class="collapse navbar-collapse" id="xenav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item active">
                  <a class="nav-link pagescroll" href="#home">Beranda</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#profile" role="button" aria-expanded="false">Profile</a>
                  <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/tentang-aspro-sdma">Tentang Aspro SDMA</a></li>
                        <li><a class="dropdown-item" href="/ketua-umum">Ketua Umum</a></li>
                        <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="/visi-misi">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="/sejarah-terbentuknya-aspro-sdma">Sejarah Terbentuknya Aspro</a></li>
                        <li><a class="dropdown-item" href="/peraturan-organisasi">Peraturan Organisasi</a></li>
                     </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#program" role="button" aria-expanded="false">Program</a>
                  <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pelatihan">Pelatihan</a></li>
                        <li><a class="dropdown-item" href="/sertifikasi">Sertifikasi</a></li>
                        <li><a class="dropdown-item" href="/kegiatan-aspro-sdma">Kegiatan Aspro SDMA</a></li>
                     </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#publikasi" role="button" aria-expanded="false">Publikasi</a>
                  <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/berita">Berita</a></li>
                        <li><a class="dropdown-item" href="/artikel">Artikel</a></li>
                        <li><a class="dropdown-item" href="/cerita">Cerita</a></li>
                     </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#keanggotaan" role="button" aria-expanded="false">Keanggotaan</a>
                  <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/registration">Registration</a></li>
                        <li><a class="dropdown-item" href="/login">Login</a></li>
                     </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link pagescroll" href="#sapa-kita">Sapa Kita</a>
               </li>
            </ul>
         </div>
      </div>
 
       <!--side menu open button-->
       <a href="javascript:void(0)" class="d-none d-lg-inline-block sidemenu_btn" id="sidemenu_toggle">
           <span></span> <span></span> <span></span>
        </a>
    </nav>
 
    <!-- side menu -->
    <div class="side-menu">
      <div class="inner-wrapper">
         <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
         <nav class="side-nav">
         
            <ul class="navbar-nav w-100">
               <li class="nav-item active">
                  <a class="nav-link pagescroll" href="#home">Beranda</a>
               </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#profile" aria-expanded="false">Profile <i class="bi bi-chevron-down"></i></a>
                        <div class="collapse" id="profile">
                           <ul class="navbar-nav ms-4">
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll mt-0" href="/tentang-aspro-sdma" style="font-size: 1rem;">Tentang Aspro SDMA</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/ketua-umum" style="font-size: 1rem;">Ketua Umum</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/struktur-organisasi" style="font-size: 1rem;">Struktur Organisasi</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/visi-misi" style="font-size: 1rem;">Visi Misi</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/sejarah-terbentuknya-aspro-sdma" style="font-size: 1rem;">Sejarah Terbentuknya Aspro SDMA</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/peraturan-organisasi" style="font-size: 1rem;">Peraturan Organisasi</a>
                                 </li>
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#program" aria-expanded="false">Program <i class="bi bi-chevron-down"></i></a>
                        <div class="collapse" id="program">
                           <ul class="navbar-nav ms-4">
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll mt-0" href="/pelatihan" style="font-size: 1rem;">Pelatihan</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/sertifikasi" style="font-size: 1rem;">Sertifikasi</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/kegiatan-aspro-sdma" style="font-size: 1rem;">kegiatan Aspro SDMA</a>
                                 </li>
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#publikasi" aria-expanded="false">Publikasi <i class="bi bi-chevron-down"></i></a>
                        <div class="collapse" id="publikasi">
                           <ul class="navbar-nav ms-4">
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll mt-0" href="/berita" style="font-size: 1rem;">berita</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/artikel" style="font-size: 1rem;">Artikel</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/cerita" style="font-size: 1rem;">Cerita</a>
                                 </li>
                           </ul>
                        </div>
                     </li>

                  <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#anggota" aria-expanded="false">keanggotaan <i class="bi bi-chevron-down"></i></a>
                        <div class="collapse" id="anggota">
                           <ul class="navbar-nav ms-4">
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll mt-0" href="/registration" style="font-size: 1rem;">Registrasi</a>
                                 </li>
                                 <li class="nav-item mt-0">
                                    <a class="nav-link pagescroll" href="/login" style="font-size: 1rem;">Login</a>
                                 </li>
                           </ul>
                        </div>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link pagescroll" href="#kontak">Sapa Kita</a>
                     </li>
            </ul>
         </nav>

         <div class="side-footer w-100">
            <ul class="social-icons-simple white top40">
            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
         </ul>
         <p class="whitecolor">&copy; 2024 Aspro SDMA</p>
         </div>
      </div>
   </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->
 </header>
 <!-- header -->
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
  data() {
    return {
      dropdowns: {
        home: false,
        profile: false,
        program: false,
        publikasi: false,
        keanggotaan: false,
        kontak: false,
      },
      dropdownItems: {
        profile: ["Tentang Aspro", "Ketua Umum", "Struktur Organisasi", "Visi Misi", "Sejarah Terbentuknya Aspro", "Peraturan Organisasi"],
        program: ["Pelatihan", "Sertifikasi", "Kegiatan Aspro"],
        publikasi: ["Pengumuman", "Artikel", "Berita", "Media"],
        keanggotaan: ["Login", "Registrasi"],
      }
    };
  },
  methods: {
    toggleDropdown(dropdown) {
      this.dropdowns[dropdown] = !this.dropdowns[dropdown];
    },
    toggleSideMenu() {
      const sideMenu = document.querySelector('.side-menu');
      sideMenu.classList.toggle('active');
    }
  },
  mounted() {
    const sideMenuToggle = document.getElementById('sidemenu_toggle');
    sideMenuToggle.addEventListener('click', this.toggleSideMenu);
    
    const sideMenuClose = document.getElementById('btn_sideNavClose');
    sideMenuClose.addEventListener('click', this.toggleSideMenu);
  }
}
</script>


<style>

.bg-gray-transparant {
      background: -webkit-gradient(linear, left top, right top, color-stop(31%, #423f9c), color-stop(69%, #862359));
      color: white; /* Teks berwarna putih */
    
}

</style>