<template>

    <Head>
        <title>Login Administrator</title>
    </Head>

<section id="our-blog" class="padding text-center">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-6 col-md-6 col-sm-10">
            <div class="bglight logincontainer">
               <h3 class="darkcolor bottom35">Login </h3>
               <form @submit.prevent="submit" class="getin_form border-form" id="login">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" v-model="form.email" placeholder="Email Address">
                            </div>
                            <div v-if="errors.email" class="alert alert-danger mt-2">
                            {{ errors.email }}
                            </div>
                        </div>
                     </div>

                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <div class="input-group">
                                 <span class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" placeholder="Password" class="form-control" v-model="form.password">
                            </div>
                            <div v-if="errors.password" class="alert alert-danger mt-2">
                                {{ errors.password }}
                            </div>
                        </div>
                     </div>

                     <div class="d-flex justify-content-between align-items-top mb-4 ms-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                                Remember me
                        </div>
                    </div>

                     <div class="col-sm-12">
                        <button type="submit" class="button btnprimary">Login</button>
                        <p class="top20 log-meta"> Belum Memiliki Akun? <u><a href="signup.html">Daftar Sekarang</a></u> </p>
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
    import LayoutAuth from '../../Layouts/Auth.vue';

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
        layout: LayoutAuth,

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
                email: '',
                password: '',
            });

            //submit method
            const submit = () => {

                //send data to server
                Inertia.post('/login', {

                    //data
                    email: form.email,
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