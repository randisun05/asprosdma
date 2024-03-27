<template>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
        </div>
        <!--side menu open button-->
        <div class="dropdown">
            <a href="#" class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="sidemenu_toggle">
                <div class="media d-flex align-items-center">
                    <img class="avatar rounded-circle" alt="Image placeholder" :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}&amp;background=4e73df&amp;color=ffffff&amp;size=40`">
                        <div class="media-body text-dark align-items-center d-none d-lg-block ms-2">
                            <span class="mb-0 font-small fw-bold text-gray-900">{{ $page.props.auth.user.name }}</span>
                        </div>
                </div>
            </a>
                    <ul class="dropdown-menu" aria-labelledby="sidemenu_toggle">
                        <Link class="dropdown-item d-flex align-items-center" href="/setting" as="button">
                        Setting
                        </Link>
                        <Link class="dropdown-item d-flex align-items-center" href="/logout" method="POST" as="button">
                        Logout
                        </Link>
                    </ul>
        </div>
   </nav>

</template>

<script>

    //import Link
    import { Link } from '@inertiajs/inertia-vue3';

    export default {

        //register component
        components: {
            Link,
        }
    }

</script>

<style>

</style>
