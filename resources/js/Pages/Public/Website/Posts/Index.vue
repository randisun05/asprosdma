<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <!--page Header-->
    <section class="page-header parallaxie padding_top center-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-titles text-center">
                        <h2 class="whitecolor font-light bottom30">{{ title }}</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ title }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>

                <div class="col-sm-6 mb-4">
                    <div class="text-center">
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
    </section>
    <!--page Header ends-->


    <!-- Our Blogs -->
    <section id="our-blog">
        <div class="container padding">
            <div class="row mb-4">
                <div v-for="(post, index) in posts.data" :key="index" class="col-md-4 py-3">
                    <div class="news_item shadow text-center">

                        <img class="image" style="width: 100%;" v-if="post.image" :src="getImageUrl(post.image)" alt="Gambar" />

                        <div class="news_desc">
                            <h3 class="text-capitalize font-light darkcolor" style="font-weight: bold;"><a href="#.">{{
            post.title }}</a></h3>
                            <ul class="meta-tags top20 bottom20">
                                <li><a href="#."><i class="fa fa-calendar"></i>{{ post.publish_at }}</a></li>
                                <li><a href="#."> <i class="fa fa-user-o"></i>{{ post.member.name }}</a></li>
                            </ul>
                            <p class="bottom35">{{ post.excerpt }}</p>
                            <Link :href="`/berita/${post.slug}`" title="join" class="button btnprimary" type="button">
                            View</Link>
                        </div>
                    </div>
                </div>
                <div class="text-center"> <!-- Center align pagination -->
                    <Pagination :links="posts.links" align="center" />
                </div>
            </div>
        </div>
    </section>
    <!--Our Blogs Ends-->

</template>

<script>
//import layout
import LayoutWebsite from '../../../../Layouts/Website.vue';

//import component pagination
import Pagination from '../../../../Components/Pagination.vue';

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

export default {

    //layout
    layout: LayoutWebsite,

    //register component
    components: {
        Head,
        Link,
        Pagination
    },

    //props
    props: {
        title: Object,
        errors: Object,
        posts: Object,
    },

    //inisialisasi composition API
    setup() {

        //define state search
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        //define method search
        const handleSearch = () => {
            Inertia.get('/berita', {

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
