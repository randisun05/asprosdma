<template>

    <Head>
        <title>Hubungi Aspro SDMA</title>
    </Head>

 <!--page Header-->
 <section class="page-header parallaxie padding_top center-block">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-titles text-center">
               <h2 class="whitecolor font-light bottom30"></h2>
               <ul class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><h3> Tiket Berhasil Dibuat</h3></li>
                 <li class="breadcrumb-item active" aria-current="page"></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!--page Header ends-->

<section id="registration" class="">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-12 col-md-12 col-sm-10">
            <div class="logincontainer">
               <h3 class="darkcolor bottom35 text-center">Terimakasih {{ archive.name }} Telah Menghubungi Aspro SDMA</h3>
               <h3 class="darkcolor bottom35 text-center">Nomor tiket anda: {{ tiket }}</h3>
               <h4 class="darkcolor bottom35 text-left">Kami akan segera memproses permintaan anda, mohon untuk mengecek progres tiket <i class="fas fa-tablet-android-alt"></i> di <a ref="/asprosdma.id/hubungi-aspro/tiket/{{ tiket }}">Link ini</a> secara berkala. </h4>
               <h4 class="darkcolor bottom35 text-left"><strong>Waspada terhadap berbagai penipuan yang mengatasnamakan Asosiasi Profesi SDM Aparatur (Aspro SDMA).</strong></h4>
               <h4 class="darkcolor bottom35 text-left">Jika anda mendapatkan kendala silakan <a href="/kontak-kami"><u>hubungi kami.</u></a></h4>
               <div class="text-center mt-4"> <Link :href="'/hubungi-aspro'" class="btn btn-md btn-primary border-0 shadow" type="button">Kembali</Link></div>
            </div>
         </div>
      </div>
   </div>
</section>


</template>

<script>
    //import layout
    import LayoutWebsite from '../../../Layouts/Website.vue';

    //import Head from Inertia
    import {
        Head,
        Link // tambahkan Link di sini
    } from '@inertiajs/inertia-vue3';

    //import reactive
    import {
        reactive
    } from 'vue';

    export default {

        //layout
        layout: LayoutWebsite,

        //register component
        components: {
            Head,
            Link // tambahkan Link di sini
        },

        //props
        props: {
            tiket: String,
            archive: Object,
        },

    }

</script>
