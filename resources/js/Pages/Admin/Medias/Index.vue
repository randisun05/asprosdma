<template>
    <Head>
        <title>Media</title>
    </Head>
    <div class="container-fluid padding px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 col-12 mb-2">
                        <Link href="/admin/medias/create" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                            class="fa fa-plus-circle"></i>
                         Tambah</Link>
                    </div>
                    <div class="col-md-6 col-12 mb-2">
                        <form @submit.prevent="handleSearch">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow" v-model="search" placeholder="masukkan kata kunci dan enter...">
                                <span class="input-group-text border-0 shadow">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0 text-center">
                                        <th class="border-0 rounded-start" style="width:5%">No.</th>
                                        <th class="border-0"></th>
                                        <th class="border-0">Title</th>
                                        <th class="border-0">Kegiatan</th>
                                        <th class="border-0">Path</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(media, index) in medias.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (medias.current_page - 1) * medias.per_page }}</td>
                                        <td style="width: 380px;"><img class="image" v-if="media.media" :src="getImageUrl(media.media)" alt="Gambar" /></td>
                                        <td>{{ media.title }}</td>
                                        <td>{{ media.event.title }}</td>
                                        <td>/storage/{{ media.media }}</td>
                                        <td class="text-center" >
                                            <Link :href="`/admin/medias/${media.id}/edit`" class="btn btn-sm btn-warning border-0 shadow me-2" type="button" title="edit"><i class="fa fa-pencil"></i></Link>
                                            <button @click.prevent="destroy(media.id)" class="btn btn-sm btn-danger border-0 me-2"><i class="fa fa-trash" title="hapus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="medias.links" align="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    //import component pagination
    import Pagination from '../../../Components/Pagination.vue';

    //import Heade and Link from Inertia
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    //import ref from vue
    import {
        ref, reactive
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
            Pagination
        },

        //props
        props: {
            errors :Object,
            medias :Object,

        },



        //inisialisasi composition API
        setup() {


            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/admin/medias', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }

            //define method destroy
            const destroy = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            Inertia.delete(`/admin/medias/${id}`);

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Media Berhasil Dihapus!.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                    })
            }

            // Method to get the URL of the document
         const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

            //return
            return {
                search,
                handleSearch,
                destroy,
                getImageUrl,

        }
    }
}

</script>

<style>
.image {
    display: flex;
    justify-content: center; /* Untuk membuat gambar berada di tengah secara horizontal */
    align-items: center; /* Untuk membuat gambar berada di tengah secara vertikal */
    height: 200px; /* Atur tinggi sesuai kebutuhan Anda */
}

.image img {
    max-width: 100%;
    max-height: 100%;
    /* Anda dapat menyesuaikan properti CSS untuk gambar sesuai kebutuhan Anda */
}

</style>
