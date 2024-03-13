<template>

    <Head>
        <title>Registrasi Keanggotaan Aspro</title>
    </Head>

 <!--page Header-->
 <section class="page-header parallaxie padding_top center-block">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-titles text-center">
               <h2 class="whitecolor font-light bottom30"></h2>
               <ul class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><h3> Registrasi Anggota Kolektif</h3></li>
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
               <form @submit.prevent="submit" class="getin_form border-form" id="login">
                  <div class="row">

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Instansi
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.agency" placeholder="Masukan Instansi">
                            <div v-if="errors.agency" class="alert alert-danger mt-2">
                                {{ errors.agency }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Nama PIC
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.name" placeholder="Masukan Nama PIC">
                            <div v-if="errors.name" class="alert alert-danger mt-2">
                                {{ errors.name }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Kontak Aktif PIC
                        </span>
                        <div class="form-group bottom35 mt-1">
                            <input type="text" class="form-control" v-model="form.contact" placeholder="Masukan Kontak Aktif" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div v-if="errors.contact" class="alert alert-danger mt-2">
                                {{ errors.contact }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Email Aktif PIC
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="email" class="form-control" v-model="form.email" placeholder="Masukan Email Aktif PIC">
                            <div v-if="errors.email" class="alert alert-danger mt-2">
                                {{ errors.email }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Jumlah Data
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="number" class="form-control" v-model="form.total" placeholder="Masukan Jumlah Data" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div v-if="errors.agency" class="alert alert-danger mt-2">
                                {{ errors.total }}
                            </div>
                        </div>
                     </div>
                     

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 File    <a href="/assets/excel/register_group.xlsx" class="text-center mt-4" target="_blank"><u>( Unduh Template Excel )</u></a>
                        </span>
                        <div class="form-group bottom35 mt-1">
                            <div class="input-group">
                                <input type="file" class="form-control" @change="updateDocument" accept=".xls, .xlsx,">

                            </div>
                            <div v-if="errors.file" class="alert alert-danger mt-2">
                                    {{ errors.file }}
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
    import LayoutWebsite from '../../../Layouts/Website.vue';
 
    //import Head from Inertia
    import {
        Head
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
        layout: LayoutWebsite,

        //register component
        components: {
            Head,
            
        },

        //props
        props: {
            errors: Object,
            session: Object
        },
        
        //define composition API
        setup() {

            //define form state
            const form = reactive({
                agency: '',
                name: '',
                contact: '',
                email: '',
                total: '',
                file: '',

            });

            //submit method
            const submit = () => {

                //send data to server
                Inertia.post('/registration/group', {

                    //data
                    agency: form.agency,
                    name: form.name,
                    contact: form.contact,
                    email: form.email,
                    total: form.total,
                    file: form.file,
                } ,{
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'File Berhasil Dikirim.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });
                
            }
            // Method to update the document file
            const updateDocument = (event) => {
                form.file = event.target.files[0];
            };


            //return form state and submit method
            return {
                form,
                submit,
                updateDocument 
            };

        }

    }

</script>