<template>
    <Head>
        <title>Edit Cerita</title>
    </Head>
    <div class="container padding px-5">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row py-4">
                                        <div class="col-md-2 col-12 mb-2">
                                            <Link href="/admin/admin/posts" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Update Cerita/Artikel/Berita</h3>
                        <form @submit.prevent="submit">
                                <div class="row py-4 ms-5">
                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Judul
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <input type="text" class="form-control" placeholder="Masukan Judul Cerita/Artikel/Berita" v-model="form.title">
                                                </div>
                                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                                    {{ errors.title }}
                                                </div>
                                            </div>

                                            <div class="col-md-11">
                                                <span class="text-black">
                                                Kategori
                                                </span>
                                                <div class="form-group mt-1 mb-4">
                                                    <select class="form-select" v-model="form.category">
                                                        <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.title }}</option>
                                                    </select>
                                                </div>
                                                <div v-if="errors.category" class="alert alert-danger mt-2">
                                                    {{ errors.category }}
                                                </div>
                                            </div>

                                                <span class="text-black">
                                                Text
                                                </span>
                                            <div class="col-md-11">
                                                <div class="mb-4">
                                                    <Editor
                                                        api-key="1r5zhfhbvfala2snldia4kj7eub4vbev5i6i4mnf9r8smbsb"
                                                        v-model="form.body"
                                                        style="height: 500px;"
                                                        :init="{
                                                            menubar: false,
                                                            plugins: 'lists link image emoticons',
                                                            toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image emoticons'
                                                        }"
                                                    />
                                                </div>

                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <label class="form-check-label">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input"
                                                        v-model="form.docstatus"
                                                        :checked="post.docstatus === 1"
                                                        true-value="1"
                                                        false-value="0"
                                                    />
                                                    Tampilkan Dokumen
                                                </label>


                                                <div v-if="errors.body" class="alert alert-danger mt-2">
                                                    {{ errors.body }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <span class="text-black">
                                                    Ganti Gambar/Foto
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="file" class="form-control" placeholder="Masukan Gambar/Foto" @change="updateImage" accept=".jpg, .jpeg, .png, .svg, .gif">
                                                    </div>
                                                    <div v-if="errors.picture" class="alert alert-danger mt-2">
                                                        {{ errors.picture }}
                                                    </div>
                                                    <div v-if="errors[0]" class="alert alert-danger mt-2">
                                                        {{ errors[0] }}
                                                    </div>

                                                </div>
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-5">
                                                    <span class="text-black">
                                                    Ganti Dokumen
                                                    </span>
                                                    <div class="form-group mt-1">
                                                        <input type="file" class="form-control" placeholder="Masukan Dokumen" @change="updateDocument" accept=".pdf">
                                                    </div>
                                                    <div v-if="errors.document" class="alert alert-danger mt-2">
                                                    {{ errors.document }}
                                                </div>
                                                <div v-if="errors[0]" class="alert alert-danger mt-2">
                                                    {{ errors[0] }}
                                                </div>


                                                </div>
                                            </div>
                                </div>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-md btn-primary border-0 shadow me-2">Update</button>
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
        post: {
            type: Object,
            default: null  // Default value is set to null
        },
        categories: Object
    },


        //inisialisasi composition API
        setup(props) {

        //define form state
        const form = reactive({
                title: props.post.title,
                category: props.post.category_id,
                body: props.post.body,
                picture: props.post.image,
                document: props.post.document,
                docstatus: props.post.docstatus,
            });


            //submit method
            const submit = () => {

                //send data to server
                Inertia.post(`/admin/posts/${props.post.id}`, {
                    //data
                    title: form.title,
                    category: form.category,
                    body: form.body,
                    picture: form.picture,
                    document: form.document,
                    docstatus: form.docstatus,
                } ,{
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: 'Cerita Anda Berhasil Disimpan.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });
            }


            // Method to update the document file
            const updateDocument = (event) => {
                form.document = event.target.files[0];
            };

            const updateImage = (event) => {
            form.picture = event.target.files[0];
        };


            //return
            return {
                form,
                submit,
                updateDocument,
                updateImage
        }
    }
}

</script>

<style>

</style>
