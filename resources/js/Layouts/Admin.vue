<template>
<div class="wrapper">
    
    <!-- sidebar -->
    <Sidebar />

    <main class="content">

        <!-- navbar -->
        <Navbar />

        <!-- content -->
        <slot />

    </main>

</div>


</template>

<script>
    //import navbar
    import Navbar from "../Components/Navbar.vue";

    //import sidebar
    import Sidebar from '../Components/Sidebar.vue';

    export default {

        //register components
        components: {
            Navbar,
            Sidebar
        },
    }

</script>

<style>

</style>