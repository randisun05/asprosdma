<template>

    <Head>
        <title>Merchandise</title>
    </Head>
    <div class="container mb-5 mt-5 text-black">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="row py-4">
                                        <div class="col-md-2 col-12 mb-2">
                                            <Link href="/user/merchans" class="btn btn-md btn-primary border-0 shadow w-100"
                                                type="button"><i class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <h3 class="text-center" style="">Merchandise</h3>
                        <div class="product-container py-5">
                            <div class="row">
                                <div class="col-sm-5 product-image">
                                    <img class="image" v-if="merchan.image" :src="getImageUrl(merchan.image)"
                                        alt="Gambar" style="width: 500px; height: inherit; display: flex; justify-content: center; align-items: center;">
                                </div>
                                <div class="col product-details">
                                    <h2 class="product-brand">{{ merchan.title }}</h2>
                                    <h4 class="product-name">{{ merchan.subtitle }}</h4>
                                    <p class="product-color">Warna : {{ merchan.color }}</p>
                                    <p class="product-price">Rp.{{ merchan.price }}</p>
                                    <span>Deskripsi Merchandise:</span>
                                    <div v-html="merchan.body" class="mb-3"></div>
                                    <span>Bagaimana Cara Kamu Beli:</span>
                                    <div v-html="merchan.how"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    ref, reactive,
} from 'vue';

//import inertia adapter
import { Inertia } from '@inertiajs/inertia';



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
        merchan: Object,
        errors: Object
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

<style>
.image-container {
    display: flex;
    justify-content: center;
    /* Untuk membuat gambar berada di tengah secara horizontal */
    align-items: center;
    /* Untuk membuat gambar berada di tengah secara vertikal */
    height: 400px;
    /* Atur tinggi sesuai kebutuhan Anda */
}

.image-container img {
    max-width: 100%;
    max-height: 100%;
    /* Anda dapat menyesuaikan properti CSS untuk gambar sesuai kebutuhan Anda */
}

.text-black {
    color: black
}
</style>
