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


<!-- Our Team-->
<section id="our-team-three">
   <div class="container">
      <div class="row">
           <div class="col-md-4">
              <div class="team-box top60">
               <div class="image">
                  <img src="/assets/images/ketua.jpg" alt="">
               </div>
               <div class="team-content gradient_bg whitecolor">
                  <h3>Dr. Rita Kardinasari, S.Psi, M.Si, Dipl. TAA</h3>
                  <p class="bottom40"></p>
                  <div class="progress-bars">
                     <div class="progress">
                        <p>Marketing online</p>
                        <div class="progress-bar" data-value="90"><span>90%</span></div>
                     </div>
                     <div class="progress">
                        <p>Web Designing</p>
                        <div class="progress-bar" data-value="75"><span>75%</span></div>
                     </div>
                  </div>
               </div>
            </div>
           </div>
           <div class="col-md-6 col-xs-12">
              <div class="top60">
               <div class="heading-title text-md-start text-center padding_bottom">
               <h5 class="h3 bottom20 darkcolor">Dr. Rita Kardinasari, S.Psi, M.Si, Dipl. TAA</h5>
               <span class="h1">Ketua Umum Asosiasi Profesi Jabatan Fungsional SDM Aparatur </span>
               <hr>
               <h5 class="h5 bottom20 darkcolor">Deskripsi</h5>
               </div>
            </div>
           </div>
      </div>
   </div>
</section>


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
