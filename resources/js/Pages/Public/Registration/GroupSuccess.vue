<template>

    <Head>
        <title>Registrasi Keanggotaan Aspro</title>
    </Head>

<section id="registration" class="padding">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-12 col-md-12 col-sm-10">
            <div class="bglight logincontainer">
               <h3 class="darkcolor bottom35 text-center">Terimakasih {{ form.name }} Telah Melakukan Registrasi</h3>
               <h4 class="darkcolor bottom35 text-center">Token registrasi Anda: {{ token }}</h4> <!-- Menampilkan nilai token -->
               <h4 class="darkcolor bottom35 text-center">Silakan cek kotak masuk / spam pada email {{ form.email }} untuk konfirmasi pembayaran uang pangkal dan memantau progres usul registrasi.</h4>
               <h4 class="darkcolor bottom35 text-center">Jika ada kendala seperti tidak menerima email atau yang lainnya, silakan hubungi kami.</h4>
               <div class="text-center mt-4"> <Link :href="'/registration'" class="btn btn-md btn-primary border-0 shadow" type="button">Kembali</Link></div>
            </div>
         </div>
      </div>
   </div>
</section>


</template>

<script>
    //import layout
    import LayoutAuth from '../../../Layouts/Auth.vue';
 
    //import Head from Inertia
    import {
        Head,
        Link // tambahkan Link di sini
    } from '@inertiajs/inertia-vue3';

    //import reactive
    import {
        reactive
    } from 'vue';

    //import sweet alert2
    // import Swal from 'sweetalert2';

    //import inertia adapter
        // import {
        //     Inertia
        // } from '@inertiajs/inertia';

    export default {

        //layout
        layout: LayoutAuth,

        //register component
        components: {
            Head,
            Link // tambahkan Link di sini
        },

        //props
        props: {
            token: String,
            register: Object,

        },
        
        //define composition API
        setup(props) {

            //define form state
            const form = reactive({
                'agency':props.register.agency,
                'name':props.register.name,
                'email':props.register.email,
            });

        
            //return form state and submit method
            return {
                form,
            };

        }

    }

</script>
