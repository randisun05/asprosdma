<template>
    <Head>
        <title>Document Digital</title>
    </Head>
    <div class="container-fluid padding px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 col-12 mb-2">
                        <Link href="/admin/docudigi/create" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
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
                                        <th class="border-0">Nomor Surat</th>
                                        <th class="border-0">Tanggal</th>
                                        <th class="border-0">Perihal</th>
                                        <th class="border-0">Tujuan</th>
                                        <th class="border-0">Ttd / Paraf</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(docu, index) in docus.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (docus.current_page - 1) * docus.per_page }}</td>
                                        <td>{{ docu.no_surat }}</td>
                                        <td>{{ formatDate(docu.created_at) }}</td>
                                        <td>{{ docu.perihal }}</td>
                                        <td>{{ docu.tujuan }}</td>
                                        <td>{{ docu.nipttd }} / {{ docu.nipparaf }}</td>
                                        <td><span class="badge bg-secondary" v-if="docu.status === 'submitted' && docu.ttdparaf != '' "> Belum Paraf</span>
                                            <span class="badge bg-warning" v-if="docu.status === 'paraf' "> Belum TTD</span>
                                            <span class="badge bg-success" v-if="docu.status === 'approved'"> Approved</span>
                                        </td>
                                        <td class="text-center" >
                                            <!-- <Link :href="`/admin/docidigi/${docu.id}/edit`" class="btn btn-sm btn-warning border-0 shadow me-2" type="button" title="edit"><i class="fa fa-pencil"></i></Link> -->
                                            <a class="btn btn-sm btn-primary border-0 me-1" data-fancybox="" :href="getDocumentUrl(docu.document)"><i class="fa fa-eye"></i></a>
                                            <button v-if="docu.status === 'submitted' && docu.ttdparaf != '' && ($page.props.auth.user.role === 'administrator' || $page.props.auth.user.role === 'sekretaris')" @click.prevent="paraf(docu.id)" class="btn btn-sm btn-warning border-0 me-1">Paraf</button>
                                            <button v-if="docu.status === 'paraf'" @click.prevent="approve(docu.id) && ($page.props.auth.user.role === 'administrator' || $page.props.auth.user.role === 'sekretaris')" class="btn btn-sm btn-success border-0 me-1">Approve</button>
                                            <button v-if="$page.props.auth.user.role === 'administrator'" @click.prevent="destroy(docu.id)" class="btn btn-sm btn-danger border-0 me-1"><i class="fa fa-trash" title="hapus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="docus.links" align="end" />
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
            docus :Object,

        },



        //inisialisasi composition API
        setup(props) {
            const auth = props.auth;
            const administrator = 'administrator';


            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/admin/docudigi', {

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

                            Inertia.delete(`/admin/docudigi/${id}`);

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

             //define method destroy
             const paraf = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda yakin akan melakukan paraf dokumen ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            Inertia.get(`/admin/docudigi/${id}/paraf`);

                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Dokumen Berhasil Diparaf!.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                    })
            }


             //define method destroy
             const approve = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda yakin akan melakukan menandatangan dokumen ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, approve it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            Inertia.get(`/admin/docudigi/${id}/approve`);

                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Dokumen Berhasil Ditanda tangan!.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                    })
            }


             //define method destroy
             const cancel = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, cancel it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            Inertia.get(`/admin/docudigi/${id}/cancel`);

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
         const getDocumentUrl = (documentName) => {
            return `/storage/${documentName}`;
        }

            // Method to format date
            const formatDate = (dateString) => {
                return new Date(dateString).toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: '2-digit' });
            };

            //return
            return {
                search,
                handleSearch,
                destroy,
                getDocumentUrl,
                paraf,
                approve,
                cancel,
                formatDate

        }
    }
}

</script>

<style>

</style>
