<template>
    <Head>
        <title>Buat Cerita</title>
    </Head>
    <div class="container padding px-5 text-black">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row py-4">
                                        <div class="col-md-2 col-12 mb-2">
                                            <Link href="/admin/events" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Buat Events</h3>
                        <form @submit.prevent="submit" enctype="multipart/form-data">
                                <div class="row py-4 ms-5">
                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Judul
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="text" class="form-control" placeholder="Masukan Nama kegiatan" v-model="form.title">
                                                </div>
                                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                                    {{ errors.title }}
                                                </div>
                                            </div>

                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Deskripsi
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <Editor
                                                        api-key="1r5zhfhbvfala2snldia4kj7eub4vbev5i6i4mnf9r8smbsb"
                                                        v-model="form.body"
                                                        :init="{
                                                            menubar: false,
                                                            plugins: 'lists link image emoticons',
                                                            toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image emoticons'
                                                        }"
                                                    />
                                                </div>
                                                <div v-if="errors.body" class="alert alert-danger mt-2">
                                                    {{ errors.body }}
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <span class="text-black">
                                                Tanggal Pelaksanaan
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="date" class="form-control" placeholder="Masukan Judul Cerita/Artikel/Berita" v-model="form.date">
                                                </div>
                                                <div v-if="errors.date" class="alert alert-danger mt-2">
                                                    {{ errors.date }}
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <span class="text-black">
                                                Tutup Pendaftaran
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="date" class="form-control" placeholder="Masukan Judul Cerita/Artikel/Berita" v-model="form.enddate">
                                                </div>
                                                <div v-if="errors.enddate" class="alert alert-danger mt-2">
                                                    {{ errors.enddate }}
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Kapasitas Peserta
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="number" class="form-control" placeholder="Masukan Kapasitas Peserta" v-model="form.participant">
                                                </div>
                                                <div v-if="errors.participant" class="alert alert-danger mt-2">
                                                    {{ errors.participant }}
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Upload File
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                   <select type="form-select" class="form-control" id="file" v-model="form.file">
                                                    <option value="N" selected>N</option>
                                                    <option value="Y">Y</option>
                                                   </select>
                                                </div>
                                                <div v-if="errors.participant" class="alert alert-danger mt-2">
                                                    {{ errors.participant }}
                                                </div>
                                            </div>

                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Tempat Pelaksanaan
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="text" class="form-control" placeholder="Masukan Tempat Pelaksanaan Kegiatan" v-model="form.place">
                                                </div>
                                                <div v-if="errors.place" class="alert alert-danger mt-2">
                                                    {{ errors.place }}
                                                </div>
                                            </div>

                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Link
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="text" class="form-control" placeholder="Masukan Tempat Pelaksanaan Kegiatan" v-model="form.link">
                                                </div>
                                                <div v-if="errors.link" class="alert alert-danger mt-2">
                                                    {{ errors.link }}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <span class="text-black">
                                                    Gambar/Foto
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="file" class="form-control" placeholder="Masukan Gambar/Foto" @change="updateImage" accept=".jpg, .jpeg, .png, .svg, .gif">
                                                    </div>
                                                    <div v-if="errors.image" class="alert alert-danger mt-2">
                                                        {{ errors.image }}
                                                    </div>
                                                    <div v-if="errors[0]" class="alert alert-danger mt-2">
                                                        {{ errors[0] }}
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-md btn-primary border-0 shadow me-2">Simpan</button>
                                                <button type="reset" class="btn btn-md btn-warning border-0 shadow">Reset</button>
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

    //import tinyMCE
    import Editor from '@tinymce/tinymce-vue';

    //import Heade and Link from Inertia
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    //import ref from vue
    import {
        ref, reactive,
    } from 'vue';

    //import inertia adapter
    import { Inertia } from '@inertiajs/inertia';

    //import sweet alert2
    import Swal from 'sweetalert2';

    export default {
        //layout
        layout: LayoutAdmin,

        //register component
        components: {
            Head,
            Link,
            Editor,
        },

        //props
        props: {
            errors: Object,

        },


        //inisialisasi composition API
        setup() {

        //define form state
        const form = reactive({
                title: '',
                date: '',
                enddate: '',
                body: '',
                place: '',
                link: '',
                participant: '',
                image: '',
                file:''
            });


            //submit method
            const submit = () => {

                //send data to server
                Inertia.post('/admin/events/', {

                    //data
                    title: form.title,
                    date: form.date,
                    enddate: form.enddate,
                    body: form.body,
                    participant: form.participant,
                    image: form.image,
                    place: form.place,
                    link: form.link,
                    file: form.file
                } ,{
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Event Berhasil Disimpan.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });
            }




            const updateImage = (event) => {
            form.image = event.target.files[0];
        };


            //return
            return {
                form,
                submit,
                updateImage


        }
    }
}

</script>

<style>
.text-black{
    color: black;
}
</style>
