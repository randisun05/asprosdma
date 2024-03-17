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
                 <li class="breadcrumb-item"><h3> Registrasi Anggota</h3></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!--page Header ends--> 

<section id="registration" class="mt-4">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-12 col-md-12 col-sm-10">
            <div class="mt-4">
               <form @submit.prevent="submit" class="getin_form border-form" id="post" enctype="multipart/form-data"> 
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 NIP
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.nip" placeholder="Masukan NIP" maxlength="18" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
                                <input type="text" class="form-control" v-model="form.name" placeholder="Masukan Nama Lengkap">
                            <div v-if="errors.name" class="alert alert-danger mt-2">
                                {{ errors.name }}
                            </div>
                        </div>
                     </div>
                     
                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Email
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="email" class="form-control" v-model="form.email" placeholder="Masukan Alamat Email Aktif">
                            <div v-if="errors.email" class="alert alert-danger mt-2">
                                {{ errors.email }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Nomor Kontak
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.contact" placeholder="Masukan Nomor Kontak Aktif" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div v-if="errors.contact" class="alert alert-danger mt-2">
                                {{ errors.contact }}
                            </div>
                        </div>
                     </div>

                    <div class="col-md-6 col-sm-6">
                        <label for="agency" class="ms-4">Instansi</label>
                        <div class="form-group bottom35 mt-1">
                            <input type="text" class="form-control" v-model="form.agency" @input="searchAgencies" placeholder="Masukkan nama instansi" />
                            <ul v-if="form.agency && searchResults.length" class="list-group" style="position: absolute; width: 100%; z-index: 999; overflow-y: auto; max-height: 200px;">
                                <div class="col-md-4 col-sm-4">
                                <li class="list-group-item" v-for="(result, index) in searchResults" :key="index" @click="selectAgency(result)">{{ result }}</li>
                                </div>
                            </ul>
                            <div v-if="errors.agency" class="alert alert-danger mt-2">{{ errors.agency }}</div>
                        </div>
                    </div>

                     <div class="col-md-3 col-sm-3">
                        <span class="ms-4">
                                 Jabatan
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <select type="form-select" class="form-control" v-model="form.position">
                                    <option value="" disabled>Pilih Jabatan</option>
                                    <option value="Analis SDM Aparatur">Analis SDM Aparatur</option>
                                    <option value="Pranata SDM Aparatur">Pranata SDM Aparatur</option>
                                </select>
                            <div v-if="errors.position" class="alert alert-danger mt-2">
                                {{ errors.position }}
                            </div>
                        </div>
                     </div>
                     

                     <div class="col-md-3 col-sm-3">
                        <span class="ms-4">
                                 Jenjang
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <select type="form-select" class="form-control" v-model="form.level">
                                    <template v-if="form.position === ''">
                                        <option value="" disabled selected>Jabatan Harus Dipilih</option>
                                    </template>
                                    <template v-if="form.position === 'Analis SDM Aparatur'">
                                        <option value="" disabled>Pilih Jenjang</option>
                                        <option value="Pertama">Pertama</option>
                                        <option value="Muda">Muda</option>
                                        <option value="Madya">Madya</option>
                                        <option value="Utama">Utama</option>
                                    </template>
                                    <template v-if="form.position === 'Pranata SDM Aparatur'">
                                        <option value="" disabled>Pilih Jenjang</option>
                                        <option value="Terampil">Terampil</option>
                                        <option value="Mahir">Mahir</option>
                                        <option value="Penyelia">Penyelia</option>
                                    </template>
                                </select>
                            <div v-if="errors.level" class="alert alert-danger mt-2">
                                {{ errors.level }}
                            </div>
                        </div>  
                     </div>

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 SK Jabatan   ( Bentuk File .Pdf )
                        </span>
                        <div class="form-group bottom35 mt-1">
                            <div class="input-group">
                                <input type="file" class="form-control" @change="updateDocument" accept=".pdf">

                            </div>
                            <div v-if="errors.document_jab" class="alert alert-danger mt-2">
                                    {{ errors.document_jab }}
                                </div>
                                <div v-if="errors[0]" class="alert alert-danger mt-2">
                                    {{ errors[0] }}
                                </div>
                            </div>
                     </div>

                        <div class="col-md-3 col-sm-3 mt-2">
                            <div class="form-group bottom35 mt-1">
                                <div class="form-group mb-4 ms-4">
                                    <div class="input-group">
                                        <span class="text px-5" id="generated-captcha">{{ code.value }}</span>
                                        <button class="btn btn btn-outline-primary no-border ms-2" style="border-color: white;" @click.prevent="refreshCaptcha"><i class="fa fa-undo"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 mt-4">
                            <div class="form-group mb-4 ms-4">
                            <div class="input-group">
                                <input type="text" class="form-control me-3" id="captcha" v-model="form.captcha" placeholder="Enter Captcha" size="6">
                            </div>
                            <div v-if="errors.captcha" class="alert alert-danger mt-2">
                                {{ errors.captcha }}
                            </div>
                      </div>
                     </div>
                     <div class="ms-2 mb-4">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" v-model="form.term" true-value="1" false-value="0">
                            <label class="form-check-label ms-2" for="agreeTerms">
                                Saya menyetujui peraturan organisasi.
                            </label>
                            <div v-if="errors.term" class="col-md-4 alert-danger mt-2">
                                {{ errors.term }}
                            </div>
                    </div>
                    
                     <div class="row d-flex justify-content-center">
                        <button type="submit" class="button btnprimary" style="width: 300px;">Submit</button>
                        <a href="/registration/group" class="text-center mt-4"><u>Klik untuk mengajukan registrasi secara kolektif</u></a>
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
        reactive, onMounted 
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
                nip: '',
                name: '',
                email: '',
                contact: '',
                agency: '',
                position: '',
                level: '',
                document_jab: '',
                captcha: '',
                term: ''
            });


             // Define searchResults reactive variable to store search results
                const searchResults = reactive([]);
            // Method to search agencies based on input

                const searchAgencies = async () => {
                            try {
                            const response = await fetch('https://api.sheety.co/6be80dfe79437b6dcf36a18e88b21c5b/permintaanNoSertifikat/instansi');
                            const data = await response.json();
                            if (data && data.instansi) {
                                // Extract only the name of the institution
                                const names = data.instansi.map(item => item.namaInstansi.toLowerCase());
                                // Filter names based on the input value
                                searchResults.splice(0, searchResults.length, ...names.filter(name => name.includes(form.agency.toLowerCase())));
                            }
                            } catch (error) {
                            console.error('Error searching agencies:', error);
                            }
                            };
                            const selectAgency = (agency) => {
                                form.agency = agency;
                                // Clear searchResults setelah memilih instansi
                                searchResults.splice(0, searchResults.length);
                            };

                        //submit method
                        const submit = () => {

                            //send data to server
                            Inertia.post('/registration/store', {

                                //data
                                nip: form.nip,
                                name: form.name,
                                email: form.email,
                                contact: form.contact,
                                agency: form.agency,
                                position: form.position,
                                level: form.level,
                                document_jab: form.document_jab,
                                code: code.value,
                                captcha : form.captcha,
                                term : form.term
                            } ,{
                                onSuccess: () => {
                                    //show success alert
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'Data Registrasi Berhasil Dikirim, Silakan Cek Email Anda.',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                },
                            });
                            
                        }


            // Method to update the document file
            const updateDocument = (event) => {
                form.document_jab = event.target.files[0];
            };

            //define captcha state
            const code = reactive({
                value: generateCaptcha(), // Generate captcha when the component initializes
            });

             // Function to generate random captcha
             function generateCaptcha() {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let result = '';
                const charactersLength = characters.length;
                for (let i = 0; i < 6; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            }

            const refreshCaptcha = () => {
              code.value = generateCaptcha();
            }

            //return form state and submit method
            return {
                form,
                submit,
                updateDocument,
                searchResults,
                searchAgencies,
                selectAgency,
                refreshCaptcha,
                code
            };

        }

    }

</script> 

<style scoped>

</style>