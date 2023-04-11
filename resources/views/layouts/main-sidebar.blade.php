





</script>

<div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ URL::asset('dist/images/logo.svg')}}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-white/[0.08] py-5 hidden">
                <li>
                    <a href="{{route('dashbord')}}" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-feather="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="{{route('dashbord')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>

                    </ul>
                </li>






                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="menu__title"> gestionnaire <i data-feather="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-crud-data-list.html" class="menu">
                                <div class="menu__icon"> <i class="fa-light fa-cube"></i> </div>
                                <div class="menu__title"> pack </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-crud-form.html" class="menu">
                                <div class="menu__icon"> <i class="fa-regular fa-steering-wheel"></i> </div>
                                <div class="menu__title"> auto_école </div>
                            </a>
                        </li>
                    </ul>
                </li>







                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                </li>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
    <a href="{{route('dashbord')}}" class="intro-x flex items-center pl-5 pt-4 @if(request()->routeIs('dashbord')) side-menu--active @endif">
        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> dRivO </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('dashbord')}}" class="side-menu @if(request()->routeIs('dashbord')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu transform rotate-180"> </div>
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6 @if(request()->routeIs('dashbord', 'packs.*', 'autoecoles.*')) side-menu--active @endif"></li>
        <li>
            <a href="{{route('packs.index')}}" class="side-menu @if(request()->routeIs('packs.*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="package"></i> </div>
                <div class="side-menu__title">
                     packs
                    <div class="side-menu transform rotate-180">  </div>
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6 @if(request()->routeIs('autoecoles.*')) side-menu--active @endif"></li>
        <li>
            <a href="{{route('autoecoles.index')}}" class="side-menu @if(request()->routeIs('autoecoles.*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="corner-up-right"></i></div>
                <div class="side-menu__title">
                     auto-écoles
                    <div class="side-menu transform rotate-180"> </div>
                </div>
            </a>
        </li>
         <li class="side-nav__devider my-6 @if(request()->routeIs('autoecoles.*')) side-menu--active @endif"></li>
        <li>
            <a href="{{route('users.index')}}" class="side-menu @if(request()->routeIs('users.*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="user"></i></div>
                <div class="side-menu__title">
                     users
                    <div class="side-menu transform rotate-180"> </div>
                </div>
            </a>
        </li>

    </ul>
</nav>

