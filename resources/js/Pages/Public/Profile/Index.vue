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
        <ul class="list-group">
                <li class="list-group-item">
                  <strong>Nomor Anggota :</strong> {{ data.nomember }}
                </li>
                <li class="list-group-item">
                  <strong>Nama :</strong> {{ data.name }}
                </li>
                <li class="list-group-item">
                  <strong>Instansi :</strong> {{ data.agency }}
                </li>
              </ul>

              <div id="app">
                    <GenerateQRCode />
                </div>

      </div>
   </div>
</section>
<!--Testimonials Ends-->


</template>

<script>
    //import layout
    import LayoutWebsite from '../../../Layouts/Website.vue';


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
            title:Object,
            data:Object

        },

    }

</script>
