<template>
    <!-- Our Blogs -->  
    <section id="dashboard" class="">
       <div class="ms-5 ">
          <div class="row">
                <div class="col-12 col-sm-6 col-xl-2 me-4">
                    <div class="row three-col-pricing">
                        <div class="price-table top60">
                            <h3 class="bottom20 darkcolor">Kelengkapan Data</h3>
                            <div class="ammount">
                                <h3 class="defaultcolor">90%</h3>
                                <p>Lengkapi data profile</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-xl-2 me-4">
                    <div class="row three-col-pricing">
                        <div class="price-table top60">
                            <h3 class="bottom20 darkcolor">Total Cerita</h3>
                            <div class="ammount">
                                <h2 class="defaultcolor">1000</h2>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-xl-2 me-4">
                    <div class="row three-col-pricing">
                        <div class="price-table top60">
                            <h3 class="bottom20 darkcolor">Cerita Diajukan</h3>
                            <div class="ammount">
                                <h2 class="defaultcolor">1000</h2>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-xl-2 me-4">
                    <div class="row three-col-pricing">
                        <div class="price-table top60">
                            <h3 class="bottom20 darkcolor">Cerita Dipublikasi</h3>
                            <div class="ammount">
                                <h2 class="defaultcolor">1000</h2>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-sm-6 col-xl-2 me-4">
                    <div class="row three-col-pricing">
                        <div class="price-table top60">
                            <h3 class="bottom20 darkcolor">Kegiatan</h3>
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
        import LayoutUser from '../../../Layouts/User.vue';
    
        //import Heade from Inertia
        import {
            Head,
        } from '@inertiajs/inertia-vue3';
    
        export default {
    
            //layout
            layout: LayoutUser,
    
            //register components
            components: {
                Head,
            },
    
            //props
            props: {
         
            }
    
        }
    
    </script>
    
    <style>
    
    </style>