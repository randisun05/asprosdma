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
                        </div>
                    </div>
                </section>
                <!--page Header ends-->

                <section id="our-team-two" class="padding_m">
                    <div class="container">
                        <div class="row col-md-12 justify-content-center">
                            <div class="mt-3">
                                <h4>DATA ANGGOTA</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width: 20%;">Nomor Anggota</th>
                                            <td>{{ data.nomember }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ data.name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Instansi</th>
                                            <td>{{ data.agency }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                                <div v-if="achievments.length > 0" class="mt-5">
                                    <h4>DATA PENGHARGAAN</h4>
                                    <table class="table">
                                        <tbody>
                                            <tr v-for="(data, index) in achievments" :key="index">
                                                <td style="width: 5%;">{{ index + 1 }}.</td>
                                                <td>{{ data.title }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div v-if="events.length > 0" class="mt-5">
                                    <h4>DATA AKTIFITAS</h4>
                                    <table class="table">
                                        <tbody>
                                            <tr v-for="(event, index) in events" :key="index">
                                                <td  style="width: 5%;">{{ index + 1 }}.</td>
                                                <td>{{ event.event.title }} sebagai {{ event.title }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                </section>
                <!--Testimonials Ends-->

            </template>

            <script>
            //import layout
            import LayoutWebsite from '../../../Layouts/Website.vue';


            //import reactive
            import {
                reactive
            } from 'vue'

            //import Head from Inertia
            import {
                Head
            } from '@inertiajs/inertia-vue3';

            //import inertia adapter
            import {
                Inertia
            } from '@inertiajs/inertia';


            export default {

                //layout
                layout: LayoutWebsite,

                //register component
                components: {
                    Head,


                },

                //props
                props: {
                    title: Object,
                    data: Object,
                    achievments: Array,
                    events: Array
                },

            }

            </script>
