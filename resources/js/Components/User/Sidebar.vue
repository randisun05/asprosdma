<template>

   <nav class="navbar navbar-expand-md sidebar-nav padding padding_m">
    <div class="collapse navbar-collapse" id="xenav">
       <ul class="navbar-nav ms-auto">
        <li class="nav-item py-3">
        </li>

          <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/dashboard') }">
                  <Link href="/user/dashboard" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                          <i class="fa fa-tachometer fa-lg" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-text ms-3">Dashboard</span>
                  </span>
                  </Link>
              </li>

              <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/member-card') }">
                  <Link href="/user/member-card" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-text ms-3">Kartu Anggota</span>
                  </span>
                  </Link>
              </li>

              <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/registration') }">
                  <Link href="/user/profile" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-text ms-3">Profile</span>
                  </span>
                  </Link>
              </li>

              <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/registration') }">
                  <Link href="/user/posts" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                        <i class="fa fa-bullhorn"></i>
                      </span>
                      <span class="sidebar-text ms-3">Bagikan Cerita</span>
                  </span>
                  </Link>
              </li>

              <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/registration') }">
                  <Link href="/user/events" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <span class="sidebar-text ms-3">Kegiatan</span>
                  </span>
                  </Link>
              </li>
<!--
              <li class="nav-item" :class="{ 'active': $page.url.startsWith('/user/certificates') }">
                  <Link href="/user/certificates" class="nav-link d-flex justify-content-between">
                  <span>
                      <span class="sidebar-icon">
                        <i class="fa fa-file-pdf-o"></i>
                      </span>
                      <span class="sidebar-text ms-3">Sertifikat</span>
                  </span>
                  </Link>
              </li> -->

       </ul>
    </div>
 </nav>

</template>

<script>

//import Link
import { Link } from '@inertiajs/inertia-vue3';

export default {

  //register components
  components: {
      Link
  },

}

</script>

<style>


</style>
