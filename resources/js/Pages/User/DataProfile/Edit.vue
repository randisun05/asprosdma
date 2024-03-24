<template>

    <Head>
        <title>Profile Anggota</title>
    </Head>
    <form @submit.prevent="submit" class="getin_form border-form" id="data">
        <section id="profile" class="container mt-4">
            <div class="container-fluid px-5">
                <div class="row d-flex justify-content-center">
                    <!-- First group of columns -->
                    <div class="col-sm-12 card shadow">
                        <div class="row">
                            <h3 class="text-center mt-4 text-black">
                                Update Profile Anggota
                            </h3>
                        </div>

                        <div class="row mt-4">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/user/profile">Profile</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Our Team-->

                        <div class="container py-4">
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="image" onclick="document.getElementById('image').click()">
                                        <img v-if="form.image" :src="getImageUrl(form.image)" alt=""
                                            class="rounded-circle" title="Ubah foto profil" />
                                        <img v-else src="/assets/images/team-grey-1.jpg" alt="" class="rounded-circle"
                                            title="Ubah foto profil" />
                                        <input type="file" id="image" style="display: none" placeholder="Ubah Foto"
                                            title="ubah foto profile" @change="updateImage"
                                            accept=".jpg, .jpeg, .png," />
                                    </div>
                                    <div>
                                        <input type="file" name="image" id="image" placeholder="Masukan Gambar/Foto"
                                            @change="updateImage" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>

                                <div class="col-lg-1">

                                </div>

                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-3 ms-5 py-2">
                                            <span> NIP </span>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" v-model="form.nip" maxlength="18" disabled
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                            <div v-if="errors.nip" class="alert-danger mt-1 rounded">
                                                {{ errors.nip }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-3 ms-5 py-2">
                                            <span> Nama </span>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" v-model="form.name" />
                                            <div v-if="errors.name" class="rounded alert-danger mt-1">
                                                {{ errors.name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-3 ms-5 py-2">
                                            <span> Gelar Depan </span>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" v-model="form.fname"
                                                onkeypress="return event.charCode < 48 || event.charCode > 57" />
                                            <div v-if="errors.fname" class="rounded alert-danger mt-1">
                                                {{ errors.fname }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-3 ms-5 py-2">
                                            <span> Gelar Belakang </span>
                                        </div>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" v-model="form.lname"
                                                onkeypress="return event.charCode < 48 || event.charCode > 57" />
                                            <div v-if="errors.lname" class="rounded alert-danger mt-1">
                                                {{ errors.lname }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-3 ms-5 py-2">
                                            <span> Instansi</span>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="position-relative" ref="dropdownWrapper">
                                                <div class="form-group mt-1">
                                                    <input type="text" class="form-control" placeholder="Pilih Instansi"
                                                        v-model="form.agency" @click="toggleSearch" readonly>
                                                </div>
                                                <div v-if="showDropdown" class="dropdown-menu position-absolute w-100">
                                                    <input type="text" class="form-control mb-2"
                                                        placeholder="Cari Instansi" v-model="searchInstansi">
                                                    <div class="dropdown-item-list" v-if="filteredInstansis.length > 0">
                                                        <button v-for="(instansi, index) in filteredInstansis"
                                                            :key="index" class="dropdown-item"
                                                            @click="selectInstansi(instansi)">
                                                            {{ instansi.title }}
                                                        </button>
                                                    </div>
                                                    <template v-else>
                                                        <div class="dropdown-item disabled">Instansi tidak ditemukan
                                                        </div>
                                                    </template>

                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="errors.agency" class="rounded alert-danger mt-2">
                                            {{ errors.agency }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Data Pribadei-->
                    <div class="col-sm-12 card shadow mt-4">
                        <div class="py-4">
                            <span> Data Pribadi </span>
                        </div>

                        <div class="row ms-2 mb-3">
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Tempat Lahir </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.place" />
                                </div>
                                <div v-if="errors.place" class="rounded alert-danger mt-2">
                                    {{ errors.place }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Tanggal Lahir </span>
                                <div class="form-group mt-1">
                                    <input type="date" class="form-control" v-model="form.dob" />
                                </div>
                                <div v-if="errors.dob" class="rounded alert-danger mt-2">
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
                                    <select class="form-select" v-model="form.docid">
                                        <option value="" disabled selected>Pilih salah satu opsi</option>
                                        <option value="KTP">KTP</option>
                                        <option value="Passport">Passport</option>
                                    </select>
                                </div>
                                <div v-if="errors.docid" class="rounded alert-danger mt-2">
                                    {{ errors.docid }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black">
                                    Nomor Dokumen Identitas
                                </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.nodocid" maxlength="25"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                </div>
                                <div v-if="errors.nodocid" class="rounded alert-danger mt-2">
                                    {{ errors.nodocid }}
                                </div>
                            </div>
                        </div>
                        <div class="row ms-2 mb-3">
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Kontak </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.contact"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                        maxlength="13" />
                                </div>
                                <div v-if="errors.contact" class="rounded alert-danger mt-2">
                                    {{ errors.contact }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Email </span>
                                <div class="form-group mt-1">
                                    <input type="email" class="form-control" v-model="form.email" />
                                </div>
                                <div v-if="errors.email" class="rounded alert-danger mt-2">
                                    {{ errors.email }}
                                </div>
                            </div>
                        </div>
                        <div class="row ms-2 mb-3">
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Jenis Kelamin </span>
                                <div class="form-group mt-1">
                                    <select class="form-select" v-model="form.gender">
                                        <option value="" disabled selected>Pilih salah satu opsi</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div v-if="errors.gender" class="rounded alert-danger mt-2">
                                    {{ errors.gender }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Agama </span>
                                <div class="form-group mt-1">
                                    <select class="form-select" v-model="form.religion">
                                        <option value="" disabled selected>Pilih salah satu opsi</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                    </select>
                                </div>
                                <div v-if="errors.religion" class="rounded alert-danger mt-2">
                                    {{ errors.religion }}
                                </div>
                            </div>
                        </div>
                        <div class="row ms-2 mb-3">
                            <div class="col-md-12 col-sm-12">
                                <span class="text-black"> Alamat </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.address"
                                        style="height: 80px" />
                                </div>
                                <div v-if="errors.address" class="rounded alert-danger mt-2">
                                    {{ errors.address }}
                                </div>
                            </div>
                        </div>

                        <div class="row ms-2 mb-3">
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Provinsi </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.province" />
                                </div>
                                <div v-if="errors.province" class="rounded alert-danger mt-2">
                                    {{ errors.province }}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Kota/Kabupaten </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.regency" />
                                </div>
                                <div v-if="errors.regency" class="rounded alert-danger mt-2">
                                    {{ errors.regency }}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Kelurahan </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.villages" />
                                </div>
                                <div v-if="errors.villages" class="rounded alert-danger mt-2">
                                    {{ errors.villages }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black"> Kecamatan </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.district" />
                                </div>
                                <div v-if="errors.district" class="rounded alert-danger mt-2">
                                    {{ errors.district }}
                                </div>
                            </div>
                        </div>
                        <div class="row ms-2 mb-3">


                        </div>
                    </div>

                    <div class="col-sm-12 card shadow mt-4">
                        <div class="py-4">
                            <span> Data Pendidikan </span>
                        </div>

                        <div class="row ms-2 mb-3">
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black">
                                    Tingkat Pendidikan
                                </span>
                                <div class="form-group mt-1">
                                    <select class="form-select" v-model="form.leveledu">
                                        <option value="" disabled selected>Pilih salah satu opsi</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="D-3">D-3</option>
                                        <option value="D-4">D-4</option>
                                        <option value="S-1">S-1</option>
                                        <option value="S-2">S-2</option>
                                        <option value="S-3">S-3</option>
                                    </select>

                                </div>
                                <div v-if="errors.leveledu" class="rounded alert-danger mt-2">
                                    {{ errors.leveledu }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="text-black">
                                    Pendidikan Terakhir
                                </span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control" v-model="form.lastedu" />
                                </div>
                                <div v-if="errors.lastedu" class="rounded alert-danger mt-2">
                                    {{ errors.lastedu }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center py-5">
                        <button type="submit" class="button btnprimary" style="width: 300px;">Submit</button>
                        <a href="/user/profile" class="button btnsecondary" style="width: 300px;">Batal</a>
                    </div>
                </div>
            </div>
        </section>
    </form>
</template>

<script>
//import layout
import LayoutUser from "../../../Layouts/User.vue";

//import Head from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import reactive
import { reactive } from "vue";

//import sweet alert2
import Swal from "sweetalert2";

//import inertia adapter
import { Inertia } from "@inertiajs/inertia";

export default {

    data() {
        return {
            searchInstansi: '',
            showDropdown: false
        };
    },

    // computed property to filter instansis based on search input
    computed: {
        filteredInstansis() {
            return this.instansis.filter(instansi =>
                instansi.title.toLowerCase().includes(this.searchInstansi.toLowerCase())
            );
        }
    },

    methods: {
        // method to toggle dropdown visibility
        toggleSearch() {
            this.showDropdown = !this.showDropdown;
            if (this.showDropdown) {
                // Menambahkan event listener ke elemen body
                document.body.addEventListener('click', this.closeDropdownOutside);
            } else {
                // Menghapus event listener dari elemen body
                document.body.removeEventListener('click', this.closeDropdownOutside);
            }
        },

        // method to close dropdown when clicked outside
        closeDropdownOutside(event) {
            if (!this.$refs.dropdownWrapper.contains(event.target)) {
                this.showDropdown = false;
                document.body.removeEventListener('click', this.closeDropdownOutside);
            }
        },

        // method to select an instansi from dropdown
        selectInstansi(instansi) {
            this.form.agency = instansi.title;
            this.searchInstansi = ''; // reset search input after selection
            this.showDropdown = false; // hide dropdown after selection
        }
    },

    //layout
    layout: LayoutUser,

    //register component
    components: {
        Head,
        Link,
    },

    //props
    props: {
        errors: Object,
        session: Object,
        data: Object,
        instansis: Array
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
            agency: props.data.agency,
            image: props.data.main.image
        });

        //submit method
        const submit = () => {
            //send data to server
            Inertia.post(
                "/user/profile/edit",
                {
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
                    image: form.image,
                    agency: form.agency

                },
                {
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: "Success!",
                            text: "Data Anggota Berhasil Diupdate.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    },
                }
            );
        };

        // Method to get the URL of the document
        const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

        const updateImage = (event) => {
            form.image = event.target.files[0];
        };

        //return form state and submit method
        return {
            form,
            submit,
            getImageUrl,
            updateImage
        };
    },
};
</script>
<style></style>
