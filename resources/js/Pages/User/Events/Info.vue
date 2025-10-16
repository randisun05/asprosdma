<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <!-- Our Blogs -->
    <section id="our-blog">
        <div class="container padding">
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row py-4">
                            <div class="col-md-2 col-12 mb-2 ms-4 mb-4">
                                <Link :href="`/user/events/${event.slug}`" class="btn btn-md btn-primary border-0 shadow w-100"
                                    type="button"><i class="fa fa-arrow-left"></i>
                                Kembali</Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="news_item text-center mt-5 px-2">
                            <div class="cbp-item web print graphic">
                                <img class="image"
                                    style="display: flex; justify-content: center; align-items: center; width: 100%;"
                                    v-if="event.image" :src="getImageUrl(event.image)" alt="Gambar" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="news_item">
                            <div class="news_desc">
                                <div class="message">
                                    <p>Halo Rekan JF SDM Aparatur!</p>
                                    <p class="mb-0">Terima kasih telah mendaftar pada kegiatan Komunitas Belajar by Asosiasi Profesi JF SDM Aparatur dengan tema:</p>
                                       <p> {{ event.title }} </p>
                                    <p>pada:</p>
                                    <ul>
                                        <li>Tanggal : {{ event.date }}</li>
                                        <li>Jam : Sesuai tertera pada pengumuman </li>
                                    </ul>

                                    <p class="mb-0"> Untuk dapat bergabung ke ruang diskusi, silakan klik link zoom meeting berikut: 👇🏽👇🏽👇🏽
                                        Join Zoom Meeting </p>
                                    <p><a :href="event.link"> {{ event.link }}</a></p>

                                    <p class="mb-0">Berikut beberapa himbauan untuk seluruh peserta kegiatan Komunitas Belajar:</p>
                                    <ul>
                                        <li>✅Wajib menggunakan Nama Depan-Nomor Anggota (Contoh Nomor Anggota 00001/01/ASPROSDMA dan Nama Depan Dhanu, maka menjadi Dhanu-00001-01)</li>
                                        <li>✅Wajib menggunakan Virtual background yg dapat diunduh di: <a href="https://linktr.ee/halo.asprosdma">https://linktr.ee/halo.asprosdma</a>
                                        </li>
                                        <li>✅Persiapkan diri untuk pembelajaran yang sangat bermanfaat ini
                                        </li>
                                        <li>✅Wajib mematikan (mute) microphone dan menyalakan kamera
                                        </li>
                                        <li>✅Mari senantiasa mengedepankan etika dalam berdiskusi melalui ruang maya
                                        </li>
                                    </ul>

                                    <p>Daftarkan diri anda sebagai Anggota Asosiasi Profesi JF SDM Aparatur sekarang!
                                        Pelajari lebih lanjut dengan klik tautan <a href="ww.asprosdma.id">www.asprosdma.id</a></p>

                                    <p>Jika memerlukan bantuan dapat menghubungi:
                                        📳: Admin Aspro SDMA <a href="https://api.whatsapp.com/send/?phone=6282319192189&text&type=phone_number&app_absent=0">wa.me/6282319192189</a></p>

                                    <p class="mb-0">Media Partner:</p>
                                    <ul>
                                        <li>@sharing.asn - https://www.instagram.com/sharing.asn/</li>
                                        <li>@bkngoidofficial - https://www.instagram.com/bkngoidofficial/</li>
                                    </ul>

                                    <p class="mb-0">Sampai bertemu di Komunitas Belajar!!😁‍️</p>
                                    <p class="">💪 Salam JF SDM Aparatur!! 💪</p>
                                </div>

                            </div>
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
import LayoutUser from '../../../Layouts/User.vue';

//import Heade and Link from Inertia
import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';

// No unused imports

export default {

    //layout
    layout: LayoutUser,

    //register component
    components: {
        Head,
        Link,
    },

    //props
    props: {
        title: Object,
        errors: Object,
        event: Object,

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
