            <template>

                <Head>
                    <title>Administrator</title>
                </Head>
                <div class="container padding px-5">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row py-4">
                                                <div class="col-md-2 col-12 mb-2">
                                                    <Link href="/admin/events" class="btn btn-md btn-primary border-0 shadow w-100"
                                                        type="button"><i class="fa fa-arrow-left"></i>
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
                                            <span>
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
                                            <span>
                                                : {{ event.date }}
                                            </span>
                                        </div>

                                        <div class="col-md-2">
                                            <span class="text-black">
                                                Tutup Pendaftaran
                                            </span>
                                        </div>
                                        <div class="col-md-9 mb-2">
                                            <span>
                                                : {{ event.enddate }}
                                            </span>
                                        </div>

                                        <div class="col-md-2">
                                            <span class="text-black">
                                                Kapasitas Peserta
                                            </span>
                                        </div>
                                        <div class="col-md-9 mb-2">
                                            <span>
                                                : {{ event.participant }}
                                            </span>
                                        </div>

                                        <div class="col-md-2">
                                            <span class="text-black">
                                                Tempat Pelaksanaan
                                            </span>
                                        </div>
                                        <div class="col-md-9 mb-2">
                                            <span>
                                                : {{ event.place }}
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="text-black">
                                                Link
                                            </span>
                                        </div>
                                        <div class="col-md-9 mb-2">
                                            <span>
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
                                    <div class="col-md-6 col-12 mb-2 mt-4">
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
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" :class="{ active: activeTab === 'participant' }"
                                                @click="setActiveTab('participant')">Participant</a>
                                        </li>
                                        <li class="nav-item ms-4">
                                             <button class="btn btn-success w-100" @click="absenAll">Absen All</button>   
                                        </li>
                                    </ul>

                                    <div v-show="activeTab === 'participant'" class="table-responsive" id="sub">
                                        <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-dark">
                                                <tr class="border-0 text-center">
                                                    <th class="border-0 rounded-start" style="width:5%">No.</th>
                                                    <th class="border-0">Nama</th>
                                                    <th class="border-0">Instansi</th>
                                                    <th class="border-0">Sebagai</th>
                                                    <th class="border-0 rounded-end" style="width:12%">Status
                                                       
                                                    </th>
                                                </tr>
                                            </thead>
                                            <div class="mt-2"></div>
                                            <tbody>
                                                <tr v-for="(detail, index) in details.data" :key="index">
                                                    <td class="fw-bold text-center">{{ ++index + (details.current_page - 1) *
                                                        details.per_page }}</td>
                                                    <td>{{ detail.member.name }}</td>
                                                    <td>{{ detail.member.agency }}</td>
                                                    <td @click="openRoleModal(detail)" style="cursor: pointer;" title="Klik untuk ubah peran">
                                                    {{ detail.title }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ detail.status }}
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


                <!-- Modal untuk edit peran -->
                <div v-if="showRoleModal" class="modal-backdrop">
                <div class="modal-content-custom">
                    <h5>Edit Peran Peserta</h5>
                    <select v-model="selectedRole" class="form-control mb-3">
                    <option value="Peserta">Peserta</option>
                    <option value="Moderator">Moderator</option>
                    <option value="Panitia">Panitia</option>
                    <option value="Narasumber">Narasumber</option>
                    </select>
                    <button class="btn btn-sm btn-success" @click="updateRole(selectedParticipantId, selectedRole)">Simpan</button>         
                    <button class="btn btn-sm btn-secondary ms-2" @click="closeRoleModal">Batal</button>
                </div>
                </div>

            </template>

            <script>
            //import layout
            import LayoutAdmin from '../../../Layouts/Admin.vue';

            //import component pagination
            import Pagination from '../../../Components/Pagination.vue';

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
                    Pagination
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
                        showRoleModal: false,
                        selectedRole: '',
                        selectedParticipantId: null

                    };
                },

                methods: {
                    setActiveTab(tabName) {
                        this.activeTab = tabName;
                    },
                    openRoleModal(participant) {
                    this.selectedRole = participant.title;
                    this.selectedParticipantId = participant.id;
                    this.showRoleModal = true;
                    },

                    closeRoleModal() {
                    this.showRoleModal = false;
                    this.selectedRole = '';
                    this.selectedParticipantId = null;
                    },

                    updateRole(participantId, role) {
                        Inertia.post(`/admin/events/${participantId}/updaterole`, {
                            title: role
                        }, {
                            onSuccess: () => {
                                this.closeRoleModal();
                                Swal.fire('Sukses', 'Peran peserta diperbarui!', 'success');
                            }
                        });
                    },           
                    
                    absenAll() {
                    Swal.fire({
                        title: 'Yakin ingin absen semua peserta?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, absen semua',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        Inertia.get(`/admin/events/${this.event.id}/absenall`, {}, {
                            onSuccess: () => {
                            Swal.fire('Sukses', 'Semua peserta telah diabsen!', 'success');
                            }
                        });
                        }
                    });
                    }


                },


                //inisialisasi composition API
                setup(props) {

                    //define state search
                    const search = ref('' || (new URL(document.location)).searchParams.get('q'));

                    //define method search
                    const handleSearch = () => {
                        Inertia.get(`/admin/events/${props.event.id}`, {

                            //send params "q" with value from state "search"
                            q: search.value,
                        });
                    }

                    // Method to get the URL of the document
                    const getDocumentUrl = (documentName) => {
                        return `/storage/${documentName}`;
                    }
                    //return
                    return {
                        getDocumentUrl,
                        search,
                        handleSearch

                    }
                }
            }

            </script>

            <style>
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1050;
            }
            .modal-content-custom {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            }
            </style>
