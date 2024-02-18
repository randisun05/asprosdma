<template>
    
     <nav class="navbar navbar-expand-md sidebar-nav">
      <div class="collapse navbar-collapse" id="xenav">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/dashboard') }">
                    <Link href="/admin/dashboard" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa fa-tachometer fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Dashboard</span>
                    </span>
                    </Link>
                </li>
            
                <li class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/registration') }">
                    <Link href="/admin/registration" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Registration</span>
                    </span>
                    </Link>
                </li>

         </ul>
      </div>
   </nav>

</template>

<script>

//import Link
import { Link } from '@inertiajs/inertia-vue3';

export default {

    //register components
    components: {
        Link
    },

}

</script>

<style>
</style>