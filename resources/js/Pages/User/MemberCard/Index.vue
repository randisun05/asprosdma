<template>
    <Head>
        <title>Kartu Anggota</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </Head>
    <div class="px-5 shadow padding">
        <div class="row">
            <div class="col-md-12">
                <div class="row"></div>
            </div>
        </div>

        <!-- Our Blogs -->
        <div class="row text-center"></div>
        <section id="our-blog">
            <div class="padding_m card scalable-container">
                <div class="row">
                    <div class="col-12">
                        <!-- Row utama, dibagi menjadi kolom -->
                        <div class="row px-5 py-5">
                            <!-- Kolom untuk MemberCard -->
                            <div class="col-md-4 card-member-container">
                                <MemberCard :profile="profile" :foto="foto" :qrCode="qrCode" />
                            </div>

                            <!-- <img src="/assets/images/member-card(4).png" alt="logo" style="width: 30%; height: 10%;"> -->

                            <!-- Kolom untuk BackCard -->
                            <div class="col-md-4">
                                <BackCard></BackCard>
                            </div>

                            <!-- Kolom untuk informasi dan tombol -->
                            <div class="col-md-4">
                                <h3 class="mb-5">Kartu Anggota ASPRO SDM Aparatur</h3>
                                <h4>adalah tanda pengenal resmi bagi anggota Asosiasi Profesi Sumber Daya Manusia Aparatur (ASPRO SDM Aparatur).</h4>
                                <div class="d-flex flex-column">
                                    <button @click="downloadCard" class="btn btn-primary mb-3">
                                        <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                                        <span class="ml-2">Download</span>
                                    </button>
                                    <button @click="printCard" class="btn btn-secondary mb-3">
                                        <i class="fa fa-print fa-2x" aria-hidden="true"></i>
                                        <span class="ml-2">Print</span>
                                    </button>
                                    <button @click="changePhoto" class="btn btn-success">
                                        <i class="fa fa-camera-retro fa-2x" aria-hidden="true"></i>
                                        <span class="ml-2">Ubah Foto</span>
                                    </button>
                                </div>
                            </div>
                        </div>
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

//import component membercard
import MemberCard from '../../../Components/User/MemberCard.vue';
import BackCard from '../../../Components/User/MemberCardBack.vue';

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
        MemberCard,
        BackCard
    },

    //props
    props: {
        errors: Object,
        profile: Object,
        foto: Object,
        qrCode: String
    },

    //inisialisasi composition API
    setup() {
        // Method to get the URL of the document
        const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

         //define method search
         const changePhoto = () => {
            Inertia.get('/user/member-card/changephoto', {

                //send params "q" with value from state "search"
                q: search.value,
            });
        }

        //return
        return {
            getImageUrl,
            changePhoto,

        }
    }
}

</script>




