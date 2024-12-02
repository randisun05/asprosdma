<template>
    <Head>
        <title>Tambah Sertifikat</title>
    </Head>
    <div class="px-5 shadow padding">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3 class="text-center">Tambah Sertifikat</h3>
                    <Link :href="`/admin/events/${event.id}/certificates/import`" class="btn btn-sm btn-primary border-0 shadow me-2" type="button">Import</Link>
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="row py-4">
                            <div class="col-md-3">
                                <span class="text-black">NIP</span>
                                <div class="form-group mt-1 mb-4">
                                    <input type="text" class="form-control" placeholder="Masukan NIP" v-model="form.nip" @input="searchNIP">
                                </div>
                                <div v-if="errors.nip" class="alert alert-danger mt-2">
                                    {{ errors.nip }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text-black">Nama</span>
                                <div class="form-group mt-1 mb-4">
                                    <input type="text" class="form-control" v-model="form.name" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="text-black">Instansi</span>
                                <div class="form-group mt-1 mb-4">
                                    <input type="text" class="form-control" v-model="form.agency" disabled>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <span class="text-black">Judul Sertifikat</span>
                                <div class="form-group mt-1 mb-4">
                                    <input type="text" class="form-control" placeholder="Masukan Judul Sertifikat" v-model="form.title">
                                </div>
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    {{ errors.title }}
                                </div>
                            </div>
                            <div class="col-md-11">
                                <span class="text-black">Upload Dokumen</span>
                                <div class="form-group mt-1 mb-4">
                                    <input type="file" class="form-control" @change="handleFileUpload('document')">
                                </div>
                                <div v-if="errors.document" class="alert alert-danger mt-2">
                                    {{ errors.document }}
                                </div>
                            </div>
                            <div class="col-md-11 text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutAdmin from '../../../Layouts/Admin.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    layout: LayoutAdmin,
    props: {
        errors: Object,
        event: Object // Pass the members array as a prop
    },
    setup(props) {
        const form = ref({
            nip: '',
            name: '',
            agency: '',
            title: '',
            document: null
        });

        const triggerImport = () => {
            // Logic for import functionality
            alert('Import functionality not implemented yet.');
        };

        const handleFileUpload = (type) => (event) => {
            form.value[type] = event.target.files[0];
        };

        const searchNIP = () => {
            const member = props.members.find(member => member.nip === form.value.nip);
            if (member) {
                form.value.name = member.name;
                form.value.agency = member.agency;
            } else {
                form.value.name = '';
                form.value.agency = '';
            }
        };

        const submit = () => {
            const formData = new FormData();
            formData.append('nip', form.value.nip);
            formData.append('name', form.value.name);
            formData.append('agency', form.value.agency);
            formData.append('title', form.value.title);
            formData.append('document', form.value.document);

            Inertia.post('/admin/event/certificates/save', formData);
        };

        return {
            form,
            triggerImport,
            handleFileUpload,
            searchNIP,
            submit
        };
    }
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
