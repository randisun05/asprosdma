<template>
     <nav class="navbar navbar-expand-md sidebar-nav mt-5">
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

                <li v-if="$page.props.auth.user.role === 'keanggotaan' && 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/registration') }">
                    <Link href="/admin/registration" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Registration</span>
                    </span>
                    </Link>
                </li>

                <li v-if="$page.props.auth.user.role === 'keanggotaan' || $page.props.auth.user.role === 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/member') }">
                    <Link href="/admin/member" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Anggota</span>
                    </span>
                    </Link>
                </li>

                <li v-if="$page.props.auth.user.role === 'humas' || $page.props.auth.user.role === 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/posts') }">
                    <Link href="/admin/posts" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Posts</span>
                    </span>
                    </Link>
                </li>

                <li v-if="$page.props.auth.user.role === 'humas' || $page.props.auth.user.role === 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/events') }">
                    <Link href="/admin/events" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Events</span>
                    </span>
                    </Link>
                </li>

                <li v-if="$page.props.auth.user.role === 'humas' || $page.props.auth.user.role === 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/medias') }">
                    <Link href="/admin/medias" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-photo fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Media</span>
                    </span>
                    </Link>
                </li>

                <li v-if="$page.props.auth.user.role === 'humas' || $page.props.auth.user.role === 'administrator'" class="nav-item" :class="{ 'active': $page.url.startsWith('/admin/merchans') }">
                    <Link href="/admin/merchans" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                           <i class="fa fa-tags fa-lg" aria-hidden="true"></i>
                        </span>
                        <span class="sidebar-text ms-3">Merchans</span>
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
