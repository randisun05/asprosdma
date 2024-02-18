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
                   <a class="nav-link pagescroll" href="#home">Home</a>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#keanggotaan" role="button" aria-expanded="false">Profile</a>
                   <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="/registration">Tentang Aspro</a></li>
                         <li><a class="dropdown-item" href="/login">Ketua Umum</a></li>
                         <li><a class="dropdown-item" href="/login">Struktur Organisasi</a></li>
                         <li><a class="dropdown-item" href="/login">Visi Misi</a></li>
                         <li><a class="dropdown-item" href="/login">Sejarah Terbentuknya Aspro</a></li>
                         <li><a class="dropdown-item" href="/login">Peraturan Organisasi</a></li>
                      </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#keanggotaan" role="button" aria-expanded="false">Program</a>
                   <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="/registration">Pelatihan</a></li>
                         <li><a class="dropdown-item" href="/login">Sertifikasi</a></li>
                         <li><a class="dropdown-item" href="/login">Kegiatan Aspro</a></li>
                      </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#keanggotaan" role="button" aria-expanded="false">Publikasi</a>
                   <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="/registration">Pengumuman</a></li>
                         <li><a class="dropdown-item" href="/login">Artikel</a></li>
                         <li><a class="dropdown-item" href="/login">Berita</a></li>
                         <li><a class="dropdown-item" href="/login">Media</a></li>
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
                   <a class="nav-link pagescroll" href="#kontak">Kontak Kami</a>
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
                <li v-for="(dropdown, name) in dropdowns" :key="name" class="nav-item active">
             <a class="nav-link pagescroll" :href="`#${name}`" @click="toggleDropdown(name)">{{ name }}</a>
             <div v-if="dropdown" class="dropdown-content">
               <div v-for="item in dropdownItems[name]" :key="item">
                 <a :href="`#${item.toLowerCase().replace(/\s+/g, '-')}`">{{ item }}</a>
               </div>
             </div>
           </li>
             </ul>
          </nav>
 
          <div class="side-footer w-100">
             <ul class="social-icons-simple white top40">
             <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
             <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a> </li>
             <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
          </ul>
          <p class="whitecolor">&copy; 2024 Aspro</p>
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