<template>

    <Head>
        <title>Profile Anggota</title>
    </Head>
  
                <section id="profile" class="mt-4">
                    <div class="container-fluid px-5">
                        <div class="row d-flex justify-content-center">
                        <!-- First group of columns -->
                        <div class="col-sm-12 card shadow">
                            <div class="row"> 
                                <h3 class="text-center mt-4 text-black">Profile Anggota</h3>
                                <div class="col-md-2 col-12 ms-4">
                                    <Link href="/user/profile/edit" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                    class="fa fa-plus-circle"></i>
                                    Update Data</Link>
                    </div>
                            </div>
                                    <div class="row">
                                        
                                        <div class="col-sm-6 py-5">
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    NIP
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.nip" disabled maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Nama
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.name" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Gelar Depan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.fname" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Gelar Belakang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.lname" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tingkat Pendidikan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.leveledu" disabled maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Pendidikan Terakhir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.lastedu" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tempat Lahir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.place" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tanggal Lahir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.dob" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Dokumen Identitas
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.docid" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Nomor Dokumen Identitas
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.nodocid" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kontak
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.contact" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Email
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.email" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Kelamin
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.gender" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                   Agama
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.religion" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-12 col-sm-12">
                                                     <span class="text-black">
                                                    Alamat
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.address" disabled style="height: 80px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kelurahan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.villages" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kecamatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.district" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kecamatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.regency" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Provinsi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.province" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  

                                        <!-- Second group of columns -->
                               
                                        <div class="col-sm-6 py-5">
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                        ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                        ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                        ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    FOTO
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Pegawai
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.type" disabled maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Status
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.status" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Instansi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.agency" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Satuan Kerja Induk
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.unit" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Unit Organisasi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.subunit" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Lokasi Kerja
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.location" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jabatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.position" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    TMT Jabatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.tmtpos" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Golongan Ruang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.golru" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    TMT Golongan Ruang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.tmtgolru" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Masa Kerja (Tahun)
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.wyear" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Masa Kerja (Bulan)
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.wmonth" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
</section>


</template>

<script>
    //import layout
    import LayoutUser from '../../../Layouts/User.vue';
 
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
        layout: LayoutUser,

        //register component
        components: {
            Head,
            Link
        },

        //props
        props: {
            errors: Object,
            session: Object,
            data: Object,
        },
        
        //define composition API
        setup(props) {

            //define form state
            const form = reactive({
                nip: props.data.main.nip,
                name: props.data.main.name,
                email: props.data.main.email,
                contact: props.data.main.contact,
                fname: props.data.main.fname,
                lname: props.data.main.lname,
                leveledu: props.data.main.leveledu,
                lastedu: props.data.main.lastedu,
                place: props.data.main.place,
                dob: props.data.main.dob,
                docid: props.data.main.docid,
                nodocid: props.data.main.nodocid,
                gender: props.data.main.gender,
                religion: props.data.main.religion,
                address: props.data.main.address,
                villages: props.data.main.villages,
                district: props.data.main.district,
                regency: props.data.main.regency,
                province: props.data.main.province,
                type: props.data.main.type,
                status: props.data.main.status,
                agency: props.data.agency,
                unit: props.data.unit,
                subunit: props.data.subunit,
                location: props.data.location,
                position: props.data.position,
                tmtpos: props.data.tmtpos,
                golru: props.data.golru,
                tmtgolru: props.data.tmtgolru,
                wyear: props.data.wyear,
                wmonth: props.data.wmonth,
                
               
            });

            //return form state and submit method
            return {
                form,
            };

        }

    }

</script>
<style>
.text-black {
    color: black;
}
</style>