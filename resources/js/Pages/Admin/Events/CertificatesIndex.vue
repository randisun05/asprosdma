<template>
    <Head>
        <title>Administrator</title>
    </Head>
    <div class="container-fluid padding px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 col-12 mb-2">
                                            <Link :href="`/admin/events/`" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                    <div class="col-md-2 col-12 mb-2">
                        <Link :href="`/admin/events/${event.id}/certificates/create`" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
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
                                        <th class="border-0">Nomor</th>
                                        <th class="border-0">NIP</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Instansi</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(data, index) in datas.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (datas.current_page - 1) * datas.per_page }}</td>
                                        <td>{{ data.no_certificate }}</td>
                                        <td>{{ data.nip }}</td>
                                        <td>{{ data.name}}</td>
                                        <td>{{ data.status }}</td>
                                        <td class="text-center">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <Pagination :links="datas.links" align="end" />
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
            errors: Object,
            event: Object,
            datas: Object,
        },


        //inisialisasi composition API
        setup() {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get(`/admin/events/${event.id}/certificates`, {

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

                            Inertia.delete(`/admin/events/${event.id}/certificates/${id}`);

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Event Berhasil Dihapus!.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                    })
            }


            //return
            return {
                search,
                handleSearch,
                destroy,

        }
    }
}

</script>

<style>

</style>
