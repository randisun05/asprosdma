<template>
    <Head>
        <title>Administrator</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 col-12 mb-2">
                        <Link href="/admin/events/create" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
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
                                        <th class="border-0">Nama Kegiatan</th>
                                        <th class="border-0">Pelaksanaan / Pendaftara</th>
                                        <th class="border-0">Panitia/Peserta</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(event, index) in events.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (events.current_page - 1) * events.per_page }}</td>
                                        <td>{{ event.title }}</td>
                                        <td>{{ event.date}} / {{ event.enddate}}</td>
                                        <td>{{ event.team }} / {{ event.participant }}</td>
                                        <td> <span v-if="event.status === 'aktif'" class="badge bg-success">{{ event.status }}</span>
                                            <span v-else-if="event.status === 'ditutup'" class="badge bg-warning">{{ event.status }}</span>
                                        </td>
                                        <td class="text-center">
                                            <Link :href="`/admin/events/${event.id}`" title="view" class="btn btn-sm btn-primary border-0 shadow me-2" type="button"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></Link>
                                            <Link :href="`/admin/events/${event.id}/edit`" title="edit" class="btn btn-sm btn-warning border-0 shadow me-2"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i> </Link>
                                            <button @click="destroy(event.id)" title="tolak" class="btn btn-sm btn-danger border-0 shadow me-2"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>             
                         <Pagination :links="events.links" align="end" />
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
        ref
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
            events: Object,
            details: Object,
        },

        
        //inisialisasi composition API
        setup() {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/admin/posts', {

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

                            Inertia.delete(`/user/posts/${id}`);

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Peserta Berhasil Dihapus!.',
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
