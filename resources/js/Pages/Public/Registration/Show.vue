<template>

    <Head>
        <title>Registrasi Keanggotaan Aspro</title>
    </Head>

<section id="registration" class="padding">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-12 col-md-12 col-sm-10">
            <div class="bglight logincontainer">
               <h3 class="darkcolor bottom35 text-center">Konfirmasi Pembayaran</h3>
               <form @submit.prevent="submit" class="getin_form border-form" id="paid" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 NIP
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.nip">
                            <div v-if="errors.nip" class="alert alert-danger mt-2">
                                {{ errors.nip }}
                            </div>
                        </div>
                     </div>

                    <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Nama
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.name">
                            <div v-if="errors.name" class="alert alert-danger mt-2">
                                {{ errors.name }}
                            </div>
                        </div>
                     </div>
                     
                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Bukti Transfer   ( Bentuk File Image )
                        </span>
                        <div class="form-group bottom35 mt-1">
                            <div class="input-group">
                                <input type="file" class="form-control" @change="updatePaid">

                            </div>
                            <div v-if="errors.paid" class="alert alert-danger mt-2">
                                    {{ errors.paid }}
                                </div>
                                <div v-if="errors[0]" class="alert alert-danger mt-2">
                                    {{ errors[0] }}
                                </div>
                            </div>
                     </div>

                     <div class="row d-flex justify-content-center">
                        <button type="submit" class="button btnprimary" style="width: 300px;">Submit</button>
                    </div>
                    
                  </div>
               </form>
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
        Link
    } from '@inertiajs/inertia-vue3';

    //import reactive
    import {
        reactive
    } from 'vue';
 
    //import sweet alert2
    import Swal from 'sweetalert2';

    //import inertia adapter
    import {
        Inertia
    } from '@inertiajs/inertia';

    export default {

        //layout
        layout: LayoutAuth,

        //register component
        components: {
            Head,
            Link
            
        },

        //props
        props: {
            errors: Object,
            session: Object,
            register: Object,
        },
        
        //define composition API
        setup(props) {

            //define form state
            const form = reactive({
                nip: props.register.nip,
                name: props.register.name,
                paid: null,

            });

            //submit method
            const submit = () => {
            // Creating FormData object to send file
            let formData = new FormData();
            formData.append('paid', form.paid);

            // Sending data using Inertia.post
            Inertia.post(`/registration/paid/${props.register.id}/success`, formData, {
                onSuccess: () => {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Konfirmasi Pembayaran Berhasil',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                },
            });
        }

        const updatePaid = (event) => {
            form.paid = event.target.files[0];
        };


            //return form state and submit method
            return {
                form,
                submit,
                updatePaid 
            };

        }

    }

</script>