<template>

    <Head>
        <title>Kartu Anggota</title>
    </Head>
    <div class="px-5 shadow padding">
        <div class="row">
            <div class="col-md-12">
                <div class="row">


                </div>
            </div>
        </div>
        <!-- Our Blogs -->
        <div class="row text-center">

                </div>
        <section id="our-blog">
            <div class="padding_m card">
                <div class="row">
                    <div class="col">

                    </div>

                </div>
                <div class="row px-5 py-5">
                    <div class="col">
                        <MemberCard> </MemberCard>
                    </div>
                    <div class="col">
                        <BackCard> </BackCard>
                    </div>
                    <div class="col">
                    <h3 class="mb-5">Kartu Anggota ASPRO SDM Aparatur</h3>
                    <h4>adalah tanda pengenal resmi bagi anggota Asosiasi Profesi Sumber Daya Manusia Aparatur (ASPRO SDM Aparatur).</h4>
                    <button @click="downloadCard" class="px-5 py-5">
                        <i class="fa fa-arrow-down fa-5x" aria-hidden="true"></i>
                        <div>Download</div>

                    </button>
                    <button @click="printCard" class="px-5 py-5">
                        <i class="fa fa-print fa-5x" aria-hidden="true"></i>
                        <div>Print</div>
                    </button>
                    <button @click="changePhoto" class="px-5 py-5">
                        <i class="fa fa-camera-retro fa-5x" aria-hidden="true"></i>
                       <div> Ubah Foto</div>
                    </button>
                    </div>
                <div class="icon-buttons">

                </div>
                </div>
                <!-- <div class="col">
                    <MemberCard> </MemberCard>
                </div>

                <div class="">
                    <BackCard> </BackCard>
                </div>
 -->
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
        profile: Object

    },



    //inisialisasi composition API
    setup() {


        // Method to get the URL of the document
        const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

        //return
        return {
            getImageUrl,

        }
    }
}

</script>


