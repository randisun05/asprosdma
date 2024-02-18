<template>

<!-- Our Blogs -->  
<section id="dashboard" class="">
   <div class="ms-5 ">
      <div class="row">
            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h3 class="bottom20 darkcolor">Submission</h3>
                        <div class="ammount">
                            <h2 class="defaultcolor">{{ registers }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h3 class="bottom20 darkcolor">Paid</h3>
                        <div class="ammount">
                            <h2 class="defaultcolor">1000</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h3 class="bottom20 darkcolor">Confirm</h3>
                        <div class="ammount">
                            <h2 class="defaultcolor">1000</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h3 class="bottom20 darkcolor">Accepted</h3>
                        <div class="ammount">
                            <h2 class="defaultcolor">1000</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-2 me-4">
                <div class="row three-col-pricing">
                    <div class="price-table top60">
                        <h3 class="bottom20 darkcolor">Rejected</h3>
                        <div class="ammount">
                            <h2 class="defaultcolor">1000</h2>
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
  
        }

    }

</script>

<style>

</style>