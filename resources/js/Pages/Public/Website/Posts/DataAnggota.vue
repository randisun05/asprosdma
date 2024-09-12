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
                  <a href="/assets/excel/data-anggota-april.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode April 2024</h4>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-mei.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-mei.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode Mei 2024</h4>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-juni.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-juni.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode Juni 2024</h4>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-juli.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-juli.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode Juli 2024</h4>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-agus.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-agus.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode Agustus 2024</h4>
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
