<template>
    <Head>
        <title>Daftar Sertifikat</title>
    </Head>
    <div class="container-fluid padding px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-12 mb-2">
                        <form @submit.prevent="handleSearch">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow" v-model="search" placeholder="masukkan kata kunci dan enter...">
                                <span class="input-group-text border-0 shadow">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0 text-center">
                                        <th class="border-0 rounded-start" style="width:5%">No.</th>
                                        <th class="border-0">Kegiatan</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(data, index) in datas.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (datas.current_page - 1) * datas.per_page }}</td>
                                        <td>{{ data.name }}</td>
                                        <td><button  @click="downloadCard(data)" class="button btnprimary" type="button"> Download</button> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="datas.links" align="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe id="downloadFrame" style="visibility: hidden;"></iframe>
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

    //import sweet alert2
    import Swal from 'sweetalert2';

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
            datas :Object,

        },

        //inisialisasi composition API
        setup(props) {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/user/certificates', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }

            const downloadCard = async (data) => {
                try {
                    // Select the iframe
                    const iframe = document.getElementById('downloadFrame');

                    // URL to download the certificate
                    const downloadUrl = `/user/certificates/${data.id}`;

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




            //return
            return {
                search,
                handleSearch,
                downloadCard
        }
    }
}

</script>

<style>

</style>
