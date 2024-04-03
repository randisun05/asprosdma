<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <!-- Our Blogs -->
    <section id="our-blog">
        <div class="container padding">
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row py-4">
                            <div class="col-md-2 col-12 mb-2 ms-4 mb-4">
                                <Link href="/user/events/" class="btn btn-md btn-primary border-0 shadow w-100"
                                    type="button"><i class="fa fa-arrow-left"></i>
                                Kembali</Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="news_item text-center mt-5 px-2">
                            <div class="cbp-item web print graphic">
                                <img class="image"
                                    style="display: flex; justify-content: center; align-items: center; width: 100%;"
                                    v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="news_item">
                            <div class="news_desc">
                                <h3 class="text-capitalize font-light darkcolor">{{ event.title }}</h3>
                                <ul class="meta-tags top20 bottom20">
                                    <h5 class="darkcolor mb-2">Tanggal Pelaksanaan : {{ event.date }}</h5>
                                    <h5 class="darkcolor mb-2">Kuota Peserta : {{ event.participant }}</h5>
                                    <h5 class="darkcolor mb-2">Penutupan Pendaftaran : {{ event.enddate }}</h5>
                                    <h5 class="darkcolor mb-2">Pelaksanaan : {{ event.place }}</h5>
                                </ul>

                                <div v-html="event.body" style="text-align:justify;text-justify: "></div>
                                <div class="text-center">
                                    <button v-if="event.status === 'active'" @click.prevent="join(event.id)"
                                        class="button btnprimary border-0 me-2 mt-4"> Join </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Our Blogs Ends-->

</template>

<script>
//import layout
import LayoutUser from '../../../Layouts/User.vue';

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
    layout: LayoutUser,

    //register component
    components: {
        Head,
        Link,
    },

    //props
    props: {
        title: Object,
        errors: Object,
        event: Object,
    },

    //inisialisasi composition API
    setup() {

        //define method destroy
        const join = (id) => {
            Swal.fire({
                title: 'Anda akan mendaftar pada event ini?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Daftarkan!'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        Inertia.post(`/user/events/${id}/join`);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: `Anda sudah berhasil bergabung sebagai peserta`,
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
            getImageUrl,
            join
        }
    }

}

</script>
