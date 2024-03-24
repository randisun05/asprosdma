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
                 <li class="breadcrumb-item"><a href="/events">Events</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{ title }}</li>
               </ul>
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
            <div class="col-md-4">
            <div class="news_item shadow text-center">
                    <a class="image" href="blog-detail.html">
                        <img class="image" v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" />
                    </a>
                    <div class="news_desc">
                        <h3 class="text-capitalize font-light darkcolor"><a href="blog-detail.html">{{ event.title }}</a></h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fa fa-calendar"></i>{{ event.date}}</a></li>
                            <li><a href="#."> <i class="fa fa-user-o"></i>{{ event.team }} / {{ event.participant }}</a></li>
                        </ul>
                        <p class="bottom35">{{ event.body }}</p>
                        <a href="/user/events/" class="button btnprimary">Join</a>
                        <p>Pendaftaran ditutup pada {{ event.enddate}} </p>
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
    import LayoutWebsite from '../../../../Layouts/Website.vue';

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
        },

        //props
        props: {
            title:Object,
            errors : Object,
            event : Object,
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
