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
         <!-- <div v-for="(data, index) in datas.data" :key="index" class="col-lg-3 col-md-3">
                    <div class="team-box grey-shade top60">
                        <div class="image">
                                <a v-show="data.document !== '' && data.document !== '-'"
                                        :href="getDocumentUrl(data.document)" target="_blank"
                                        class="text-center mt-4">
                                <img class="image" style="width: 100%;" v-if="data.image" :src="getImageUrl(data.image)"
                                    alt="Gambar" />
                                </a>
                        </div>
                        <div class="team-content darkcolor">
                            <h4 v-html="data.body"></h4>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <Pagination :links="datas.links" align="center" />
                </div> -->

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

         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-sep-24.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-sep-24.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode September 2024</h4>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-3">
            <div class="team-box grey-shade top60">
               <div class="image">
                  <a href="/assets/excel/data-anggota-okt-24.pdf" class="text-center mt-4" download="">
                     <img src="/assets/images/data-anggota-okt-24.png" alt="">
                  </a>
               </div>
               <div class="team-content darkcolor">
                  <h4>Data Keanggotaan Aspro SDMA Periode Oktober 2024</h4>
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
            title:Object,
            datas: Object
        },

        setup(props) {


            // Method to get the URL of the document
            const getImageUrl = (imageName) => {
                return `/storage/${imageName}`;
            }

            const getDocumentUrl = (documentName) => {
                return `/storage/${documentName}`;
            }




            //return
            return {
                getDocumentUrl,
                getImageUrl,

            }
            }




    }

</script>
