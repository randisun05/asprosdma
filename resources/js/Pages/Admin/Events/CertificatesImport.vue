<template>
    <Head>
        <title>Import Sertifikat</title>
    </Head>
    <div class="px-5 shadow padding">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3 class="text-center">Import Sertifikat</h3>
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="row py-4">
                            <div class="col-md-11">
                                <span class="text-black">Nama Kegiatan</span>
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
        members: Array // Pass the members array as a prop
    },
    setup(props) {
        const form = ref({
            title: '',
            document: null
        });

        const handleFileUpload = (type) => (event) => {
            form.value[type] = event.target.files[0];
        };



        const submit = () => {
            formData.append('title', form.value.title);
            formData.append('document', form.value.document);

            Inertia.post('/admin/event/certificates/import', formData);
        };

        return {
            form,
            handleFileUpload,
            submit
        };
    }
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
