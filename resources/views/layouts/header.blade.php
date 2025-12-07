<header class="md:flex flex-row justify-start items-center">
    <!-- Logo for wide screens -->
    <!-- <a class="hidden md:block my-4 ms-4 p-2 mh-logo-border" href="{{ url('/') }}">
        <img src="{{ asset('images/logos/logo-w-text.png') }}" height="110" width="177" alt="الشعار">
    </a> -->
    <nav class="hidden md:flex items-stretch relative space-x-1 ps-1 pe-7 bg-teal-500 backdrop-blur-sm border border-teal-600/90 shadow-lg text-slate-100 w-full z-[9999]">
        <a class="hidden md:block items-center my-2 ms-4 me-5 px-2 py-1 bg-white rounded-full shadow-lg z-50" href="{{ url('/') }}">
            <img src="{{ asset('images/logos/logo.png') }}" height="62.3333" width="100.3" alt="الشعار">
        </a>
        @if(auth()->user()?->is_admin)
        <a class="flex items-center px-3 text-xl font-medium {{ request()->routeIs('admin.dashboard')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('admin.dashboard') }}">{{__('strings.dashboard')}}</a>
        @endif
        <a class="flex items-center px-3 text-xl font-medium {{ Request::is('/')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">{{__('strings.home')}}</a>
        <a class="flex items-center px-3 text-xl font-medium {{ Request::is('events')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">{{__('strings.programs&events')}}</a>
        <a class="flex items-center px-3 text-xl font-medium {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">{{__('strings.join_us')}}</a>
        <!-- <a class="py-3 px-3 text-xl font-medium {{ Request::is('about') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('about') }}">{{__('strings.about')}}</a> -->
        
        <!-- Dropdown wrapper -->
        
        <div class="relative flex items-center" data-dropdown>
            <!-- Toggle button -->
            <button
                type="button"
                class="flex items-center gap-2 px-3 text-xl font-medium transition"
                data-dropdown-button
                aria-expanded="false">
                {{__('strings.about')}}
                <svg class="w-4 h-4 transition-transform" data-dropdown-caret xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menu -->
            <div
                class="absolute top-[75%] start-[40%] w-max bg-slate-100 pt-3 pb-7 rounded-lg shadow-lg ring-1 ring-teal-700/60 hidden" style="z-index: -1;"
                data-dropdown-menu
                role="menu"
                aria-hidden="true">
                <a class="block px-4 py-2 text-lg font-medium {{ Request::is('about') ? 'text-slate-100 bg-teal-500' : 'text-teal-600 bg-slate-100 hover:text-slate-100 hover:bg-teal-500' }}" href="{{ route('about') }}">{{__('strings.about_seaq')}}</a>
                <a class="block px-4 py-2 text-lg font-medium {{ Request::is('profile') ? 'text-slate-100 bg-teal-500' : 'text-teal-600 bg-slate-100 hover:text-slate-100 hover:bg-teal-500' }}" role="menuitem" href="{{ route('profile') }}">{{__('strings.profile')}}</a>
                <a class="block px-4 py-2 text-lg font-medium {{ Request::is('newsletter') ? 'text-slate-100 bg-teal-500' : 'text-teal-600 bg-slate-100 hover:text-slate-100 hover:bg-teal-500' }}" role="menuitem" href="{{ route('newsletter') }}">{{__('strings.newsletter')}}</a>
            </div>
        </div>

        <div class="ms-auto flex items-center my-3 rounded-4xl bg-white text-teal-600">
            @if(app()->getLocale() == "ar")
            <a href="{{ route('lang.switch', 'en') }}" class="px-3 text-sm">
                English
            </a>
            @else
            <a href="{{ route('lang.switch', 'ar') }}" class="px-3 text-sm">
                العربية
            </a>
            @endif
        </div>

    </nav>

    <!-- Mobile title and toggle button -->
    <div class="md:hidden flex flex-col space-y-5 backdrop-blur-md">
        <div class="flex items-center justify-between px-4 py-3 bg-teal-600/90 backdrop-blur-sm shadow-lg text-white">
            <button id="toggle-btn" class="p-4" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
                <svg class="h-6 w-6 text-neutral-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Logo for wide screens -->
            <a class="block md:w-min p-1 bg-white rounded-4xl text-left" href="{{ url('/') }}">
                <img src="{{ asset('images/logos/logo.png') }}" height="20" width="86" alt="الشعار">
            </a>
        </div>
        <!-- <p class="flex-1 text-xl text-center page-header">رابطة المهندســين السودانيين بدولة قطر<br>Sudanese Engineers Associatio - Qatar</p> -->
    </div>

    <nav id="mobile-nav" class="absolute z-50 w-full flex flex-col justify-between space-y-7 me-10 pt-5 pb-4 px-4 bg-slate-300/90  border-b-4 border-teal-600 rounded-br-2xl rounded-bl-2xl md:hidden hidden">
        <div class="flex flex-col space-y-1">
            @if(auth()->user()?->is_admin)
            <a class="text-lg font-medium ps-2 {{ Request::is('admin/dashboard') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('admin.dashboard') }}">{{__('strings.dashboard')}}</a>
            @endif
            <a class="text-lg font-medium ps-2 {{ Request::is('/') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">{{__('strings.home')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('events') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">{{__('strings.programs&events')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">{{__('strings.join_us')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('about') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('about') }}">{{__('strings.about')}}</a>
            <a class="text-lg font-medium ps-6 {{ Request::is('about') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('about') }}">- {{__('strings.about_seaq')}}</a>
            <a class="text-lg font-medium ps-6 {{ Request::is('profile') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('profile') }}">- {{__('strings.profile')}}</a>
            <a class="text-lg font-medium ps-6 {{ Request::is('newsletter') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('newsletter') }}">- {{__('strings.newsletter')}}</a>
        </div>
        <div class="items-center m-1 py-1 px-2 rounded-2xl bg-white w-fit">
            @if(app()->getLocale() != 'ar')
            <a class="text-sm text-teal-800" href="{{ route('lang.switch', 'ar') }}">العربية</a>
            @else
            <a class="text-sm text-teal-800" href="{{ route('lang.switch', 'en') }}">English</a>
            @endif
        </div>
    </nav>

    <!-- To close the mobile menu when the user clicks outside -->
    <script>
        const mobileNav = document.getElementById('mobile-nav');
        const toggle = document.getElementById('toggle-btn');

        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobile-nav');

            // If menu is hidden, skip
            if (mobileNav.classList.contains('hidden')) return;

            // Check if the click was outside both the mobileNav and toggle button
            if (!mobileNav.contains(event.target) && !toggle.contains(event.target)) {
                mobileNav.classList.add('hidden');
            }
        });
    </script>

    <!-- Dropdon Menu Functions -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const DROPDOWNS = document.querySelectorAll('[data-dropdown]');

            // helper: is desktop (Tailwind md breakpoint = 768px)
            const isDesktop = () => window.matchMedia('(min-width: 768px)').matches;

            // Close all menus
            function closeAll() {
                DROPDOWNS.forEach(wrapper => {
                    const btn = wrapper.querySelector('[data-dropdown-button]');
                    const menu = wrapper.querySelector('[data-dropdown-menu]');
                    const caret = wrapper.querySelector('[data-dropdown-caret]');

                    if (menu) menu.classList.add('hidden'), menu.setAttribute('aria-hidden', 'true');
                    if (btn) btn.setAttribute('aria-expanded', 'false');
                    if (caret) caret.classList.remove('rotate-180');
                });
            }

            DROPDOWNS.forEach(wrapper => {
                const btn = wrapper.querySelector('[data-dropdown-button]');
                const menu = wrapper.querySelector('[data-dropdown-menu]');
                const caret = wrapper.querySelector('[data-dropdown-caret]');

                if (!btn || !menu) return;

                // When clicking the button: toggle (for mobile)
                btn.addEventListener('click', (e) => {
                    // on desktop we keep hover behavior, but allow click to toggle too
                    const isOpen = !menu.classList.contains('hidden');
                    closeAll();
                    if (!isOpen) {
                        menu.classList.remove('hidden');
                        menu.setAttribute('aria-hidden', 'false');
                        btn.setAttribute('aria-expanded', 'true');
                        if (caret) caret.classList.add('rotate-180');
                    }
                    e.stopPropagation();
                });

                // Hover behavior for desktop: open on mouseenter, close on mouseleave
                wrapper.addEventListener('mouseenter', () => {
                    if (!isDesktop()) return;
                    closeAll();
                    menu.classList.remove('hidden');
                    menu.setAttribute('aria-hidden', 'false');
                    btn.setAttribute('aria-expanded', 'true');
                    if (caret) caret.classList.add('rotate-180');
                });
                wrapper.addEventListener('mouseleave', () => {
                    if (!isDesktop()) return;
                    menu.classList.add('hidden');
                    menu.setAttribute('aria-hidden', 'true');
                    btn.setAttribute('aria-expanded', 'false');
                    if (caret) caret.classList.remove('rotate-180');
                });
            });

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('[data-dropdown]')) closeAll();
            });

            // Close on Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeAll();
            });

            // Optional: close all on resize to avoid stale states
            window.addEventListener('resize', () => closeAll());
        });
    </script>


</header>