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


<section id="our-team-two" class="padding_m">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/AD.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/AD.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Anggaran Dasar Aspro SDMA</h4>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/ART.pdf" class="text-center mt-4" download="">
                  <img src="assets/images/ART.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Anggaran Rumah Tangga Aspro SDMA</h4>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/Pengurus.pdf" class="text-center mt-4" download="">
                  <img src="assets/images/Pengurus.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Susunan Pengurus Aspro SDMA</h4>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/kode-etik-aspro.pdf" class="text-center mt-4" download="">
                  <img src="assets/images/kodeetik.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Pedoman Kode Etik Dan Kode Prilaku Aspro SDMA</h4>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/pengesahan-pendirian-aspro.pdf" class="text-center mt-4" download="">
                  <img src="assets/images/pengesahan-pendirian.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Pengesahan Pendirian Perkumpulan Aspro SDMA</h4>
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

     //import Head from Inertia
     import {
        Head
    } from '@inertiajs/inertia-vue3';

    //import inertia adapter
    import {
        Inertia
    } from '@inertiajs/inertia';


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



    }

</script>
