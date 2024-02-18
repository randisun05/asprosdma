<template>
    <Head>
        <title>Administrator</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row mt-1">
            <div class="col-md-12">
                <Link href="/admin/registration" class="btn btn-md btn-primary border-0 shadow mb-3" type="button"><i class="fa fa-arrow-left" aria-hidden="true"> </i>
                  Kembali</Link>
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h3 class="darkcolor bottom35 text-center">Registrasi Anggota</h3>
               <form @submit.prevent="submit" class="getin_form border-form" id="login">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 NIP
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="text" class="form-control" v-model="form.nip" placeholder="Masukan NIP" maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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

                     <div class="col-md-6 col-sm-6">
                        <span class="ms-4">
                                 Bukti Tranfer   ( Bentuk File Image )
                        </span>
                        <div class="form-group bottom35 mt-1">
                                <input type="file" class="form-control" @input="form.paid = $event.target.paid[0]">
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
    </div>
</template>

<script>
    //import layout
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    //import Head from Inertia
    import {
        Head, Link
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
        layout: LayoutAdmin,

        //register component
        components: {
            Head,
            Link
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
                paid: '',

            });

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
                    paid: '',
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

            const updateImage = (event) => {
                form.paid = event.target.files[0];
            };


            //return form state and submit method
            return {
                form,
                submit,
                updateDocument,
                updateImage
            };

        }

    }

</script>

<style>

</style>
