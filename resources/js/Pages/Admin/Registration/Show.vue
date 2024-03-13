<template>
    <Head>
        <title>Administrator</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <Link href="/admin/registration" class="btn btn-md btn-primary border-0 shadow mb-3" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                Kembali</Link>
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5><i class="fa fa-bookmark"></i> Data Pengusul</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <span class="ms-4">
                                        NIP
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.nip">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <span class="ms-4">
                                        Nama
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.name">
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-sm-6">
                                <span class="ms-4">
                                        Email
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="email" class="form-control" v-model="form.email">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <span class="ms-4">
                                        Nomor Kontak
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.contact">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <span class="ms-4">
                                        Instansi
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.agency">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <span class="ms-4">
                                        Jabatan
                                </span>
                                <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.position">
                                </div>
                            </div>
                     
                            <div class="col-md-3 col-sm-3">
                                <span class="ms-4">
                                        Jenjang
                                </span>
                                <div class="form-group bottom35 mt-1">
                                    <div class="form-group bottom35 mt-1">
                                        <input type="text" class="form-control" v-model="form.level">
                                </div>
                            </div>  
                        </div>
                            <div class="col-md-6 col-sm-6">
                                <a :href="getDocumentUrl(form.document_jab)" target="_blank" class="badge bg-primary fs-5 border-0 shadow me-4 fs-5" type="button">
                                    View SK Jabatan
                                </a>
                                <span v-if="register.status === 'approved'" class="badge bg-success fs-5">Status {{ register.status }}</span>
                                <span v-else-if="register.status === 'confirm'" class="badge bg-warning fs-5">Status  {{ register.status }}</span>
                                <span v-else-if="register.status === 'rejected'" class="badge bg-danger fs-5">Status  {{ register.status }}</span>
                                <span v-else-if="register.status === 'paid'" class="badge bg-primary fs-5">Status  {{ register.status }}</span>
                                <span v-else-if="register.status === 'submission'" class="badge bg-secondary fs-5">Status  {{ register.status }}</span>
                                <a v-if="register.paid" :href="getImageUrl(register.paid)" target="_blank" class="badge bg-primary fs-5 ms-4">Paid</a>
                            </div>
                    </div>
                                <div class="text-center">
                            <button v-if="register.status !== 'approved' && register.status !== 'rejected'" @click="handleApprove(register.id)" class="btn btn-sm btn-success border-0 shadow me-2"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i> Approve</button>
                            <button v-if="register.status !== 'approved'" @click="handleConfirm(register.id)" class="btn btn-sm btn-warning border-0 shadow me-2"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i>  Confirm</button>
                            <button v-if="register.status !== 'approved' && register.status !== 'rejected'" @click="handleReject(register.id)" class="btn btn-sm btn-danger border-0 shadow me-2"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>  Reject</button>
                                </div>
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

    //import reactive from vue
    import { reactive } from 'vue';

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
        },

        //props
        props: {
            register: Object,
        },

        


        //inisialisasi composition API
        setup(props) {

           

        //define form with reactive
        const form = reactive({
            nip: props.register.nip,
            name: props.register.name,
            email: props.register.email,
            contact: props.register.contact,
            agency: props.register.agency,
            position: props.register.position,
            level: props.register.level,
            status: props.register.status,
            paid: props.register.paid,
            document_jab: props.register.document_jab,
        });

        const handleApprove = (id) => {
            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyetujui usulan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        Inertia.get(`/admin/registration/${id}/approve`);

                        Swal.fire({
                            title: 'Success!',
                            text: 'Status Approved!.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    }
                })
            }

            const handleConfirm = (id) => {
            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan mengkonfirmasi ulang usulan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        Inertia.get(`/admin/registration/${id}/confirm`);

                        Swal.fire({
                            title: 'Success!',
                            text: 'Status Conirmed!.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    }
                })
            }

            const handleReject = (id) => {
            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menolak usulan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Reject it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        Inertia.get(`/admin/registration/${id}/reject`);

                        Swal.fire({
                            title: 'Success!',
                            text: 'Status Rejected!.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    }
                })
            }

        const getDocumentUrl = (documentName) => {
            return `/storage/${documentName}`;
        }

         // Method to get the URL of the document
         const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

            //return
return {
    form,
    getDocumentUrl,
    handleApprove,
    handleReject,
    handleConfirm,
    getImageUrl,
}

}

        

}


</script>

<style>

</style>
