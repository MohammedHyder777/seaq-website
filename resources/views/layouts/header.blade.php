<header class="md:flex flex-row justify-start items-center">
    <!-- Logo for wide screens -->
    <a class="hidden md:block my-4 mr-4 p-2 mh-logo-border" href="{{ url('/') }}">
        <img src="{{ asset('images/logos/logo-w-text.png') }}" height="110" width="177" alt="الشعار">
    </a>
    <nav class="hidden md:flex relative space-x-1 ps-1 pe-7 bg-teal-500 backdrop-blur-sm border border-teal-600/90 shadow-lg text-slate-100 w-full">
        @if(auth()->user()?->is_admin)
        <a class="py-3 px-3 text-xl font-medium {{ request()->routeIs('admin.*')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('admin.dashboard') }}">{{__('strings.dashboard')}}</a>
        @endif
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('/')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">{{__('strings.home')}}</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('events')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">{{__('strings.programs&events')}}</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">{{__('strings.join_us')}}</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('about') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('about') }}">{{__('strings.about')}}</a>

        <div class="ms-auto flex items-center m-1 rounded-4xl bg-white text-teal-600">
            @if(app()->getLocale() == "ar")
            <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-3 text-sm">
                English
            </a>
            @else
            <a href="{{ route('lang.switch', 'ar') }}" class="px-3 py-3 text-sm">
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
            <a class="text-lg font-medium ps-2 {{ Request::is('/') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('admin.dashboard') }}">{{__('strings.dashboard')}}</a>
            @endif
            <a class="text-lg font-medium ps-2 {{ Request::is('/') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">{{__('strings.home')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('events') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">{{__('strings.programs&events')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">{{__('strings.join_us')}}</a>
            <a class="text-lg font-medium ps-2 {{ Request::is('about') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('about') }}">{{__('strings.about')}}</a>
        </div>
        <div class="items-center m-1 py-1 px-2 rounded-2xl bg-white w-fit">
            @if(app()->getLocale() != 'ar')
            <a class="text-sm text-teal-800" href="{{ route('lang.switch', 'ar') }}">العربية</a>
            @else
            <a class="text-sm text-teal-800" href="{{ route('lang.switch', 'en') }}">English</a>
            @endif
        </div>
    </nav>

    <script>
        // To close the mobile menu when the user clicks outside
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

        /*
        // ✅ Close when clicking the backdrop area
        mobileNav.addEventListener('click', (event) => {
            const rect = mobileNav.getBoundingClientRect();
            console.log(rect)
            const isInDialog =
                event.clientX >= rect.left &&
                event.clientX <= rect.right &&
                event.clientY >= rect.top &&
                event.clientY <= rect.bottom;

            if (!isInDialog) {
                mobileNav.classList.add("hidden");
            }
        });*/
    </script>

</header>