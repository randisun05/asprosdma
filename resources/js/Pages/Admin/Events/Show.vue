<template>
    <Head>
        <title>Administrator</title>
    </Head>
    <div class="container mb-5 mt-5">
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row py-4">
                                        <div class="col-md-2 col-12 mb-2">
                                            <Link href="/admin/events" class="btn btn-md btn-primary border-0 shadow w-100" type="button"><i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Detail Event</h3>
                                <div class="row py-4 ms-5">
                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Judul
                                                </span>
                                            </div>
                                            <div class="col-md-9 mb-2">
                                                    <span >
                                                        : {{ event.title }}
                                                    </span>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Deskripsi
                                                </span>
                                            </div>
                                                <div v-html="event.body" style="text-align:justify;text-justify: " class="col-md-9 mb-2">

                                                </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Tanggal Pelaksanaan
                                                </span>
                                            </div>
                                                    <div class="col-md-9 mb-2">
                                                            <span >
                                                                : {{ event.date }}
                                                            </span>
                                                    </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Tutup Pendaftaran
                                                </span>
                                            </div>
                                                <div class="col-md-9 mb-2">
                                                        <span >
                                                            : {{ event.enddate }}
                                                        </span>
                                                </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Kapasitas Peserta
                                                </span>
                                            </div>
                                                <div class="col-md-9 mb-2">
                                                        <span >
                                                            : {{ event.participant }}
                                                        </span>
                                                </div>

                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Tempat Pelaksanaan
                                                </span>
                                            </div>
                                                <div class="col-md-9 mb-2">
                                                        <span >
                                                            : {{ event.place }}
                                                        </span>
                                                </div>
                                            <div class="col-md-2">
                                                <span class="text-black">
                                                Link
                                                </span>
                                            </div>
                                                <div class="col-md-9 mb-2">
                                                        <span >
                                                            : {{ event.link }}
                                                        </span>
                                                </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h3 class="text-center">Detail Peserta</h3>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link" :class="{ active: activeTab === 'participant' }" @click="setActiveTab('participant')">Participant</a>
                            </li>
                        </ul>

                        <div v-show="activeTab === 'participant'" class="table-responsive" id="sub">
                            <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0 text-center">
                                        <th class="border-0 rounded-start" style="width:5%">No.</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Instansi</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(detail, index) in details.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (details.current_page - 1) * details.per_page }}</td>
                                        <td>{{ detail.member.name }}</td>
                                        <td>{{ detail.member_id }}</td>
                                        <td class="text-center">
                                            <button title="tolak" class="btn btn-sm btn-danger border-0 shadow me-2"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination v-if="activeTab === 'participant'" :links="details.links" align="end" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    //import Heade and Link from Inertia
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    //import tinyMCE
    import Editor from '@tinymce/tinymce-vue';

    //import ref from vue
    import {
        ref, reactive,
    } from 'vue';

    //import inertia adapter
    import { Inertia } from '@inertiajs/inertia';

    //import sweet alert2
    import Swal from 'sweetalert2';

    export default {
        //layout
        layout: LayoutAdmin,

        //register component
        components: {
            Head,
            Link,
            Editor,
        },

        //props
       props: {
        errors: Object,
        event: Object,
        details: Object
    },

         data() {
            return {
              activeTab: 'participant', // Set the default active tab

            };
          },

                  methods: {
            setActiveTab(tabName) {
              this.activeTab = tabName;
            },
          },


        //inisialisasi composition API
        setup() {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/admin/posts', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }




            //return
            return {

        }
    }
}

</script>

<style>

</style>
