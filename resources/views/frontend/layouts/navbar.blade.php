<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center d-flex">



                <div class="mr-auto p-2 col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a style="text-transform: none !important;" href="/" class="">MonSouk</a>
                    </div>
                </div>

                <div class="p-2 col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                           {{-- <li><a href="#"><span class="icon icon-person"></span></a></li>
                            <li><a href="#"><span class="icon icon-heart-o"></span></a></li>--}}
                            <li>
                                <a href="/shop/showcart" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>

                                    @if(request()->session()->has('count'))
                                        <span class="count">  {{ request()->session()->get('count') }}</span>
                                    @else
                                        <span class="count">  0</span>
                                    @endif



                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            @if (Route::has('login'))

                                @auth

                                @else
                                    <li>  <a style="font-weight: bold; font-size: 18px" href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                        <li><a style="font-weight: bold; font-size: 18px" href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth

                    @endif

                            @guest


                                @else


                                <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->nomClient ." ".Auth::user()->prenomClient }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                           <a class="dropdown-item" href="/mescommandes">Mes Commandes</a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>

                                @endguest
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="active">
                    <a href="/">Accueil</a>
                </li>

                <li><a href="/shop">Boutique</a></li>


                <li><a href="/about">à propos de nous</a></li>
                <li><a href="/contact">Contactez nous</a></li>

            </ul>
        </div>
    </nav>
</header>