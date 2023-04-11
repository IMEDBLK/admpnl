<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="fr" class="light">
    <!-- BEGIN: Head -->
    <head>
@include('layouts.head')
@yield('style')
@yield('script')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    </head>
    <!-- END: Head -->
    <body class="py-5">
        <!-- BEGIN: Mobile Menu -->

 @include('layouts.main-sidebar')

        <!-- END: Side Menu -->





            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->


@include('layouts.footer')




                <!-- END: Top Bar -->
                @yield('content')

            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->

        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
       @include('layouts.footer-scripts')
        <!-- END: JS Assets-->
    </body>
        </html>
