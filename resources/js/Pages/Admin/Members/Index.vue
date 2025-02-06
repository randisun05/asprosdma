<template>
    <Head>
        <title>Administrator</title>
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
                                        <th class="border-0">No Anggota</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Jabatan</th>
                                        <th class="border-0">Instansi</th>
                                        <th class="border-0 rounded-end" style="width:12%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(data, index) in datas.data" :key="index">
                                        <td class="fw-bold text-center">{{ ++index + (datas.current_page - 1) * datas.per_page }}</td>
                                        <td>{{ data.main.nomember}}</td>
                                        <td>{{ data.main.name }}</td>
                                        <td>{{ data.position }} {{ data.level }}</td>
                                        <td>{{ data.agency }}</td>
                                        <td class="text-center">
                                            <Link :href="`/admin/members/${data.id}`" title="view" class="btn btn-sm btn-primary border-0 shadow me-2" type="button"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></Link>
                                            <a v-if="$page.props.auth.user.role == 'administrator' || $page.props.auth.user.role == 'keanggotaan'" :href="`/admin/members/${data.id}/edit`" title="edit" class="btn btn-sm btn-warning border-0 shadow me-2"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i> </a>
                                            <a :href="`/admin/members/qrcode/${data.id}`" class="btn btn-sm btn-info border-0 shadow me-2" type="button"><i class="fa fa-qrcode fa-lg" aria-hidden="true"></i></a>
                                        </td>
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



   <!-- QR Code Modal -->
   <div v-if="showModal" class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">QR Code</h5>
                    <button type="button" class="close" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img :src="qrCode" alt="QR Code" v-if="qrCode" />
                </div>
                <div class="modal-footer">
                    <!-- Tautan Unduhan -->
                    <a v-if="qrCode" :href="qrCode" download="qr-code.png" class="btn btn-success">
                        Download QR Code
                    </a>
                    <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    import GenerateQRCode from '../../../Components/GenerateQRCode.vue';

    //import component pagination
    import Pagination from '../../../Components/Pagination.vue';

    //import Heade and Link from Inertia
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';

    //import ref from vue
    import {
        ref, reactive
    } from 'vue';

    //import inertia adapter
    import { Inertia } from '@inertiajs/inertia';

    //import sweet alert2
    import Swal from 'sweetalert2';

    import axios from "axios";


    export default {
        //layout
        layout: LayoutAdmin,

        //register component
        components: {
            Head,
            Link,
            Pagination,
            GenerateQRCode
        },

        //props
        props: {
            errors: Object,
            datas: Object,

        },

        data() {
    return {
      showModal: false,
      qrCode: null,
      text: "",
    };
  },
    methods: {
        async showQrModal(nomember) {
        try {
            const response = await axios.post(`${window.location.origin}/admin/generate-qr`, {
            text: nomember,
            }, { responseType: 'blob' });

            const url = URL.createObjectURL(response.data);
            this.qrCode = url;
            this.showModal = true;
        } catch (error) {
            console.error("Error generating QR code:", error);
        }
        },
        closeModal() {
        this.showModal = false;
        this.qrCode = null;
        }
    },


        //inisialisasi composition API
        setup() {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                Inertia.get('/admin/members', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }

            const showModalEmail = ref(false);


            //return
            return {
                search,
                handleSearch,
                showModalEmail

        }
    }
}

</script>

<style scoped>
.qr-generator {
  text-align: center;
  margin-top: 50px;
}
input {
  margin-bottom: 20px;
  padding: 10px;
  width: 300px;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>

