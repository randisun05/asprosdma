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
        <h3>Kartu Anggota</h3>
        <section id="our-blog">
            <div class="padding_m card">
                <div class="row text-center">
                    <MemberCard> </MemberCard>
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
import MemberCard from '../../../Components/User/MemberCard.vue';

export default {
    //layout
    layout: LayoutUser,

    //register component
    components: {
        Head,
        Link,
        MemberCard
    },

    //props
    props: {
        errors: Object,
        profile: Object

    },



    //inisialisasi composition API
    setup() {

        //define state search
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        //define method search
        const handleSearch = () => {
            Inertia.get('/user/events', {

                //send params "q" with value from state "search"
                q: search.value,
            });
        }

        // Method to get the URL of the document
        const getImageUrl = (imageName) => {
            return `/storage/${imageName}`;
        }

        //return
        return {
            search,
            handleSearch,
            getImageUrl,

        }
    }
}

</script>


