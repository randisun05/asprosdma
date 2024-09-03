<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Beranda - Aspro SDMA</title>
<link href="{{ asset('assets/images/logo.png') }}" rel="icon">
<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>
<body data-bs-spy="scroll" data-bs-target="#xenav">

<!--PreLoader-->
<div class="loader">
   <div class="loader-inner">
      <div class="loader-blocks">
         <span class="block-1"></span>
         <span class="block-2"></span>
         <span class="block-3"></span>
         <span class="block-4"></span>
         <span class="block-5"></span>
         <span class="block-6"></span>
         <span class="block-7"></span>
         <span class="block-8"></span>
         <span class="block-9"></span>
         <span class="block-10"></span>
         <span class="block-11"></span>
         <span class="block-12"></span>
         <span class="block-13"></span>
         <span class="block-14"></span>
         <span class="block-15"></span>
         <span class="block-16"></span>
      </div>
   </div>
</div>
<!--PreLoader Ends-->


@include('Layouts.Components.Header')
@include('Layouts.Components.Slider')
@include('Layouts.Components.Event')
@include('Layouts.Components.Intro')
@include('Layouts.Components.About')
@include('Layouts.Components.RegistrationFlow')
@include('Layouts.Components.Registration')
@include('Layouts.Components.Program')
@include('Layouts.Components.Media')
@include('Layouts.Components.Tekko')
@include('Layouts.Components.Kontak')
@include('Layouts.Components.Footer')
@include('Layouts.Components.Popup')

@yield('content')

<script>

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


        //register component
        components: {
            Head
        },

        //props
        props: {
            errors: Object,
            session: Object
        },


    }

</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!--Bootstrap Core-->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!--to view items on reach-->
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
<!--Equal-Heights-->
<script src="{{ asset('assets/js/jquery.matchHeight-min.js') }}"></script>
<!--Owl Slider-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--number counters-->
<script src="{{ asset('assets/js/jquery-countTo.js') }}"></script>
<!--Parallax Background-->
<script src="{{ asset('assets/js/parallaxie.js') }}"></script>
<!--Cubefolio Gallery-->
<script src="{{ asset('assets/js/jquery.cubeportfolio.min.js') }}"></script>
<!--FancyBox popup-->
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<!-- Video Background-->
<script src="{{ asset('assets/js/jquery.background-video.js') }}"></script>
<!--TypeWriter-->
<script src="{{ asset('assets/js/typewriter.js') }}"></script>
<!--Particles-->
<script src="{{ asset('assets/js/particles.min.js') }}"></script>
<!--WOw animations-->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!--Revolution SLider-->
<script src="{{ asset('assets/js/revolution/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/js/revolution/extensions/revolution.extension.video.min.js') }}"></script>

<!--Google Map API-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJnKEvlwpyjXfS_h-J1Cne2fPMqeb44Mk"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>


</body>
</html>
