<template>
<!-- header -->

   <nav class="navbar navbar-expand-lg">
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
                  <a class="nav-link pagescroll" href="/">Beranda</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#tentang kita" role="button" aria-expanded="false">Tentang Kita</a>
                  <ul class="dropdown-menu pagescroll" aria-expanded="false">
                        <li><a class="dropdown-item" href="/tentang-aspro">Siapa Kita?</a></li>
                        <li><a class="dropdown-item" href="/ketua-umum">Ketua Umum</a></li>
                        <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="/visi-misi">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="/sejarah">Sejarah Terbentuknya Aspro SDMA</a></li>
                        <li><a class="dropdown-item" href="/peraturan-organisasi">Peraturan Organisasi</a></li>
                     </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link pagescroll dropdown-toggle" data-bs-toggle="dropdown" href="#program" role="button" aria-expanded="false">Program</a>
                  <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/bidang-keanggotaan-dan-organisasi">Bidang Keanggotaan dan Organisasi</a></li>
                        <li><a class="dropdown-item" href="/bidang-pengembangan-kapasitas-insani">Bidang Pengembangan Kapasitas Insansi</a></li>
                        <li><a class="dropdown-item" href="/bidang-hukum-dan-advokasi">Bidang Hukum dan Advokasi</a></li>
                        <li><a class="dropdown-item" href="/bidang-hubungan-masyarakat-dan-kerja-sama">Bidang Hubungan Masyarakat dan Kerja Sama</a></li>
                        <li><a class="dropdown-item" href="/bidang-sumber-pendanaan-organisasi">Bidang Sumber Pendanaan Organisasi</a></li>
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
                        <li><a class="dropdown-item" href="/registration">Daftar</a></li>
                        <li><a class="dropdown-item" href="/login">Masuk</a></li>
                     </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link pagescroll" href="/#sapa-kita">Kontak Kami</a>
               </li>
            </ul>
         </div>
        </div>
        <!--side menu open button-->
        <div class="dropdown">
            <a href="#" class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="sidemenu_toggle">
                <div class="media d-flex align-items-center">
                    <img class="avatar rounded-circle" alt="Image placeholder" :src="`https://ui-avatars.com/api/?name=${$page.props.auth.member.name}&amp;background=4e73df&amp;color=ffffff&amp;size=40`">
                        <div class="media-body text-dark align-items-center d-none d-lg-block ms-2">
                            <span class="mb-0 font-small fw-bold text-gray-900">{{ $page.props.auth.member.name }}</span>
                        </div>
                </div>
            </a>
                    <ul class="dropdown-menu" aria-labelledby="sidemenu_toggle">
                        <Link class="dropdown-item d-flex align-items-center" href="/logout" method="POST" as="button">
                        Logout
                        </Link>
                    </ul>
        </div>
   </nav>

</template>

<script>
//import Link
import { Link } from '@inertiajs/inertia-vue3';

export default {

    //register component
    components: {
        Link,
    }
}


</script>


<style>


.navbar {
    background-color: #83c1ff; /* Ubah sesuai keinginan Anda */
} 
</style>