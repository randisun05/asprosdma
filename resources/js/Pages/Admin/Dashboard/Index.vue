<template>

<!-- Our Blogs -->
<section id="dashboard" class="container-fluid padding px-5">
   <div class="card shadow py-5">
    <h3 class="text-center">Monitoring Pendaftaran</h3>
      <div class="row px-5">
            <div class="col-md-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Pendaftar</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ regissub }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Permintaan Pembayaran</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ sendpayment }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Upload Bukti Pembayaran</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ regispaid }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Perbaikan</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ regisconfirm }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Selesai</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ regisaccepted }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Tolak</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ regisrejected }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5 px-5">
            <h3 class="text-center">Monitoring Data Public</h3>
            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Post Sub</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ postsubmission }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Post Publish</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ postpublis }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Total Event</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ event }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Active Event</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ eventactive }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h4 class="bottom20 darkcolor">Merchans</h4>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ merchan }}</h2>
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
    //import layout Admin
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    //import Heade from Inertia
    import {
        Head,
    } from '@inertiajs/inertia-vue3';

    export default {

        //layout
        layout: LayoutAdmin,

        //register components
        components: {
            Head,
        },

        //props
        props: {
        registers: Number,
        regissub :Number,
        regispaid:Number,
        regisconfirm :Number,
        regisaccepted :Number,
        regisrejected:Number,
        postsubmission :Number,
        postpublis :Number,
        event :Number,
        eventactive :Number,
        merchan:Number,
        sendpayment:Number

        }

    }

</script>

<style>

</style>
