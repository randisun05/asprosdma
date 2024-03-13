<template>

    <!-- navbar -->
    <Navbar />

   <main class="content">

       <slot />

   </main>

    <!-- footer -->
    <Footer />

</template>

<script>
   //import navbar
   import Navbar from "../Components/Website/Navbar.vue";

   //import navbar
   import Footer from "../Components/Footer.vue";

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
