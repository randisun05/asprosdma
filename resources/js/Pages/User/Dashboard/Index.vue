<template>
    <!-- Our Blogs -->
    <section id="member-card" class="">
        <div class="ms-5">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl-4 me-4">
                    <div class="card shadow top60">
                        <div class="text-center">
                            <h4>Kartu Anggota</h4>
                            <h4>Aspro SDM Aparatur</h4>
                            <hr class="mt-0">
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <!-- Foto disini -->
                                <img src="/assets/images/team-grey-1.jpg" alt="Foto Anda" class="img-fluid ms-3">
                            </div>
                            <!-- <div class="col-sm-8">
                                <div class="row py-1 ms-2">
                                    <div class="col-sm-3">
                                        <h5>No.</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>: {{ profile.nomember }}</h5>
                                    </div>
                                </div>
                                <div class="row py-1 ms-2">
                                    <div class="col-sm-3">
                                        <h5>NIP</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>: {{ profile.nip }}</h5>
                                    </div>
                                </div>
                                <div class="row py-1 ms-2">
                                    <div class="col-sm-3">
                                        <h5>Nama</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>: {{ profile.name }}</h5>
                                    </div>
                                </div>
                                <div class="row py-1 ms-2">
                                    <div class="col-sm-3">
                                        <h5>Instansi</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>: {{ profile.agency }}</h5>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="dashboard" class="card mx-5 mt-3 shadow">
        <div class="ms-4 mt-4">
            <h3> Kegiatan </h3>
            <hr>
        </div>
        <carousel :items-to-show="1" :center-mode="false" :autoplay="5000" wrap-around="true">
            <slide v-for="(event, index) in events.data" :key="index">
                <div class="news_item shadow text-center row me-5">
                    <div class="col-lg-6">
                        <img class="image" style="width: 50%;" v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" />
                    </div>
                    <div class="col-lg-6">
                        <div class="news_desc">
                            <h4 class="text-capitalize font-light darkcolor">{{ event.title }}</h4>
                            <ul class="top20 bottom20">
                                <li><a href="#."><i class="fa fa-calendar me-2"></i>{{ event.date }}</a> <a href="#." class="ms-4"> <i class="fa fa-user-o me-2"></i>{{ event.participant }}</a></li>
                                <p>Pendaftaran ditutup pada {{ event.enddate }} </p>
                            </ul>
                            <Link :href="`/events/${event.id}`" title="join" class="button btnprimary" type="button">
                            Join</Link>

                        </div>
                    </div>
                </div>
            </slide>

            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>
        <div class="text-center py-3">
            <a href="/user/events" class="btn btnprimary">Lihat Semua Kegiatan</a>
        </div>
    </section>

    <section id="dashboard" class="card mx-5 mt-3 shadow">
        <div class="ms-4 mt-4">
            <h3> Merchandises </h3>
            <hr>
        </div>

        <carousel :items-to-show="1" :center-mode="false" :autoplay="5000" wrap-around="true">
            <slide v-for="(merchan, index) in merchans.data" :key="index" class="px-5">
                <div class="news_item shadow row">
                    <div class="col-lg-6" style="display: flex; justify-content: center; align-items: center;">
                        <img class="image" v-if="merchan.image" :src="getImageUrl(merchan.image)" alt="Gambar"
                            style="max-width: 100%; max-height: 100%; width: auto; height: auto;" />
                    </div>
                    <div class="col-lg-6">
                        <div class="col product-details" style="text-align: left;">
                            <h5 class="product-brand">{{ merchan.title }}</h5>
                            <h6 class="product-name">{{ merchan.subtitle }}</h6>
                            <div style="font-size: 10px;" class="product-color">Warna : {{ merchan.color }}</div>
                            <div class="product-rating">
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                                <span class="rating-star">★</span>
                            </div>
                            <h6 class="product-price mb-2">Rp.{{ merchan.price }}</h6>
                            <h6 class="mb-1">Bagaimana Cara Kamu Beli:</h6>
                            <div v-html="merchan.how" style="font-size: 10px;"></div>
                            <div class="mt-3">
                                <Link :href="`/merchans/${merchan.id}`" title="join" class="button btnprimary"
                                    type="button">View</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </slide>
            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>
        <div class="text-center py-3">
            <a href="/user/merchans" class="btn btnprimary">Lihat Semua Merchandise</a>
        </div>
    </section>

    <section id="dashboard" class="card mx-5 mt-3 shadow">
        <div class="ms-4 mt-4">
            <h3> Berita </h3>
            <hr>
        </div>

        <carousel :items-to-show="1" :center-mode="false" :autoplay="5000" wrap-around="true">
            <slide v-for="(post, index) in posts.data" :key="index">
                <div class="news_item shadow text-center">
                    <a class="image" href="blog-detail.html">
                        <img class="image" v-if="post.image" :src="getImageUrl(post.image)" alt="Gambar" />
                    </a>
                    <div class="news_desc">
                        <h3 class="text-capitalize font-light darkcolor"><a href="blog-detail.html">{{ post.title }}</a>
                        </h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fa fa-calendar"></i>{{ post.excerpt }}</a></li>
                        </ul>
                        <p class="bottom35">{{ post.body }}</p>
                        <Link :href="`/berita/${post.slug}`" title="join" class="button btnprimary" type="button">View
                        </Link>
                    </div>
                </div>
            </slide>
            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>
        <div class="text-center py-3">
            <a href="/user/posts" class="btn btnprimary">Lihat Semua Post</a>
        </div>
    </section>

</template>

<script>
//import layout Admin
import LayoutUser from '../../../Layouts/User.vue';

//import Heade from Inertia
import {
    Head,
} from '@inertiajs/inertia-vue3';

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

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

    //register components
    components: {
        Head, Carousel, Slide, Pagination, Navigation
    },

    //props
    props: {
        profile: Object,
        events: Object,
        merchans: Object,
        posts: Object,
    },

    //inisialisasi composition API
    setup() {

        //define state search
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        //define method search
        const handleSearch = () => {
            Inertia.get('/events', {

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
            getImageUrl,


        }
    }


}

</script>

<style>
.img-fluid {
    max-width: 100%;
    height: auto;
}
</style>
