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
                    <div class="col-md-6 col-12 mb-2 ms-2">
                        <form @submit.prevent="handleSearch">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow" v-model="search"
                                    placeholder="masukkan kata kunci dan enter...">
                                <span class="input-group-text border-0 shadow">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Our Blogs -->
        <section id="our-blog">
            <div class="container padding_m card">
                <div class="row text-center">
                    <h3>Daftar Kegiatan</h3>
                </div>
                <div class="row mb-4">
                    <div v-for="(event, index) in events.data" :key="index" class="col-md-4 mt-5">
                        <div class="news_item shadow">
                            <img class="image" v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" />

                            <div class="news_desc">
                                <h4 class="text-capitalize font-light darkcolor" style="font-weight: bold;"><a href="#.">{{ event.title }}</a></h4>
                                <div class="mt-2 text-center">
                                    <span v-if="event.status === 'active'" class="badge bg-success">Open</span>
                                    <span v-else-if="event.status === 'closed'" class="badge bg-danger">Closed</span>
                                </div>
                                <ul class="meta-tags top20 bottom20">
                                    <li>
                                        <a href="#."><i class="fa fa-calendar me-2" title="Tanggal pelaksanaa"></i>{{
                            event.date }}</a>
                                    </li>
                                    <li>
                                        <a href="#."> <i class="fa fa-user-o me-2" title="Jumlah peserta"></i>
                                            {{ event.participant }}</a>
                                    </li>

                                    <p>Pendaftaran ditutup pada {{ event.enddate }}</p>

                                </ul>
                                <p class="bottom35">{{ event.body }}</p>
                                <div class="text-center">
                                    <Link v-if="event.status == 'active'" :href="`/events/${event.slug}`" title="join"
                                        class="button btnprimary" type="button">
                                    Join
                                    </Link>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- Center align pagination -->
                        <Pagination :links="events.links" align="center" />
                    </div>
                </div>
            </div>
        </section>
        <!--Our Blogs Ends-->
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
        events: Object,

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
        const join = (id) => {
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

                        Inertia.put(`/user/events/${id}/join`, {
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
    justify-content: center;
    /* Untuk membuat gambar berada di tengah secara horizontal */
    align-items: center;
    /* Untuk membuat gambar berada di tengah secara vertikal */
    height: 200px;
    /* Atur tinggi sesuai kebutuhan Anda */
}

.image img {
    max-width: 100%;
    max-height: 100%;
    /* Anda dapat menyesuaikan properti CSS untuk gambar sesuai kebutuhan Anda */
}
</style>
