<nav x-data="{ open: false }" class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 no-print">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ URL::asset('/Logo white.png') }}" width="100">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @guest
                    <!-- Display these links for guests (not logged in) -->
                    <x-nav-link class="text-white unstyled-link" href="{{ route('dashboard') }}">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="/men">
                        {{ __('Men') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="/women">
                        {{ __('Women') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('about') }}">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('contact.form') }}">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                    <a href="{{ route('login') }}"
                        class="mt-3 unstyled-link inline-flex items-center px-4 py-2 bg-red-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 disabled:opacity-25 transition ease-in-out duration-150 h-10">
                        {{ __('Login') }}
                    </a>


                    @else
                    @if(Auth::user()->is_admin)
                    <!-- Admin links -->
                    <x-nav-link class="text-white unstyled-link" href="/admin">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="/inventory">
                        {{ __('Products') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('admin.orders') }}">
                        {{ __('Orders') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('users.index') }}">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('admin.messages') }}">
                        {{ __('Customer Messages') }}
                    </x-nav-link>
                    <!-- Add more admin links here -->
                    @else
                    <!-- Customer links -->
                    <x-nav-link class="text-white unstyled-link" href="{{ route('dashboard') }}">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="/men">
                        {{ __('Men') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="/women">
                        {{ __('Women') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('about') }}">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link class="text-white unstyled-link" href="{{ route('contact.form') }}">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                    <x-nav-link class="text-red-800 unstyled-link" href="{{ route('userorders') }}">
                        <i class="fas fa-box-open text-red-800"></i>
                    </x-nav-link>
                    <x-nav-link class="text-red-800 unstyled-link" href="{{ route('showCart') }}">
                        <i class="fas fa-shopping-cart text-red-800"></i>
                    </x-nav-link>
                    <x-nav-link class="text-red-800 unstyled-link" href="{{ route('wishlist') }}">
                        <i class="fas fa-heart text-red-800"></i>
                    </x-nav-link>

                    @endif
                    @endguest
                </div>

            </div>

            @auth
            <!-- Settings Dropdown -->
            <div class="ms-3 relative ml-auto mt-3">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data="">
                            @csrf
                            <x-dropdown-link class="unstyled-link mt-2 mb-0" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth
        </div>
    </div>
</nav>