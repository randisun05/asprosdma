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
                        <h2 class="whitecolor font-light bottom30">
                            {{ title }}
                        </h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="/">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page Header ends-->

    <!-- Our Blogs -->
    <section id="our-blog">
        <div class="container padding_m">
            <div class="row mb-4">
            <div v-if="document">
                <embed :src="getDocumentUrl(document)" width="100%" height="600px" type="application/pdf">
            </div>
            <div v-else><span>Dokumen tidak ditemukan, waspada dokumen palsu</span></div>
            </div>
        </div>
    </section>
    <!--Our Blogs Ends-->
</template>

<script>
//import layout
import LayoutWebsite from "../../../../Layouts/Website.vue";

//import component pagination
import Pagination from "../../../../Components/Pagination.vue";

//import Heade and Link from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import ref from vue
import { ref } from "vue";

//import inertia adapter
import { Inertia } from "@inertiajs/inertia";

export default {
    //layout
    layout: LayoutWebsite,

    //register component
    components: {
        Head,
        Link,
        Pagination,
    },

    //props
    props: {
        title: String,
        errors: Object,
        document: Object,
    },

    //inisialisasi composition API
    setup() {

        // Method to get the URL of the document
        const getDocumentUrl = (imageName) => {
            return `/storage/${imageName}`;
        };


        //return
        return {
            getDocumentUrl,

        };
    },
};
</script>
