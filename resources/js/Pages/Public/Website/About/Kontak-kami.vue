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


<!-- Contact US -->  
<section id="kontak kami">
   <div class="container padding_m">
      <div class="row">
        <div class="col-md-6 col-sm-12">
           <div class="heading-title heading_space wow fadeInUp" data-wow-delay="300ms">
               <span>Ada pertanyaan, masukan, atau ingin berkolaborasi?</span>
               <h2 class="darkcolor">Kontak Kami</h2>
                 <p>Kami akan senang hati membaca/mendengar pertanyaan, masukan, atau keinginan berkolaborasi Anda. Tim kami siap membantu!</p>
            </div>
        </div>
         <div class="col-md-6 col-sm-12 margin_bottom our-address">
           <h5>Alamat Kami</h5>
            <p>Kantor Badan Kepegawaian Negara Pusat, Gedung II, Lantai 6, Jl. Mayor Jendral Sutoyo No.12 4, RT.4/RW.14, Cililitan, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13640 </p>
            <a class="pickus" href="#." data-text="Get Directions">Get Directions</a>
               <div class="col-md-6 col-sm-12 our-address top20">
                  <h5>Telepon</h5>
                  <p class="bottom15"><span>Segera
                  </span> </p>
                  <a class="pickus" href="#." data-text="Call Us">Call Us</a>
               </div>
               <div class="col-md-6 col-sm-6 our-address top20">
                  <h5>Email Kami</h5>
                  <p class="bottom15"><span>halo.asprosdma@gmail.com</span> </p>
                  <a class="pickus" href="#." data-text="Send a Message">Send a Message</a>
               </div>
         </div>
      </div>
   </div>
</section>
<!--Contact US Ends-->
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