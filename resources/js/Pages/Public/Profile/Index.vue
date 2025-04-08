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
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="mt-3">
                                            <h4>DATA ANGGOTA</h4>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 40%;">Nomor Anggota</th>
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
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div v-if="achievments.length > 0" class="mt-3">
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
                                                        <td style="width: 5%;">{{ index + 1 }}.</td>
                                                        <td>{{ event.event.title }} sebagai {{ event.title }}

                                                            <span v-if="event.certificate"
                                                                @click="downloadCard(event.certificate.link)"
                                                                class="badge bg-success" type="button">
                                                                Download Sertifikat
                                                            </span>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--Testimonials Ends-->
                        <iframe id="downloadCard" style="width: 100%; height: 100%;"></iframe>
                    </template>

        <script>
        //import layout
        import LayoutWebsite from '../../../Layouts/Website.vue';


        //import reactive
        import {
            reactive, ref, onUnmounted
        } from 'vue'

        //import Head from Inertia
        import {
            Head,
            Link,
        } from '@inertiajs/inertia-vue3';

        //import inertia adapter
        import {
            Inertia
        } from '@inertiajs/inertia';

        //import sweet alert2
        import Swal from 'sweetalert2';

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
                title: Object,
                data: Object,
                achievments: Array,
                events: Array
            },

            setup() {
                // Function to download the certificate
                const downloadCard = async (data) => {
                    try {
                        // Select the iframe
                        const iframe = document.getElementById('downloadCard');

                        // URL to download the certificate
                        const downloadUrl = `/certificates/${data}/view`;

                        // Set the iframe source to the download URL
                        iframe.src = downloadUrl;

                        // Add an event listener to detect when the iframe is loaded
                        iframe.onload = () => {
                            console.log('Certificate download initiated.');
                        }
                    } catch (error) {
                        console.error("Error downloading certificate:", error);
                        Swal.fire('Error', 'Failed to download certificate.', 'error');
                    }
                };

                // Return
                return {
                    downloadCard,
                };
            }
        }

        </script>
