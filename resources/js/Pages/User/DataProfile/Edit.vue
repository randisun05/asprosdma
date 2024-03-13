<template>

    <Head>
        <title>Update Profile Anggota</title>
    </Head>
  
                <section id="profile" class="mt-4">
                    <div class="container-fluid px-5">
                        <div class="row d-flex justify-content-center">
                        <!-- First group of columns -->
                        <div class="col-sm-12 card shadow">
                            <div class="row"> 
                                <h3 class="text-center mt-4 text-black">Update Profile Anggota</h3>
                            </div>
                            <form @submit.prevent="submit" class="getin_form border-form" id="login">
                                    <div class="row">
                                        <div class="col-sm-6 py-5">
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    NIP
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.nip" disabled maxlength="18" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Nama
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.name" placeholder="Masukan Nama Lengkap">
                                                    </div>
                                                    <div v-if="errors.name" class="alert alert-danger mt-2">
                                                        {{ errors.name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Gelar Depan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.fname" placeholder="Masukan Gelar Depan">
                                                    </div>
                                                    <div v-if="errors.fname" class="alert alert-danger mt-2">
                                                        {{ errors.fname }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Gelar Belakang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.lname" placeholder="Masukan Gelar Belakang">
                                                    </div>
                                                    <div v-if="errors.lname" class="alert alert-danger mt-2">
                                                        {{ errors.lname }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tingkat Pendidikan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.leveledu">
                                                    </div>
                                                    <div v-if="errors.leveledu" class="alert alert-danger mt-2">
                                                        {{ errors.leveledu }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Pendidikan Terakhir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.lastedu" placeholder="Masukan Pendidikan Terakhir">
                                                    </div>
                                                    <div v-if="errors.lastedu" class="alert alert-danger mt-2">
                                                        {{ errors.lastedu }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tempat Lahir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.place" placeholder="Masukan Tempat Lahir">
                                                    </div>
                                                    <div v-if="errors.place" class="alert alert-danger mt-2">
                                                        {{ errors.place }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Tanggal Lahir
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="date" class="form-control" v-model="form.dob" placeholder="Masukan Tanggal Lahir">
                                                    </div>
                                                    <div v-if="errors.dob" class="alert alert-danger mt-2">
                                                        {{ errors.dob }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Dokumen Identitas
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.docid">
                                                    </div>
                                                    <div v-if="errors.docid" class="alert alert-danger mt-2">
                                                        {{ errors.docid }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Nomor Dokumen Identitas
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.nodocid" placeholder="Masukan Nomor Dokumen">
                                                    </div>
                                                    <div v-if="errors.nodocid" class="alert alert-danger mt-2">
                                                        {{ errors.nodocid }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kontak
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.contact" placeholder="Masukan Nomor Kontak">
                                                    </div>
                                                    <div v-if="errors.contact" class="alert alert-danger mt-2">
                                                        {{ errors.contact }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Email
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.email" placeholder="Masukan Email Aktif">
                                                    </div>
                                                    <div v-if="errors.email" class="alert alert-danger mt-2">
                                                        {{ errors.email }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Kelamin
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.gender">
                                                    </div>
                                                    <div v-if="errors.gender" class="alert alert-danger mt-2">
                                                        {{ errors.gender }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Agama
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.religion">
                                                    </div>
                                                    <div v-if="errors.religion" class="alert alert-danger mt-2">
                                                        {{ errors.religion }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-12 col-sm-12">
                                                     <span class="text-black">
                                                    Alamat
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.address" style="height: 80px">
                                                    </div>
                                                    <div v-if="errors.address" class="alert alert-danger mt-2">
                                                        {{ errors.address }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kelurahan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.villages">
                                                    </div>
                                                    <div v-if="errors.villages" class="alert alert-danger mt-2">
                                                        {{ errors.villages }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kecamatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.district">
                                                    </div>
                                                    <div v-if="errors.district" class="alert alert-danger mt-2">
                                                        {{ errors.district }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ms-2 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Kecamatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.regency">
                                                    </div>
                                                    <div v-if="errors.regency" class="alert alert-danger mt-2">
                                                        {{ errors.regency }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Provinsi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.province">
                                                    </div>
                                                    <div v-if="errors.province" class="alert alert-danger mt-2">
                                                        {{ errors.province }}
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
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                        ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                        ---------------
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <span class="text-black">
                                                    FOTO
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jenis Pegawai
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.type">
                                                    </div>
                                                    <div v-if="errors.type" class="alert alert-danger mt-2">
                                                        {{ errors.type }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Status
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.status">
                                                    </div>
                                                    <div v-if="errors.status" class="alert alert-danger mt-2">
                                                        {{ errors.status }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Instansi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.agency" placeholder="Masukan Instansi">
                                                    </div>
                                                    <div v-if="errors.agency" class="alert alert-danger mt-2">
                                                        {{ errors.agency }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Satuan Kerja Induk
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.unit"  placeholder="Masukan Satuan Kerja Induk">
                                                    </div>
                                                    <div v-if="errors.unit" class="alert alert-danger mt-2">
                                                        {{ errors.unit }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Unit Organisasi
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.subunit" placeholder="Masukan Unit Organisasi">
                                                    </div>
                                                    <div v-if="errors.subunit" class="alert alert-danger mt-2">
                                                        {{ errors.subunit }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Lokasi Kerja
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.location" placeholder="Masukan Lokasi Kerja">
                                                    </div>
                                                    <div v-if="errors.location" class="alert alert-danger mt-2">
                                                        {{ errors.location }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Jabatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.position" placeholder="Masukan Jabatan">
                                                    </div>
                                                    <div v-if="errors.position" class="alert alert-danger mt-2">
                                                        {{ errors.position }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    TMT Jabatan
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="date" class="form-control" v-model="form.tmtpos" placeholder="Masukan TMT Jabatan">
                                                    </div>
                                                    <div v-if="errors.tmtpos" class="alert alert-danger mt-2">
                                                        {{ errors.tmtpos }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Golongan Ruang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.golru">
                                                    </div>
                                                    <div v-if="errors.golru" class="alert alert-danger mt-2">
                                                        {{ errors.golru }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    TMT Golongan Ruang
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="date" class="form-control" v-model="form.tmtgolru" placeholder="Masukan TMT Golru">
                                                    </div>
                                                    <div v-if="errors.tmtgolru" class="alert alert-danger mt-2">
                                                        {{ errors.tmtgolru }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Masa Kerja (Tahun)
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.wyear" placeholder="Masukan Masa Kerja">
                                                    </div>
                                                    <div v-if="errors.wyear" class="alert alert-danger mt-2">
                                                        {{ errors.wyear }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                     <span class="text-black">
                                                    Masa Kerja (Bulan)
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" v-model="form.wmonth" placeholder="Masukan Masa Kerja">
                                                    </div>
                                                    <div v-if="errors.wmonth" class="alert alert-danger mt-2">
                                                        {{ errors.wmonth }}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row px-3 mb-3 mt-4 py-4">
                                                <div class="col-md-6 col-sm-6">
                                                    <button type="submit" class="button btnprimary" style="width: 300px;">Simpan</button>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <Link href="/user/profile" class="button btnsecondary border-0 shadow mb-3" type="button"><i class="fa fa-long-arrow-alt-left me-2"></i> Batal</Link>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
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
                fname: props.data.main.fname,
                lname: props.data.main.lname,
                leveledu: props.data.main.leveledu,
                lastedu: props.data.main.lastedu,
                place: props.data.main.place,
                dob: props.data.main.dob,
                docid: props.data.main.docid,
                nodocid: props.data.main.nodocid,
                email: props.data.main.email,
                contact: props.data.main.contact,
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
                location: props.data.location,
                subunit: props.data.subunit,
                position: props.data.position,
                tmtpos: props.data.tmtpos,
                golru: props.data.golru,
                tmtgolru: props.data.tmtgolru,
                wyear: props.data.wyear,
                wmonth: props.data.wmonth,
            });

             //submit method
             const submit = () => {

                //send data to server
                Inertia.post('/user/profile/edit', {

                    //data
                nip: form.nip,
                name: form.name,
                fname: form.fname,
                lname: form.lname,
                leveledu: form.leveledu,
                lastedu: form.lastedu,
                place: form.place,
                dob: form.dob,
                docid: form.docid,
                nodocid: form.nodocid,
                email: form.email,
                contact: form.contact,
                gender: form.gender,
                religion: form.religion,
                address: form.address,
                villages: form.villages,
                district: form.district,
                regency: form.regency,
                province: form.province,
                type: form.type,
                status: form.status,
                agency: form.agency,
                unit: form.unit,
                subunit: form.subunit,
                position: form.position,
                location: form.location,
                tmtpos: form.tmtpos,
                golru: form.golru,
                tmtgolru: form.tmtgolru,
                wyear: form.wyear,
                wmonth: form.wmonth,
                } ,{
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data Anggota Berhasil Diupdate.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });

                }

            //return form state and submit method
            return {
                form,
                submit
            };

        }

    }

</script>
<style>
.text-black {
    color: black;
}
</style>