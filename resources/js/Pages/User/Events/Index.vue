<template>
    <Head>
        <title>Berbagi Cerita</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1 col-12 mb-2">
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
                                        <th class="border-0">Kegiatan</th>
                                        <th class="border-0">Tanggal</th>
                                        <th class="border-0">Tempat</th>
                                        <th class="border-0">Kebutuhan Panitia/Participant</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(event, index) in events.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (events.current_page - 1) * events.per_page }}</td>
                                        <td style="width: 380px;"><img class="image" v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" /></td>
                                        <td><p>{{ event.title }}</p>
                                            <p>{{ event.body }}</p></td>
                                        <td><p>Diselenggarakan pada : {{ event.date }}</p> 
                                            <p>Pendaftaran ditutup pada : {{ event.enddate }}</p></td>
                                        <td><p>{{ event.place }}</p>
                                        <p>{{ event.link }}</p></td>
                                        <td><p>Panitia {{ event.team }} orang</p>
                                        <p>Peserta{{ event.participant }} orang</p></td>
                                        <td class="text-center" >
                                            <button  @click.prevent="join(event.id)" class="btn btn-sm btn-success border-0 me-2"><i class="fa fa-sign-in" title="join"></i></button>
                                            <select  class="form-select mt-4" name="role" id="role" @change="handleRoleChange">
                                                <option value="Peserta">Peserta</option>
                                                <option value="Panitia">Panitia</option>
                                            </select>
                                            <span v-if="event.status !== 'approved'" class="badge bg-success">sudah daftar</span>
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
    import LayoutUser from '../../../Layouts/User.vue';

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
        layout: LayoutUser,

        //register component
        components: {
            Head,
            Link,
            Pagination
        },

        //props
        props: {
            events :Object,

        },

        

        //inisialisasi composition API
        setup() {

            // Define local variable role
        let role = '';

        const handleRoleChange = (event) => {
            role = event.target.value;
        };



            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/user/events', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }

            //define method destroy
            const join  = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda akan mendaftar pada event ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Daftarkan!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            Inertia.put(`/user/events/${id}/join`,{
                                'role': role
                            });

                            Swal.fire({
                                title: 'Berhasil!',
                                text: `Anda berhasil bergabung sebagai peserta`,
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
                join,
                getImageUrl,
                handleRoleChange,
                 role,
               
 
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
