<template>
    <Head>
        <title>Update Merchandise</title>
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
                                            <Link href="/admin/merchans" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Update Merchandise</h3>
                        <form @submit.prevent="submit" enctype="multipart/form-data">
                                <div class="row py-4 ms-5">
                                            <div class="col-md-5">
                                                <span>
                                                Nama Merchandise
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="text" class="form-control" placeholder="Masukan Title" v-model="form.title">
                                                </div>
                                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                                    {{ errors.title }}
                                                </div>
                                            </div>

                                                <div class="col-md-6 mb-4">
                                                    <span>
                                                    Sub-Title
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" placeholder="Masukan Sub-Title" v-model="form.subtitle">
                                                    </div>
                                                    <div v-if="errors.subtitle" class="alert alert-danger mt-2">
                                                        {{ errors.subtitle }}
                                                    </div>
                                                </div>

                                                <div class="col-md-5 mb-4">
                                                    <span>
                                                    Warna
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" placeholder="Masukan Warna" v-model="form.color">
                                                    </div>
                                                    <div v-if="errors.color" class="alert alert-danger mt-2">
                                                        {{ errors.color }}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-4">
                                                    <span>
                                                    Harga
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="text" class="form-control" placeholder="Masukan Harga" v-model="form.price">
                                                    </div>
                                                    <div v-if="errors.price" class="alert alert-danger mt-2">
                                                        {{ errors.price }}
                                                    </div>
                                                </div>

                                            <div class="col-md-11 mb-4">
                                                <span>
                                                Deskripsi
                                                </span>
                                                <Editor
                                                        api-key="1r5zhfhbvfala2snldia4kj7eub4vbev5i6i4mnf9r8smbsb"
                                                        v-model="form.body"
                                                        :init="{
                                                            menubar: false,
                                                            plugins: 'lists link image emoticons media',
                                                            toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image emoticons'
                                                        }"
                                                    />
                                            </div>

                                            <div class="col-md-11 mb-4">
                                                <span>
                                                How To Buy
                                                </span>
                                                <Editor
                                                        api-key="1r5zhfhbvfala2snldia4kj7eub4vbev5i6i4mnf9r8smbsb"
                                                        v-model="form.how"
                                                        :init="{
                                                            menubar: false,
                                                            plugins: 'lists link image emoticons media',
                                                            toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image emoticons'
                                                        }"
                                                    />
                                            </div>

                                            <div class="col-md-5">
                                                    <span>
                                                    Image
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
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-md btn-primary border-0 shadow me-2">Simpan</button>
                                                <Link href="/admin/merchans" class="btn btn-md btn-primary border-0 shadow" type="button">Batal</Link>
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

    //import Heade and Link from Inertia
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    //import tinyMCE
    import Editor from '@tinymce/tinymce-vue';

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
            merchan: Object

        },


        //inisialisasi composition API
        setup(props) {

        //define form state
        const form = reactive({
                title: props.merchan.title,
                body: props.merchan.body,
                image: '',
                how: props.merchan.how,
                subtitle: props.merchan.subtitle,
                color: props.merchan.color,
                price: props.merchan.price,
            });


            //submit method
            const submit = () => {

                //send data to server
                Inertia.post(`/admin/merchans/${props.merchan.id}`, {

                    //data
                    title: form.title,
                    body: form.body,
                    image: form.image,
                    how: form.how,
                    price: form.price,
                    subtitle: form.subtitle,
                    color: form.color,

                } ,{
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Merchandise Berhasil Diupdate.',
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

</style>
