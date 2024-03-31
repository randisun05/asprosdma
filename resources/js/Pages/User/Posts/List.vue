<template>

    <Head>
        <title>Daftar Berita</title>
    </Head>
    <div class="px-5 shadow padding">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-12 mb-2 py-3">
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
        <div class="padding_m card">
            <div class="row text-center">
                    <h3>Daftar Berita</h3>
                </div>
            <div class="row mb-4">
                <div v-for="(post, index) in posts.data" :key="index" class="col-md-4 py-3">
                    <div class="news_item shadow text-center">
                        <img class="image" style="width: 100%; display: flex; justify-content: center; align-items: center;" v-if="post.image" :src="getImageUrl(post.image)" alt="Gambar" />
                        <div class="news_desc">
                            <h4 class="text-capitalize font-light darkcolor" style="font-weight: bold;"><a href="#.">{{
            post.title }}</a></h4>
                            <ul class="meta-tags top20 bottom20">
                                <li><a href="#."><i class="fa fa-calendar"></i>{{ post.publish_at }}</a></li>
                                <li><a href="#."> <i class="fa fa-user-o"></i>{{ post.member.name }}</a></li>
                            </ul>
                            <p class="bottom35">{{ post.excerpt }}</p>
                            <Link :href="`/user/posts/list/${post.slug}`" title="join" class="button btnprimary" type="button">
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
    </div>
    <!--Our Blogs Ends-->

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
    ref
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
            Inertia.get('/user/posts/list', {

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
