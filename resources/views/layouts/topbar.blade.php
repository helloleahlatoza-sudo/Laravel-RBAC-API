<header class="sticky top-0 z-10 flex items-center justify-between h-16 px-6 bg-white border-b border-slate-200">
    <!-- Left: Mobile Hamburger + Current Page Title -->
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" 
                class="p-2 text-slate-600 rounded-lg lg:hidden hover:bg-slate-100 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <h2 class="text-sm font-semibold text-slate-600 hidden sm:block">
            @yield('page_title', 'Overview')
        </h2>
    </div>

    <!-- Right: User Dropdown (Super Admin) -->
    <div class="relative" x-data="{ userMenuOpen: false }">
        <button @click="userMenuOpen = !userMenuOpen" 
                @click.away="userMenuOpen = false"
                class="flex items-center gap-2.5 px-3.5 py-2 text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200/70 rounded-xl transition">
            <span>{{ Auth::user()->name ?? 'Super Admin' }}</span>
            <svg class="w-4 h-4 text-slate-500 transition-transform" :class="userMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="userMenuOpen"
             x-transition
             class="absolute right-0 w-48 mt-2 bg-white border border-slate-200 rounded-xl shadow-lg py-1.5 z-50"
             style="display: none;">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                Profile Settings
            </a>
            <div class="my-1 border-t border-slate-100"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</header>