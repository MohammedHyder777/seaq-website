<header class="md:flex flex-row justify-start items-center">
    <!-- Logo for wide screens -->
    <a class="hidden md:block my-4 mr-4 p-2 mh-logo-border" href="{{ url('/') }}">
        <img src="{{ asset('images/logos/logo-w-text.png') }}" height="110" width="177" alt="الشعار">
    </a>
    <nav class="hidden md:flex relative space-x-1 pr-1 bg-teal-500 backdrop-blur-sm border border-teal-600/90 shadow-lg text-slate-100 w-full">
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('/')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">الرئيسة</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('events')? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">البرامج والفعاليات</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">انضم إلينا</a>
        <a class="py-3 px-3 text-xl font-medium {{ Request::is('#') ? 'text-sky-600 bg-slate-100' : 'text-neutral-100 hover:text-sky-600 hover:bg-slate-100' }}" href="#">من نحن؟</a>
    </nav>

    <!-- Mobile title and toggle button -->
    <div class="md:hidden flex flex-col space-y-5">
        <div class="flex items-center justify-between px-4 py-3 bg-teal-600/90 backdrop-blur-sm shadow-lg text-white">
            <button class="p-4" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
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

    <nav id="mobile-nav" class="flex flex-col space-y-1 py-5 px-4 bg-slate-300  border-b-4 border-teal-600 rounded-xl md:hidden hidden">
        <a class="text-lg font-medium pr-2 {{ Request::is('/') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('home') }}">الرئيسة</a>
        <a class="text-lg font-medium pr-2 {{ Request::is('events') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('events') }}">البرامج والفعاليات</a>
        <a class="text-lg font-medium pr-2 {{ Request::is('join') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="{{ route('join') }}">انضم إلينا</a>
        <a class="text-lg font-medium pr-2 {{ Request::is('#') ? 'text-sky-600 bg-slate-100' : 'text-teal-800 hover:text-sky-600 hover:bg-slate-100' }}" href="#">من نحن؟</a>
    </nav>


</header>