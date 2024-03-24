<template>

    <Head>
        <title>Login Anggota</title>
    </Head>


 <!--page Header-->
 <section class="page-header parallaxie padding_top center-block">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-titles text-center">
               <h2 class="whitecolor font-light bottom30"></h2>
               <ul class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><h3> Login Anggota</h3></li>
                 <li class="breadcrumb-item active" aria-current="page"></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!--page Header ends-->


<section id="our-blog" class="padding_m text-center">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="bglight logincontainer">
               <h3 class="darkcolor bottom35">Masuk </h3>
               <div v-if="errors.message" class="alert alert-danger mt-2">
                    {{ errors.message }}
                    </div>
                    <div v-if="$page.props.session.error" class="alert alert-danger mt-2">
                    {{ $page.props.session.error }}
                    </div>

               <form @submit.prevent="submit" class="getin_form border-form" id="login">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-id-badge"></i>
                                </span>
                                <input type="text" class="form-control" v-model="form.nip" placeholder="NIP">
                            </div>
                            <div v-if="errors.nip" class="alert alert-danger mt-2">
                            {{ errors.nip }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <div class="input-group">
                                 <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" placeholder="Password" class="form-control" v-model="form.password">
                            </div>
                            <div v-if="errors.password" class="alert alert-danger mt-2">
                                {{ errors.password }}
                            </div>
                        </div>
                     </div>

                     <div class="col-sm-12">
                        <button type="submit" class="button btnprimary">Login</button>
                        <p class="top20 log-meta"> Belum Memiliki Akun? <u><a href="/registration">Daftar Sekarang</a></u> </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

</template>

<script>
    //import layout
    import LayoutWebsite from '../../../Layouts/Website.vue';

    //import Head from Inertia
    import {
        Head
    } from '@inertiajs/inertia-vue3';

    //import reactive
    import {
        reactive
    } from 'vue';

    //import inertia adapter
    import {
        Inertia
    } from '@inertiajs/inertia';

    export default {

        //layout
        layout: LayoutWebsite,

        //register component
        components: {
            Head
        },

        //props
        props: {
            errors: Object,
            session: Object
        },

        //define composition API
        setup() {

            //define form state
            const form = reactive({
                nip: '',
                password: '',
            });

            //submit method
            const submit = () => {

                //send data to server
                Inertia.post('/user/login', {

                    //data
                    nip: form.nip,
                    password: form.password,
                });
            }

            //return form state and submit method
            return {
                form,
                submit,
            };

        }

    }

</script>
