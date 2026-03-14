<template>
     <!-- navbar -->

        <div class="wrapper">

        <main class="content">

            <!-- content -->
            <slot />

        </main>

        <!-- footer -->
        <Footer />

    </div>


    </template>

    <script>
        //import navbar
        import Navbar from "../Components/User/Navbar.vue";


        //import footer
        import Footer from '../Components/Footer.vue';

        export default {

            //register components
            components: {
                Navbar,
                Footer
            },
        }

    </script>

    <style>

    </style>
